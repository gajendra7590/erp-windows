<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Request;
use yii\web\Response;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap\ActiveForm;
use yii\web\UploadedFile;

use common\helpers\Cart;
use common\helpers\PaymentHelpers;
use common\helpers\Common;
use common\helpers\SendEmail;
//Models OR Forms
use frontend\models\LoginForm;
use frontend\models\BillingForm;
use frontend\models\ShippingForm;
use frontend\models\CoupenForm;

use common\models\User;
use common\models\ProductsOrders;
use common\models\ProductsOrdersItems;
use common\models\ProductsVariations;
use common\models\ProductsOrdersVariableType;


class CheckoutController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['cart'],
                'rules' => [
                    [
                        'actions' => [
                            'checkout','login-submit','login-validate',
                            'billing-validate','billing-submit',
                            'shipping-validate','shipping-submit',
                            'payment-success','coupen-code-apply',
                            'order-summary'
                        ],
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
                    'login-submit' => ['post'],
                    'login-validate' => ['post'],
                    'billing-submit' => ['post'],
                    'billing-validate' => ['post'],
                    'shipping-submit' => ['post'],
                    'shipping-validate' => ['post'],
                    'payment-success' => ['post'],
                    'coupen-code-apply' => ['post'],
                ],
            ],
        ];
    }

    public function actionCheckout()
    {
        if(( Yii::$app->session->get('cart') == null) ){
            Yii::$app->session->setFlash('warning', "Your cart is empty,please add product");
            return $this->redirect(['/cart']);
        }

        $model = new LoginForm();
        $billingModel = new BillingForm();
        $shippingModel = new ShippingForm();
        $coupenForm = new CoupenForm();
        $userModel = Yii::$app->user->identity;
        $this->view->params['body_class'] = 'Products-checkout-page';
        return $this->render('checkout',[
                'checkout_data' => [
                    'model' => $model,
                    'userModel' => $userModel,
                    'billingModel' => $billingModel,
                    'shippingModel' => $shippingModel,
                    'applied_coupen_code' => Cart::getAppliedCoupenCode(),
                    'coupenModel' => $coupenForm,
                    'cart_items' => Cart::Items(),
                    'cart_total' => Cart::cartTotal(),
                    'cartItemsCount' => Cart::cartItemsCount(),
                    'shipping_chaarges' => Cart::shippingChaarges(),
                ]
        ]);
    }

    public function actionLoginValidate(){
        $model = new LoginForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }
    }

    public function actionLoginSubmit()
    {
        $model = new LoginForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->login()){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->asJson([
                    'success' => true,
                    'message' => 'You have been loggedin successfully'
                ]);
            }else{
                return $this->asJson([
                    'success' => false,
                    'message' => 'Error in logged in'
                ]);
            }
        }
    }

    public function actionBillingValidate(){
        $model = new BillingForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }

    }

    public function actionBillingSubmit()
    {
        $model = new BillingForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $BillingForm = Yii::$app->request->post('BillingForm');
            Yii::$app->session->set('BillingForm',$BillingForm);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->asJson([
                'success' => true,
                'message' => 'Billing form saved'
            ]);
        }
    }


    public function actionShippingValidate(){
        $model = new ShippingForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }

    }

    public function actionShippingSubmit()
    {
        $model = new ShippingForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $ShippingForm = Yii::$app->request->post('ShippingForm');
            Yii::$app->session->set('ShippingForm',$ShippingForm);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->asJson([
                'success' => true,
                'message' => 'Shipping form saved'
            ]);
        }
    }

    public function actionOrderSummary(){
        echo 'dsdsds';die;
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
            return $this->redirect(['/checkout']);
        }else{
            Yii::$app->session->setFlash('error', "Opps! Error in applied coupen code.");
            return $this->redirect(['/checkout']);
        }
    }

    public function actionPaymentSuccess(){
        if (Yii::$app->request->isAjax) {
            $payment = Yii::$app->request->post();
            if($payment['token']){
                $BillingForm = Yii::$app->session->get('BillingForm');
                $ShippingForm = Yii::$app->session->get('ShippingForm');
                $cartItems = Cart::Items();
                $cartTotal = Cart::cartTotal();
                $cartItemsCount = Cart::cartItemsCount();
                $shippingChaarges = Cart::shippingChaarges();

                //User Section
                $userObj = array();
                if(!Yii::$app->user->isGuest){
                    //Update User Detail
                    $userObj = Common::updateUserData( $BillingForm );
                }else{
                    $userPassoword = rand(111111,999999);
                    $userObj = Common::createUser($BillingForm,$payment,$userPassoword);
                    if($userObj){
                        SendEmail::CreateAccountAfterPayment($userPassoword,$userObj);
                        Yii::$app->user->login($userObj,  (3600 * 24 * 30) );
                    }
                }

                //Payment Section Code
                $chargeObj = [
                    "amount" => ( ($cartTotal + $shippingChaarges ) * 100),
                    "currency" => "USD",
                    "source" => $payment['token'],
                    'receipt_email' => $payment['email'],
                    "description" => $cartItemsCount. ' Products ($'.number_format( ($cartTotal + $shippingChaarges ),2 ).')'
                ];
                //Call Charge API
                $paymentDone =  PaymentHelpers::charge($chargeObj);

                if( isset($paymentDone['error']) && ($paymentDone['error'] == false) ){
                    $paymentModel = Common::savePaymentData($userObj,$paymentDone);

                    //Order Section code
                    $order = new ProductsOrders();
                    $order->payment_id = $paymentModel->id;
                    $order->user_id = $userObj->id;
                    $order->coupen_code = Cart::getAppliedCoupenCode();
                    $order->cart_total = $cartTotal;
                    $order->delhivery_charges = Cart::shippingChaarges();
                    $order->booking_date = date('Y-m-d');
                    $order->expected_delhivery_date = date('Y-m-d', strtotime(' +4 day'));
                    $order->order_prod_uid = Cart::getProductUserIds();
                    $orderSave = $order->save( true );
                    if($orderSave){
                        //Save Shipping Address
                        Common::ProductsOrdersShippingAddress($order,$ShippingForm);
                        //Save Cart Items
                        if(!empty($cartItems)){
                            Common::saveOrderItems($order,$cartItems);
                        }

                        //Send Order Booking Confimation email
                        $orderData = Common::getProductOrderData($order->id);
                        SendEmail::OrderBookingConfirmation($orderData);

                        //Return Success Response

                        Yii::$app->session->set('BillingForm',null);
                        Yii::$app->session->set('ShippingForm',null);
                        Yii::$app->session->set('coupen_code',null);
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return $this->asJson([
                            'success'=>true,
                            'message' => 'Your Payment Done && Order has been confirmed successfully',
                            'redirect_url' => Url::to(['/order-success?order_id='.$order->id]),
                        ]);
                    }else{ // IF Payment Not Done
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return $this->asJson([
                            'success' => false,
                            'message' => 'Opps! Payment request failure,not completed '
                        ]);
                    }

                }
            }else{
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $this->asJson([
                    'success' => false,
                    'message' => 'Invalid OR No Payment Token Found'
                ]);

            }
        }

    }

}
