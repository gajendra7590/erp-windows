<?php
namespace common\helpers;

use Yii;
use common\helpers\Utils;
use common\models\User;
use common\models\Products;
use common\models\ProductsOrders;
use common\models\ProductsPayment;
use common\models\ProductsOrdersShippingAddress;
use common\models\ProductsOrdersItems;
use common\models\ProductsOrdersItemsVars;


use common\models\ProductsVarsRows;
use common\models\ProductsVarsRowsItems;



class Common
{

    //Function for if user logged in then update billing detail/profile detail
    public static function updateUserData($BillingForm){
        $id = Yii::$app->user->identity->id;
        $user = User::findOne($id);
        $user->first_name = $BillingForm['first_name'];
        $user->last_name = $BillingForm['last_name'];
        $user->email = $BillingForm['email'];
        $user->phone = $BillingForm['phone'];
        $user->company_name = $BillingForm['company_name'];
        $user->country = $BillingForm['country'];
        $user->state = $BillingForm['state'];
        $user->city = $BillingForm['city'];
        $user->zip = $BillingForm['zipcode'];
        $user->address_line_one = $BillingForm['address_line_one'];
        $user->address_line_two = $BillingForm['address_line_two'];
        $user->save();
        return $user;
    }


    //Create New User Only USE IN STRIPE PYAMNET
    public static function createUser($BillingForm,$payment,$userPassoword){
        $user = new User();
        $user->first_name = $BillingForm['first_name'];
        $user->last_name = $BillingForm['last_name'];
        $user->email = $BillingForm['email'];
        $user->phone = $BillingForm['phone'];
        $user->company_name = $BillingForm['company_name'];
        $user->country = $BillingForm['country'];
        $user->state = $BillingForm['state'];
        $user->city = $BillingForm['city'];
        $user->zip = $BillingForm['zipcode'];
        $user->address_line_one = $BillingForm['address_line_one'];
        $user->address_line_two = $BillingForm['address_line_two'];
        $user->ip_address = $payment['client_ip'];
        $user->role = 2;
        $user->status = 1;
        $user->setPassword($userPassoword);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
        return $user;
    }

    //Save Billing Address Only USE IN STRIPE PYAMNET
    public static function ProductsOrdersShippingAddress($orderModel,$billingData){
        $model = new ProductsOrdersShippingAddress();
        $model->products_order_id = $orderModel->id;
        $model->same_as_billing_address = $billingData['same_as_billing_address'];
        $model->first_name = $billingData['first_name'];
        $model->last_name = $billingData['last_name'];
        $model->company_name = $billingData['company_name'];
        $model->email = $billingData['email'];
        $model->phone = $billingData['phone'];
        $model->phone2 = null;
        $model->country = $billingData['country'];
        $model->state = $billingData['state'];
        $model->city = $billingData['city'];
        $model->zipcode = $billingData['zipcode'];
        $model->address_line_one = $billingData['address_line_one'];
        $model->address_line_two = $billingData['address_line_two'];
        $model->address_type = $billingData['zipcode'];
        $model->order_note = $billingData['order_note'];

        $model->save( false);
        return $model;
    }

