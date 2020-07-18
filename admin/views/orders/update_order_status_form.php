<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\Utils;
use yii\helpers\Url;
use common\models\ProductsOrdersStatus;
$status = ProductsOrdersStatus::getAllStatusDropDown();

?>

<?php //print_r($orderDetail); ?>
<div class="order_status_form_container experience-categories-form">
        <?php $form = ActiveForm::begin([
            'id' => 'product_status_change_form',
            'action' => Url::to(['/orders/validate-order-status?id='.$orderDetail->id]),
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
            'options' => [
                'enctype' => 'multipart/form-data',
                'submit-url' => Url::to(['/orders/save-order-status?id='.$orderDetail->id])
            ]
        ]); ?>
        <section class="product-create">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Product Create Content-->
                    <div class="product-create_content">
                        <input type="hidden"
                               name="ProductsOrderStatusActivity[cuurent_order_status]"
                               id="cuurent_order_status"
                               value="<?= $orderDetail->order_status;?>">
                        <div class="form-group">
                            <?= $form->field($model, 'new_status')->dropDownList(
                                $status
                                ,['class'=>'form-control input_modifier select_mod']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'comment')->textarea([
                                'class'=>'form-control input_modifier',
                                'placeholder'=>'Enter status change note',
                                'rows'=> 3
                            ]) ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_primary cst_btn">Save Changes</button>
                </div>
            </div>
        </section>
    <?php ActiveForm::end(); ?>
</div>