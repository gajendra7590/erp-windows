<?php
use yii\base\view;
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
$this->title = 'ERP Windows - Order Success';

//echo '<pre>';print_r($orderDetail);die;
?>
<?php echo $this->render('@app/views/other_pages/loader'); ?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tab-content dashboard_Content">
                        <!-- Tap Panel -->
                        <div id="menu1" class="tab-pane fade in active">
                            <div class="dashboard_Panel">
                                <p>
                                   <b><h4>Hello, <?= ucfirst($orderDetail['user']['first_name']);?>.</h4></b>
                                    <br>
                                </p>
                                <p>
                                    <div class="alert alert-success" role="alert">
                                        <h4>Your order has been placed successfully.</h4>
                                    </div>
                                </p>
                                <hr />
                                <p>
                                   <b>Your order # is : <?= isset($orderDetail['id'])? str_pad( $orderDetail['id'], 6, '0', STR_PAD_LEFT):0;?></b>
                                    <br />
                                    <br />
                                    <span>
                                        An email reciept include your order detail has been sent to your email address
                                        <b><i><?= ($orderDetail['user']['email']);?></i></b>
                                    </span>
                                </p><br>
                                <p>
                                    <b>This order Will be shipped to</b>
                                </p>
                                <br/>
                                <p>
                                    <strong>
                                        <?=
                                        '<i class="fa fa-address-card" aria-hidden="true"></i> '.
                                        ucwords( $orderDetail['shippingAddress']['first_name'].' ,'.
                                            $orderDetail['shippingAddress']['last_name']).' <br />'
                                        ?>
                                    </strong>
                                    <?=
                                    '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.ucwords($orderDetail['shippingAddress']['address_line_one'].' '.
                                        $orderDetail['shippingAddress']['address_line_two']).' <br/>';
                                    ?>
                                    <?=
                                    '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.ucwords($orderDetail['shippingAddress']['city'].' ,'.
                                        $orderDetail['shippingAddress']['state'].' '.
                                        strtoupper($orderDetail['shippingAddress']['country']).' <br/>'.
                                        '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$orderDetail['shippingAddress']['zipcode']).' <br/>';
                                    ?>
                                    <?=
                                    '<i class="fa fa-phone" aria-hidden="true"></i> '.($orderDetail['shippingAddress']['phone']).'<br />'
                                    ?>
                                </p>
                                <br/>
                                <p>
                                    <b>Payment Method : </b> Stripe Card
                                </p>
                                <br/>
                                <p>
                                    <a style="color: #fff !important;" href="<?= Url::to(['/my-account']);?>" class="btn btn-sm primary_Btn">Go To MY ACCOUNT</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->
