<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
use toriphes\lazyload\LazyLoad;
$this->title = 'ERP Windows - Your Cart';
$this->registerJsFile("@web/js/cart.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);
?>
<!-- main Content Area Start -->
<main id="main__Content">

    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( isset($cart_item) && !empty($cart_item)){ ?>
    <section class="shopping_cart_area">
        <div class="container">
                <?php $form = ActiveForm::begin([
                    'id' => 'updateCartForm',
                    'action' => Url::to(['/cart/update-cart']),
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cart_item as $k => $item){ ?>
                                                <tr>
                                                    <td class="product_remove">
                                                        <a href="#"
                                                           class="removeCartItem"
                                                           data-action="<?= Url::to(['/cart/remove-item']);?>"
                                                           data-id="<?= $item['id'];?>">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product_thumb">
                                                        <a href="#">
                                                            <img src="<?= $item['image'] ?>" alt="Commercial Doors">
                                                        </a>
                                                    </td>
                                                    <td class="product_name" width="25%">
                                                        <a target="_blank" a href="<?= Url::to(['/product/'.$item['slug']]) ?>">
                                                            <?= $item['title'] ?>
                                                        </a>
                                                    </td>
                                                    <td class="product-price">
                                                        $<?= number_format($item['price'],2) ?>
                                                    </td>
                                                    <td class="product_quantity">
                                                        <label>Quantity</label>
                                                        <input
                                                        name="cart[<?=$item['id'];?>][quantity]"
                                                        data-prevq="<?= $item['quantity'] ?>"
                                                        data-price="<?= $item['price'] ?>"
                                                        data-id="<?= $item['id'] ?>"
                                                        class="quantityInput"
                                                        min="1"
                                                        max="10"
                                                        value="<?= $item['quantity'] ?>"
                                                        type="number">
                                                    </td>
                                                    <td class="product_total">
                                                        $<span id="total_<?=$item['id'];?>"><?= number_format( ($item['price'] * $item['quantity']) ,2) ?></span>
                                                    </td>
                                                    <input type="hidden" name="cart[<?=$item['id'];?>][id]" value="<?=$item['id'];?>">
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart_submit">
                                    <button type="submit" id="updateCartBtn" class="primary_Btn">update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php $form = ActiveForm::begin([
                                'id' => 'coupenCodeApply',
                                'action' => Url::to(['/cart/coupen-code-apply']),
                                'options' => ['enctype' => 'multipart/form-data']
                            ]); ?>
                                <div class="coupon_code">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner coupon_Code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <?= $form->field($coupenModel, 'coupen_code')->textInput([
                                            'class'=>'form-control input_Mod',
                                            'placeholder'=>'Coupon code',
                                            'value' => isset($applied_coupen_code)?$applied_coupen_code:''
                                        ])->label(false) ?>
                                        <button type="submit" class="primary_Btn">
                                            <?= isset($applied_coupen_code)?'Edit coupon':'Apply coupon'; ?>
                                        </button>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">
                                            $<?= number_format($cart_total,2);?>
                                        </p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping Charges</p>
                                        <p class="cart_amount">
                                            <span>Flat Rate:</span>
                                            $<?= number_format($shipping_chaarges,2);?>
                                        </p>
                                    </div>
                                    <a href="#">Calculate shipping</a>
                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">
                                            $<?= number_format( ($cart_total + $shipping_chaarges),2);?>
                                        </p>
                                    </div>
                                    <div class="checkout_btn">
                                        <!--<button type="button" class="primary_Btn">
                                                Proceed to Checkout
                                        </button>-->
                                        <a href="<?= Url::to(['/checkout']);?>" class="primary_Btn">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->

        </div>
    </section>
    <?php } else{ ?>

    <section class="shopping_cart_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="6"> No cart item</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php } ?>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->
