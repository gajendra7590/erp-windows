<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\web\JsExpression;
use ruskid\stripe\StripeCheckout;
use ruskid\stripe\StripeCheckoutCustom;
$this->registerJsFile("@web/js/cart.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form action="#">
        <h3>Payment Info</h3>
        <!--   Check Infor Frm -->
        <div class="check-info-frm">
            <div class="pay_checkout">
                <p>
                    <span class="gwt-CheckBox">
                        <input value="0" id="avi-no-fuel-stops" tabindex="1" class="avi-fuel-stops-checkbox termsCheck" type="checkbox">
                        <label for="avi-no-fuel-stops" class="avi-fuel-stops-checkbox-label">
                            I hope you read all the terms & conditions of ERP Windows and you agree with our
                            <a href="<?= Url::to(['/terms-and-conditions']);?>" target="_blank"><u>terms and conditions</u></a>
                        </label>
                    </span>
                </p>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="check-btn-next">
                        <button type="button" data-page_id="orderForm" class="primary_Btn pull-left previousPage">
                            Back to order summary
                        </button>
                        <?=
                        StripeCheckoutCustom::widget([
                            'action' => '/checkout',
                            'userEmail' => isset($userModel->email)?$userModel->email:'',
                            'label' => 'Pay ( $'.number_format(($cart_total + $shipping_chaarges),2).' )',
                            'name' => isset(Yii::$app->session->get('BillingForm')['first_name'])
                                ?ucwords(Yii::$app->session->get('BillingForm')['first_name'].' '.Yii::$app->session->get('BillingForm')['last_name'])
                                :'Product Payment',
                            'description' => $cartItemsCount.' product ($'.number_format(($cart_total + $shipping_chaarges),2).')',
                            'amount' => ( ($cart_total + $shipping_chaarges) * 100 ),
                            'image' => 'https://images-platform.99static.com/XgUB4wz6b9CICkgtj8U5gXE_Dxc=/500x500/top/smart/99designs-contests-attachments/58/58804/attachment_58804455',
                            'buttonOptions' => [
                                'class' => 'primary_Btn stripePayBtn disabled_pay_btn',
                            ],
                            'tokenFunction' => new JsExpression('function(token) {  
                                var formObj = new FormData();
                                formObj.append("token",token.id);
                                formObj.append("client_ip",token.client_ip);
                                formObj.append("created",token.created);
                                formObj.append("email",token.email);
                                formObj.append("livemode",token.livemode);
                                formObj.append("type",token.type);
                                formObj.append("used",token.used);  
                                $.ajax({
                                    url: "'.Url::to(['/checkout/payment-success']).'",
                                    type: "post",
                                    data: formObj,
                                    processData: false,
                                    contentType: false, 
                                    beforeSend:function(){ 
                                       $(".loader_image").show();
                                    },
                                    complete:function(){
                                       $(".loader_image").hide();
                                    },
                                    success: function(response) { 
                                        if(response.success == true){
                                          toastr.success(response.message,"Payment Done")
                                          window.location.href = response.redirect_url
                                        }else if(response.success == false){
                                           toastr.error(response.message,"Payment Failure")  
                                           return false;
                                        }
                                    },
                                    error: function() {
                                        toastr.error("Something went wrong","Payment Failure")
                                        return false;
                                    }
                                });   
                            }'),
                            'openedFunction' => new JsExpression('function() {  
                                         
                            }'),
                            'closedFunction' => new JsExpression('function() {
                                        
                            }'),
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- //  Check Infor Frm -->
    </form>
</div>