    //Save Payment Dat Only USE IN STRIPE PYAMNET
    public static function savePaymentData($userObj,$payment){
        $model = new ProductsPayment();
        $model->payment_success_id = isset($payment['response']['id'])?$payment['response']['id']:NULL;
        $model->user_id = $userObj->id;
        $model->payment_name = isset($payment['response']['billing_details']['name'])?($payment['response']['billing_details']['name']):NULL;
        $model->payment_email = isset($payment['response']['billing_details']['email'])?($payment['response']['billing_details']['email']):NULL;
        $model->payment_phone = isset($payment['response']['billing_details']['phone'])?($payment['response']['billing_details']['phone']):NULL;
        $model->payment_description = isset($payment['response']['description'])?$payment['response']['description']:NULL;
        $model->payment_amount = isset($payment['response']['amount'])?$payment['response']['amount']:0;
        $model->payment_created = isset($payment['response']['created'])?$payment['response']['created']:NULL;
        $model->payment_currency = isset($payment['response']['currency'])?$payment['response']['currency']:NULL;
        $model->payment_receipt_email = isset($payment['response']['receipt_email'])?$payment['response']['receipt_email']:'';
        $model->payment_receipt_url = isset($payment['response']['receipt_url'])?$payment['response']['receipt_url']:NULL;
        $model->payment_brand = isset($payment['response']['payment_method_details']['card']['brand'])?$payment['response']['payment_method_details']['card']['brand']:'';
        $model->payment_exp_month = isset($payment['response']['payment_method_details']['card']['exp_month'])?$payment['response']['payment_method_details']['card']['exp_month']:'';
        $model->payment_exp_year = isset($payment['response']['payment_method_details']['card']['exp_year'])?$payment['response']['payment_method_details']['card']['exp_year']:'';
        $model->payment_last4 = isset($payment['response']['payment_method_details']['card']['last4'])?$payment['response']['payment_method_details']['card']['last4']:'';
        $model->payment_country = isset($payment['response']['payment_method_details']['card']['country'])?$payment['response']['payment_method_details']['card']['country']:'';
        $model->payment_network = isset($payment['response']['payment_method_details']['card']['network'])?$payment['response']['payment_method_details']['card']['network']:'';
        $model->billing_city = ($payment['response']['billing_details']['address']['city'])?$payment['response']['billing_details']['address']['city']:NULL;
        $model->billing_state = ($payment['response']['billing_details']['address']['state'])?$payment['response']['billing_details']['address']['state']:NULL;
        $model->billing_country = ($payment['response']['billing_details']['address']['country'])?$payment['response']['billing_details']['address']['country']:NULL;
        $model->billing_postal_code = ($payment['response']['billing_details']['address']['postal_code'])?$payment['response']['billing_details']['address']['postal_code']:NULL;
        $model->billing_line1 = ($payment['response']['billing_details']['address']['line1'])?$payment['response']['billing_details']['address']['line1']:NULL;
        $model->billing_line2 = ($payment['response']['billing_details']['address']['line2'])?$payment['response']['billing_details']['address']['line2']:NULL;
        $model->payment_status = 1;
        $save = $model->save( false);
        if($save){
            return $model;
        }
    }

    //Save Cart Items
    public static function saveOrderItems($order,$cartItems){
        if(!empty($cartItems)){
            foreach ($cartItems as $k => $item){
                $orderItemObj = new ProductsOrdersItems();
                $orderItemObj->products_orders_id = $order->id;
                $orderItemObj->product_id = $item['id'];
                $orderItemObj->product_quantity = $item['quantity'];
                $orderItemObj->product_price = $item['price'];
                $orderItemObj->product_rprice = $item['rprice'];
                $orderItemObj->product_type = $item['product_type'];
                if($item['product_type'] == '2'){
                    $orderItemObj->product_variation_id = $item['var']['id'];
                    self::saveOrderItemVariable($item['var']['id']);
                }
                $orderItemObj->save();
            }
        }
    }

   //Function for save varaible for product type = Variable
    public static function saveOrderItemVariable($var_id){
        $variable = ProductsVarsRows::find()
            ->with([
                'productsVarsRowsItems' => function($model){
                    $model->with([
                        'varType' => function($model){
                            $model->select('id,vname');
                        }
                    ])->select('*');
                },
            ])
            ->where(['id' => $var_id])
            ->asArray()->one();
        $prodOrderVarType = new ProductsOrdersItemsVars();
        $prodOrderVarType->product_var_id = $variable['id'];
        $prodOrderVarType->product_id = $variable['product_id'];
        $prodOrderVarType->sale_price = $variable['sale_price'];
        $prodOrderVarType->regular_price = $variable['regular_price'];
        $prodOrderVarType->var_rows_json_data = serialize($variable);
        $prodOrderVarType->save();
    }

    //Function for get product order data with order ID
    public static function getProductOrderData($order_id){
        return  $product = ProductsOrders::find()
            ->with([
                'productsOrdersStatus' => function($model){
                    $model->select('id,name,title');
                },
                'payment' => function($model){
                    $model->select('id,payment_success_id,payment_receipt_url,payment_brand,payment_exp_month,payment_exp_year,payment_last4,payment_amount');
                },
                'user' => function($model){
                    $model->select('id,first_name,last_name,email,phone,profile_photo,gender,dob,address_line_one
                   address_line_two,country,state,city,zip,role,ip_address,status');
                },
                'shippingAddress' => function($model){
                    $model->select('*');
                },
                'productsOrdersItems'  => function($model){
                    $model->select('*')
                        ->with(['product' => function($model){
                            $model->select('id,product_categories,title,slug,short_desc,featured_image');
                        }]);
                }
            ])
            ->where(['id'=>$order_id])
            ->asArray()
            ->one();
    }



} //Main Class End here