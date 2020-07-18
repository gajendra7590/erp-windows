<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Request;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap\ActiveForm;
use yii\web\UploadedFile;

//model
use frontend\models\CoupenForm;
//Helper Classes
use common\helpers\Cart;

class CartController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['cart'],
                'rules' => [
                    [
                        'actions' => ['cart','add-to-cart','update-cart','remove-item',
                         'coupen-code-apply','update-single-cart-item'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'add-to-cart' => ['post'],
                    'update-cart' => ['post'],
                    'remove-item' => ['post'],
                    'update-single-cart-item' => ['post'],
                    'coupen-code-apply' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Function for load cart view page
     */
    public function actionCart()
    {
        $this->view->params['body_class'] = 'Products-cart-page';
        $coupenForm = new CoupenForm();
        return $this->render('cart',[
            'cart_item' => Cart::Items(),
            'cart_total' => Cart::cartTotal(),
            'shipping_chaarges' => Cart::shippingChaarges(),
            'applied_coupen_code' => Cart::getAppliedCoupenCode(),
            'coupenModel' => $coupenForm
        ]);
    }

    /**
     * Function for tabs function add product in cart
     * @return Response
     */
    public function actionAddToCart()
    {
        if( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ){
            $product = Yii::$app->request->post('product');
//            echo '<pre>';print_r($product);die;
            $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
            if(! isset($cartProduct[$product['id']]) ){
                $cartProduct[$product['id']] = $product;
                Yii::$app->session->set('cart',$cartProduct);
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $this->asJson([
                'success'=>true,
                'redirect_url'=> Url::to(['/cart']),
                'message' => 'Item added in cart successfully'

            ]);
        }
    }

    /**
     * Function for update Cart Product
     * @return Response
     */
    public function actionUpdateCart(){
        if( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ){
            $cartItems = Yii::$app->request->post('cart');
            $cartSession = Yii::$app->session->get('cart');

            if( isset($cartItems) && count($cartItems)){
                foreach ($cartItems as $item) {
                    $qty = $item['quantity'];
                    $id = $item['id'];
                    $cartSession[$id]['quantity'] = $qty;
                }
            }

//            echo '<pre>';print_r($cartItems);
//            echo '<pre>';print_r($cartSession);
//            die;
            Yii::$app->session->set('cart',$cartSession);

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $this->asJson([
                'success'=>true,
                'redirect_url'=> Url::to(['/cart']),
                'message' => 'Cart updated successfully'

            ]);
        }
    }

    /**
     * Update Cart Single Product
     * @return Response
     */
    public function actionUpdateSingleCartItem(){
        if( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ){
            $updatedCart = Yii::$app->request->post('product');
            $item_id = Yii::$app->request->post('id');
            $cartItems = Yii::$app->session->get('cart');
            //echo $item_id;
           // Yii::$app->session->set('cart','');
            //echo '<pre>';print_r($cartItems);
           // echo '<pre>';print_r($updatedCart);
            if( isset($cartItems[$item_id]) ){
                $cartItems[$item_id] = $updatedCart;
                //echo '<pre>';print_r($cartItems);die;
                Yii::$app->session->set('cart',$cartItems);//Update sesssion cart items
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $this->asJson([
                    'success'=>true,
                    'redirect_url'=> Url::to(['/cart']),
                    'message' => 'Cart updated successfully'
                ]);
            }
        }
    }

    /**
     * Function for remvoe item from Cart
     * @return Response
     */
    public function actionRemoveItem(){
        if( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ){
            $itemId = Yii::$app->request->post('id');
            if( isset($itemId) && $itemId > 0){
                $cartItems = Yii::$app->session->get('cart');
                unset($cartItems[$itemId]);
                Yii::$app->session->set('cart',$cartItems);
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $this->asJson([
                    'success'=>true,
                    'redirect_url'=> Url::to(['/cart']),
                    'message' => 'Cart item removed successfully'
                ]);
            }
        }
    }

    /**
     * Function for apply copen code
     */
    public function actionCoupenCodeApply(){
        $coupenForm = new CoupenForm();
        if( Yii::$app->request->isPost && $coupenForm->load(Yii::$app->request->post()) && $coupenForm->validate() ){
            $postData = Yii::$app->request->post('CoupenForm');
            Yii::$app->session->set('coupen_code',$postData['coupen_code']);
            Yii::$app->session->setFlash('success', "Coupen code applied successfully.");
            return $this->redirect(['/cart']);
        }else{
            Yii::$app->session->setFlash('error', "Opps! Error in applied coupen code.");
            return $this->redirect(['/cart']);
        }
    }

}
