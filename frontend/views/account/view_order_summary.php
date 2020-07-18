<?php
use yii\helpers\Html;
use common\helpers\Utils;
use yii\helpers\Url;

//echo '<pre>';print_r($orderDetail); die;

?>
<main class="order-Summary">
    <h1>order summary</h1>
    <!-- Order Details-->
    <section class="order_Details">
        <div class="container">
            <div class="order_ele">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="order_ele-wrap">
                            <h2 class="order-ele-heading">Order
                                <span>
                                    #<?= isset($orderDetail['id'])? str_pad( $orderDetail['id'], 6, '0', STR_PAD_LEFT):0;?>
                                </span>
                            </h2>
                            <div class="order-pay-btn">
                                <a href="<?= $orderDetail['payment']['payment_receipt_url'];?>"
                                   title="Download Payment Reciept"
                                   class="btn primary_Btn"
                                   target="_blank">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Payment Reciept
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <!--Order Details Contetn-->
                        <div class="order_details-content">
                            <h3 class="order-gest-heading">User Detail</h3>
                            <div class="table-responsive order-Tbl-cst">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            $img = '';
                                            if($orderDetail['user']['profile_photo']!=NULL){
                                                $img = '<div class="media feture_Tble-user">
                                                                <div class="media-left">
                                                                    <div class="img_circle">
                                                                        <span class="media-object" title="'.$orderDetail['user']['first_name'].'">
                                                                        '.Html::img(Utils::IMG_URL($orderDetail['user']['profile_photo']),[
                                                        'onerror'=>"this.src = $(this).attr('altSrc')",
                                                        'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')
                                                    ]).'                                                                     
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div>';
                                            }else{
                                                $img = '<div class="media feture_Tble-user table-icon-name">
                                                                <div class="media-left"> 
                                                                 
                                                                    <div class="img_circle bg-orange"> 
                                                                        <span class="media-object" title="'.$orderDetail['user']['first_name'].'">
                                                                            '.Utils::getShortString($orderDetail['user']['first_name'].' '.$orderDetail['user']['last_name']).'
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div>';
                                            }
                                            echo $img;
                                            ?>
                                        </td>
                                        <td><?= isset($orderDetail['user']['first_name'])?$orderDetail['user']['first_name']:''; ?></td>
                                        <td><?= isset($orderDetail['user']['last_name'])?$orderDetail['user']['last_name']:''; ?></td>
                                        <td><?= isset($orderDetail['user']['email'])?$orderDetail['user']['email']:''; ?></td>
                                        <td><?= isset($orderDetail['user']['phone'])?$orderDetail['user']['phone']:''; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="order_details-content">
                            <h3 class="order-gest-heading">Order Quick Summary</h3>
                            <div class="table-responsive order-Tbl-cst">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Coupen Code</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?= isset($orderDetail['id'])? str_pad( $orderDetail['id'], 6, '0', STR_PAD_LEFT):'--';?>
                                        </td>
                                        <td>
                                            <?= isset($orderDetail['coupen_code'])?$orderDetail['coupen_code']:'--'; ?>
                                        </td>
                                        <td>
                                            <?= isset($orderDetail['booking_date'])?( date('D, m Y',strtotime($orderDetail['booking_date']))):'--'; ?>
                                        </td>
                                        <td>
                                            <?= isset($orderDetail['productsOrdersStatus']['name'])?$orderDetail['productsOrdersStatus']['name']:'--'; ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="order_details-content">
                            <h3 class="order-gest-heading">Shipping Address</h3>
                            <div class="order-ship-addre">
                                <strong>
                                    <?=
                                    '<i class="fa fa-address-card-o" aria-hidden="true"></i> '.
                                    ucwords( $orderDetail['shippingAddress']['first_name'].' ,'.
                                        $orderDetail['shippingAddress']['last_name']).' <br />'
                                    ?>
                                </strong>

                                 <div class="address_section">
                                     <span class="addr_line_1">
                                         <i class="fa fa-map-o" aria-hidden="true"></i>
                                         <?= $orderDetail['shippingAddress']['address_line_one'];?>
                                     </span>
                                     <span class="addr_line_2">
                                         <?= $orderDetail['shippingAddress']['address_line_two'];?>
                                     </span>
                                     <span class="addr_city_state">
                                         <?= $orderDetail['shippingAddress']['city'].', '.$orderDetail['shippingAddress']['state'];?>
                                     </span>
                                     <span class="addr_country_zip">
                                         <?= strtoupper($orderDetail['shippingAddress']['country']).' '.$orderDetail['shippingAddress']['zipcode'];?>
                                     </span>
                                 </div>
                                <div class="phone_number">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <?= $orderDetail['shippingAddress']['phone'];?>
                                </div>
                            </div>
                        </div>
                        <!-- //Order Details Contetn-->
                        <div class="order-pay-summry">
                            <div class="order_details-content pay-sum-order">
                                <h3 class="order-gest-heading">Cart Items & Payment Summary</h3>
                                <div class="table-responsive order-Tbl-cst">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="order-product-thum">#</th>
                                            <th class="order-product-name">Product</th>
                                            <th class="order-product-total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if( isset($orderDetail['productsOrdersItems']) && !empty($orderDetail['productsOrdersItems'])){
                                            foreach ($orderDetail['productsOrdersItems'] as $k => $item){ ?>
                                                <tr>
                                                    <td class="order-product-thum">
                                                        <?php
                                                        $img = '';
                                                        if($item['product']['featured_image']!=NULL){
                                                            $img = '<div class="media feture_Tble-user">
                                                                <div class="media-lefts">
                                                                    <div class="img_circle">
                                                                        <span class="media-object" title="'.$item['product']['title'].'">
                                                                        '.Html::img(Utils::IMG_URL($item['product']['featured_image']),[
                                                                    'onerror'=>"this.src = $(this).attr('altSrc')",
                                                                    'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')
                                                                ]).'                                                                     
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div>';
                                                        }else{
                                                            $img = '<div class="media feture_Tble-user table-icon-name">
                                                                <div class="media-left"> 
                                                                 <br/>
                                                                    <div class="img_circle bg-orange"> 
                                                                        <span class="media-object" title="'.$item['product']['title'].'">
                                                                            '.$item['product']['title'].'
                                                                        </span>
                                                                    </div>
                                                                </div> 
                                                            </div>';
                                                        }
                                                        echo $img;
                                                        ?>

                                                    </td>
                                                    <td class="order-product-name">
                                                    <span>
                                                        $(<?= $item['product_price'];?> x <?= $item['product_quantity'];?>)
                                                        Product ( <?= substr($item['product']['title'],0,50).'...';?> )
                                                    </span>
                                                    </td>
                                                    <td>
                                                        $<?= number_format($item['product_price'] * $item['product_quantity'],2);?>
                                                    </td>
                                                </tr>
                                            <?php }} ?>
                                        <tr>
                                            <td><i class="fa fa-2x fa-ship" aria-hidden="true"></i></td>
                                            <td class="order-pay-tfoot">
                                                <strong>Shipping Charges</strong>
                                            </td>
                                            <td class="order-pay-tfoot">
                                                $<?= number_format($orderDetail['delhivery_charges'],2);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-2x fa-calculator" aria-hidden="true"></i></td>
                                            <td class="order-pay-tfoot">
                                                <strong>Sub Total</strong>
                                            </td>
                                            <td>
                                                $<?= number_format($orderDetail['cart_total'] + $orderDetail['delhivery_charges'],2);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-2x fa-calculator" aria-hidden="true"></td>
                                            <td class="order-pay-tfoot">
                                                <strong>Total( USD )</strong>
                                            </td>
                                            <td>
                                                <strong>$<?= number_format($orderDetail['cart_total'] + $orderDetail['delhivery_charges'],2);?></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="order-payment">
                            <h3 class="order-gest-heading">Payment Card Info</h3>
                        </div>
                        <div class="order-pay-content">
                            <div class="order-pay-item">
                                <h5>Id</h5>
                                <p>#<?= isset($orderDetail['payment']['payment_success_id'])?$orderDetail['payment']['payment_success_id']:'';?></p>
                            </div>
                            <div class="order-pay-item">
                                <h5>Payment Receipt Email</h5>
                                <p><?= isset($orderDetail['payment']['payment_receipt_email'])?$orderDetail['payment']['payment_receipt_email']:'';?></p>
                            </div>
                            <div class="order-pay-item">
                                <h5>Card Brand</h5>
                                <p><?= isset($orderDetail['payment']['payment_brand'])?$orderDetail['payment']['payment_brand']:'';?></p>
                            </div>
                            <div class="order-pay-item">
                                <h5>Card Exp Month</h5>
                                <p><?= isset($orderDetail['payment']['payment_exp_month'])?$orderDetail['payment']['payment_exp_month']:'';?></p>
                            </div>
                            <div class="order-pay-item">
                                <h5>Card Exp Year</h5>
                                <p><?= isset($orderDetail['payment']['payment_exp_year'])?$orderDetail['payment']['payment_exp_year']:'';?></p>
                            </div>
                            <div class="order-pay-item">
                                <h5>Card Last 4</h5>
                                <p><?= isset($orderDetail['payment']['payment_last4'])?$orderDetail['payment']['payment_last4']:'';?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
