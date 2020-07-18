<?php
use yii\base\view;
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
$this->title = 'ERP Windows - Account';
?>
<?php echo $this->render('@app/views/other_pages/loader'); ?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">My Account</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <ul class="nav dashtab-btn">
                        <li class="active"><a data-toggle="tab" href="#menu1">Dashboard</a></li>
                        <li><a data-toggle="tab" href="#menu2">Orders</a></li>
                        <li><a data-toggle="tab" href="#menu3">Wishlist</a></li>
                        <li><a data-toggle="tab" href="#menu4">Account Details</a></li>
                        <li><a data-toggle="tab" href="#menu5">Change Password</a></li>
                        <li>
                            <?php echo Html::tag('a', 'Logout', [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to log out?'
                                    ],
                                    'title' => 'Logged Out Your Account',
                                    'data-pjax' => 0,
                                    'data-method' => 'post',
                                    'href' => Url::to(['/logout'])
                                ]
                            );
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                    <div class="tab-content dashboard_Content">
                        <!-- Tap Panel -->
                        <div id="menu1" class="tab-pane fade in active">
                            <?php echo $this->render('tabs/dashboard', array()); ?>
                        </div>
                        <!-- Tap Panel -->
                        <!--// Tap Panel -->
                        <div id="menu2" class="tab-pane fade">
                            <h3>Orders</h3>
                            <?php echo $this->render('tabs/orders', array('orders_list' => $orders_list)); ?>
                        </div>
                        <!-- Tap Panel -->
                        <!-- // Tap Panel -->
                        <div id="menu3" class="tab-pane fade">
                            <h3>Wishlist</h3>
                            <?php echo $this->render('tabs/wishlist', array('product_wishlist' => $product_wishlist)); ?>
                        </div>
                        <!--// Tap Panel -->
                        <!-- // Tap Panel -->
                        <div id="menu4" class="tab-pane fade">
                            <h3>Account Details</h3>
                            <?php echo $this->render('tabs/account_detail', array('userModel' => $userModel)); ?>
                        </div>
                        <!-- Tap Panel -->
                        <!-- // Tap Panel -->
                        <div id="menu5" class="tab-pane fade">
                            <h3>Change Password</h3>
                            <?php echo $this->render('tabs/change_password', array('model' => $changePasswordModel)); ?>
                        </div>
                        <!--// Tap Panel -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->
