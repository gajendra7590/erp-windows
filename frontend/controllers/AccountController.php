<?php

namespace frontend\controllers;


use common\helpers\Cart;
use Yii;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Request;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap\ActiveForm;
use yii\web\UploadedFile;

//Models
use common\models\ProductsOrders;
use common\models\ProductsWishlist;
use common\models\User;
use frontend\models\ChangePassword;
//Helpers
use common\helpers\Utils;
use common\helpers\Common;

class AccountController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index','validate-profile','save-profile',
                                      'validate-password','save-password',
                                      'view-order-summary','order-success',
                                      'remove-wishlist'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    Yii::$app->session->setFlash('error', 'Your account session expired,please login.');
                    Yii::$app->response->redirect(['/login']);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'validate-profile' => ['post'],
                    'save-profile' => ['post'],
                    'validate-password' => ['post'],
                    'save-password' => ['post'],
                    'view-order-summary' => ['get'],
                    'order-success' => ['get'],
                    'remove-wishlist' => ['delete'],
                ],
            ],
        ];
    }

    /**
     * Function for shows my account section
     */
    public function actionIndex(){
        $id = Yii::$app->user->identity->id;
        return $this->render('index',[
            'orders_list' => $this->ordersList(),
            'product_wishlist' => $this->productWishlist(),
            'userModel' => User::findOne(['id' => $id]),
            'changePasswordModel' => new ChangePassword()
        ]);
    }

    public function actionValidateProfile(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $id = Yii::$app->user->identity->id;
        $userModel = User::findOne(['id' => $id]);
        if (Yii::$app->request->isAjax && $userModel->load(Yii::$app->request->post())) {
            if (!$userModel->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($userModel);
            }else{
                return true;
            }
        }
    }

    public function actionSaveProfile(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $id = Yii::$app->user->identity->id;
        $userModel = User::findOne(['id' => $id]);
        if ( Yii::$app->request->isAjax && $userModel->load(Yii::$app->request->post()) && $userModel->validate()) {
            $userModel->save();

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $this->asJson([
                'success' => true,
                'message' => 'Your profile updated successfully'
            ]);
        }
    }

    public function actionValidatePassword(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ChangePassword();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }
    }

    public function actionSavePassword(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ChangePassword();
        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->savePassword($model->cnewPassword)){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $this->asJson([
                    'success' => true,
                    'message' => 'Your password changed successfully'
                ]);

            }else{
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $this->asJson([
                    'success' => false,
                    'message' => 'Opps! error in change password'
                ]);
            }

        }
    }

    public function actionRemoveWishlist($id){

        if((Yii::$app->request->isDelete) && (Yii::$app->request->isAjax)){
            $uid = Yii::$app->user->identity->id;
            $item = ProductsWishlist::findOne(['id' => $id,'user_id' => $uid]);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if($item){
                $item->delete();
                return $this->asJson([
                    'success' => true,
                    'message' => 'Item removed successfully'
                ]);
            }else {
                return $this->asJson([
                    'success' => false,
                    'message' => 'Opps! error in remove item'
                ]);
            }

        }
    }

    public function actionViewOrderSummary($id){
        if((Yii::$app->request->isGet) && (Yii::$app->request->isAjax)){
            $orderDetail = Common::getProductOrderData($id);
            return $this->renderAjax('@app/views/account/view_order_summary', [
                'model' => [],
                'orderDetail'=>$orderDetail
            ]);
        }
    }

    public function actionOrderSuccess($order_id){

        $id = Yii::$app->user->identity->id;
        $orderSummary = ProductsOrders::find()->where(['id' => $order_id,'user_id' => $id])->asArray()->one();
         if($orderSummary == NULL){
             Yii::$app->response->redirect(['/my-account']);
         }
        return $this->render('booking_done_success',[
            'orderDetail' => Common::getProductOrderData($order_id)
        ]);
    }


    /**
     * Callback function for get orders List
     */
     private function ordersList(){
        $id = Yii::$app->user->identity->id;
        $orders = ProductsOrders::find()
            ->with([
                'productsOrdersStatus' => function($model){
                    $model->select('id,name,title');
                },
                'payment' => function($model){
                    $model->select('id,payment_receipt_url,payment_brand,payment_exp_month,payment_exp_year,payment_last4,payment_amount');
                }
            ])
            ->select('*,(cart_total + delhivery_charges) as total_pay')
            ->where(['user_id' => $id])
            ->asArray()
            ->all();
        return $orders;
     }

    /**
     * Callback function for get productWishlist
     */
     private function productWishlist(){

         $id = Yii::$app->user->identity->id;
         $prodWishlist = ProductsWishlist::find()
             ->with([
                 'product' => function($model){
                     $model
                     ->with([
                             'variablesPrice'=> function($model){
                                 $model->select('
                                  product_id,
                                  MIN(sale_price) as MinSP,
                                  MAX(sale_price) as MaxSP,
                                  MIN(regular_price) as MinRP, 
                                  MAX(regular_price) as MaxRP'
                                 )->groupBy('product_id');
                             }
                     ])->select('id,product_type,product_categories,title,slug,featured_image,
                     product_regular_price as rprice,product_sale_price as price,
                     stock_status,
                     (CASE 
                        WHEN stock_status = 1 
                           THEN "In Stock"
                           ELSE "Out Of Stock"
                        END) AS stock_status_label,
                     stock_quantity');
                 }
             ])

             ->select('*')
             ->where(['user_id' => $id])
             ->asArray()
             ->all();
//         echo '<pre>';print_r($prodWishlist);die;
         return $prodWishlist;

     }


}
