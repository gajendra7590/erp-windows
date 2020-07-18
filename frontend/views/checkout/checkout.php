<?php
use yii\helpers\Html;
use yii\base\view;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
$this->title = 'ERP Windows - Checkout';

$this->registerJsFile("@web/js/checkout.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);

?>
<?php echo $this->render('@app/views/other_pages/loader'); ?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Area -->
    <section class="checkout_Area">
        <div class="container">
            <!-- Row BLock -->
            <div class="row">
                <div class="col-sm-12">

                    <?php if( Yii::$app->user->isGuest){ ?>
                        <!-- Load User Login View -->
                        <?php echo $this->render('forms/userArea', $checkout_data); ?>
                    <?php } ?>

                    <!-- Load Coupen Code View -->
                    <?php echo $this->render('forms/coupenArea', $checkout_data); ?>

                </div>
            </div>
            <!-- Row BLock -->
            <!-- Checkout Form -->
            <div class="checkout_form">
                <!--  Row BLock -->
                <div class="row allForms" id="billingForm">
                    <!-- Load User billingForm View -->
                    <?php echo $this->render('forms/billingForm', $checkout_data); ?>
                </div>
                <!-- // Row BLock -->
                <!--  Row BLock -->
                <div class="row allForms" id="shipingForm">
                    <!-- Load User shipingForm View -->
                    <?php echo $this->render('forms/shipingForm', $checkout_data); ?>
                </div>
                <!--// Row BLock -->
                <!--  Row BLock -->
                <div class="row allForms" id="orderForm">
                    <!-- Load User orderForm View -->
                    <?php echo $this->render('forms/orderForm', $checkout_data); ?>
                </div>
                <!--//  Row BLock -->
                <!--  Row BLock -->
                <div class="row allForms" id="paymentForm">
                    <!-- Load User paymentForm View -->
                    <?php echo $this->render('forms/paymentForm', $checkout_data); ?>
                </div>
                <!-- // Row BLock -->
            </div>
            <!-- // Checkout Form -->
        </div>
    </section>
    <!-- // Checkout Area -->
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->