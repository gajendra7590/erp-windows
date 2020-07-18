<?php

namespace admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Request;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

use admin\controllers\BaseController;

//Helpers
use common\helpers\Utils;
use common\helpers\Common;

//Models
use common\models\ProductsOrderStatusActivity;
use common\models\ProductsOrders;
use common\models\ProductsOrdersSearch;

/**
 * OrdersController implements the CRUD actions for ProductsOrders model.
 */
class OrdersController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view-order-summary',
                            'update-order-status-form',
                            'validate-order-status',
                            'save-order-status'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    Yii::$app->response->redirect(['/login']);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'validate-order-status' => ['post'],
                    'save-order-status' => ['post'],
                ],
            ],
        ];
    }

    public function init(){
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\UnauthorizedHttpException();
        }
    }

    /**
     * Lists all ProductsOrders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsOrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5;
        $dataProvider->pagination->route = 'orders';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewOrderSummary($id){
        if((Yii::$app->request->isGet) && (Yii::$app->request->isAjax)){
            $orderDetail = Common::getProductOrderData($id);
            return $this->renderAjax('@app/views/orders/view_order_summary', [
                'model' => [],
                'orderDetail'=>$orderDetail
            ]);

        }
    }

    public function actionUpdateOrderStatusForm($id) {
        if((Yii::$app->request->isGet) && (Yii::$app->request->isAjax)){
            $order = ProductsOrders::findOne(['id' => $id]);

            $model = new ProductsOrderStatusActivity();
            $model->product_order_id = $id;
            $model->user_id = Yii::$app->user->identity->id;
            $model->order_last_status = $order->order_status;
            $model->new_status = $order->order_status;


            return $this->renderAjax('@app/views/orders/update_order_status_form', [
                'model' => $model,
                'orderDetail'=> $order
            ]);

        }
    }

    public function actionValidateOrderStatus($id) {
        $order = ProductsOrders::findOne(['id' => $id]);
        //Model
        $model = new ProductsOrderStatusActivity();
        $model->product_order_id = $id;
        $model->user_id = Yii::$app->user->identity->id;
        $model->order_last_status = $order->order_status;
        $model->new_status = $order->order_status;

        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }
    }

    public function actionSaveOrderStatus($id) {

        $order = ProductsOrders::findOne(['id' => $id]);
        //Model
        $model = new ProductsOrderStatusActivity();
        $model->product_order_id = $id;
        $model->user_id = Yii::$app->user->identity->id;
        $model->order_last_status = $order->order_status;
        $model->new_status = $order->order_status;

        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if($model->save()){
                $order->order_status = $model->new_status;
                $order->save();
                return $this->asJson([
                    'success' => true,
                    'message' => 'Order status updated successfully'
                ]);
            }else{
                return $this->asJson([
                    'success' => false,
                    'message' => 'Error in save status'
                ]);
            }
        }

    }






} //end class
