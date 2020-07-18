<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
?>

<div id="orderDetailModal" class="fade modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span aria-hidden="true">
                        <img src="theme/images/icons/close-icn-popup.png" alt="close icn">
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContent">
                </div>
            </div>

        </div>
    </div>
</div>


<div class="dashboard_Panel orders_myac">
    <div class="table_desc">
        <div class="cart_page table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="product_remove">Order ID</th>
                    <th class="product_thumb">Order Date</th>
                    <th class="product_name">Order Status</th>
                    <th class="product-price">Total Pay</th>
                    <th class="product_quantity">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if( (isset($orders_list)) && (!empty($orders_list)) ){
                    foreach ($orders_list as $k => $order){ ?>
                <tr>
                    <td class="product_remove">
                        #<?= str_pad( $order['id'], 6, '0', STR_PAD_LEFT);?>
                    </td>
                    <td class="product_thumb">
                        <?= date('d, M Y',strtotime($order['booking_date']));?>
                    </td>
                    <td class="product_name">
                        <?= isset($order['productsOrdersStatus']['name'])?$order['productsOrdersStatus']['name']:'No Status';?>
                    </td>
                    <td class="product-price">
                        $<?= number_format($order['total_pay'],2);?>
                    </td>
                    <td class="product_name">
                        <button class="btn btn-sm primary_Btn viewOrderSummary" title = 'View Order Summary'
                                data-url="<?= Url::to(['/account/view-order-summary','id' => $order['id']]);?>" style="padding: 5px 15px;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
