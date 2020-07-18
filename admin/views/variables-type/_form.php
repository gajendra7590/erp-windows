<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\helpers\Utils;

$btn_title = ( isset($model->id) && ($model->id > 0))?'Update Variable Type':'Create New Variable Type';
?>

<div class=product-categories-form">
    <?php $form = ActiveForm::begin(); ?>
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'vname')->textInput([
                'class'=>'form-control input_modifier',
                'placeholder'=>'Variable type name'
            ]) ?>
        </div>
    </div>
    <!--End row block -->
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'vdesc')->textarea([
                'class'=>'form-control input_modifier',
                'placeholder'=>'Variable type description..','rows'=> 4
            ]) ?>
        </div>
    </div>
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'vdefault')->dropDownList([
                0 => 'No',
                1 => 'Yes',
            ],['class'=>'form-control input_modifier select_mod']) ?>
        </div>
    </div>
    <!-- row block -->
    <!--End row block -->
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'vstatus')->dropDownList([
                1 => 'Active',
                0 => 'Inactive'
            ],['class'=>'form-control input_modifier select_mod']) ?>
        </div>
    </div>
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="exp__Frm--btn">
                <?= Html::submitButton($btn_title, ['class' => 'btn btn_primary cst_btn mr-10']) ?>
                <a href="<?= Url::to(['/variables-type']); ?>" class="btn btn-secondary cst_btn">Cancel</a>
            </div>
        </div>
    </div>
    <!--End row block -->
    <?php ActiveForm::end(); ?>
</div>

