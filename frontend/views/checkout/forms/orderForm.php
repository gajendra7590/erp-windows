<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form action="#">
        <h3>Your order</h3>
        <!-- ChecK Info Frm -->
        <div class="check-info-frm">
            <div class="order_table table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40%;">Product</th>
                        <th style="width: 20%;">Quantity</th>
                        <th style="width: 20%;">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (  isset($cart_items) && (!empty($cart_items))  ){
                        foreach ($cart_items as $k => $item) { ?>
                            <tr>
                                <td> <?= $item['title'];?></td>
                                <td> <?= $item['quantity'];?></td>
                                <td> $<?= number_format($item['price'],2);?></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2">Cart Subtotal</th>
                        <td>$<?= number_format($cart_total,2);?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Shipping</th>
                        <td><strong>$<?= number_format($shipping_chaarges,2);?></strong></td>
                    </tr>
                    <tr class="order_total">
                        <th colspan="2">Order Total</th>
                        <td><strong>$<?= number_format( ($cart_total + $shipping_chaarges),2);?></strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="check-btn-next">
                        <button type="button" data-page_id="shipingForm" class="primary_Btn pull-left previousPage">
                            Previous To Shipping
                        </button>
                        <button type="button" data-page_id="paymentForm" class="primary_Btn previousPage">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- // ChecK Info Frm -->
    </form>
</div>
