<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
?>
<!--  Coupen Actions -->
<div class="user-actions">
    <h3>
        <i class="fa fa-file-o" aria-hidden="true"></i>
        Returning customer?
        <a class="Returning" href="javascript:void(0);" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">
            Click here to enter your code
        </a>
    </h3>
    <div id="checkout_coupon" class="collapse" data-parent="#accordion">
        <div class="checkout_info coupon_info">
                    <?php $form = ActiveForm::begin([
                        'id' => 'coupenCodeApply',
                        'action' => Url::to(['/checkout/coupen-code-apply']),
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>
                    <?= $form->field($coupenModel, 'coupen_code')->textInput([
                        'class'=>'form-control input_Mod',
                        'placeholder'=>'Coupon code',
                        'value' => isset($applied_coupen_code)?$applied_coupen_code:''
                    ])->label(false) ?>
                    <button type="submit" class="primary_Btn" style="margin-bottom: 26px;">
                        <?= isset($applied_coupen_code)?'Edit coupon':'Apply coupon'; ?>
                    </button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- // Coupen Actions -->
