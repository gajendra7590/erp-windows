<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\helpers\Utils;
$btn_title = ( isset($model->id) && ($model->id > 0))?'Update Variable':'Create New Variable';
$this->registerJsFile("@web/js/variable.js",[
    'depends' => [ \yii\web\JqueryAsset::className() ]
]);
?>

<div class=product-categories-form">
    <?php $form = ActiveForm::begin(); ?>
       <!-- row block -->
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <?= $form->field($model, 'type')->dropDownList(
                    \common\models\VariablesType::getList(),
                    ['class'=>'form-control input_modifier select_mod'])
                ?>
            </div>
        </div>
        <div class="row" id="type_color">
            <div class="col-sm-12 col-lg-12">
                <?= $form->field($model, 'name')->textInput([
                    'class'=>'form-control input_modifier',
                    'placeholder'=>'Enter variable name..'
                ]) ?>
            </div>
            <div class="col-sm-12 col-lg-12" id="color_code_div">
                <?= $form->field($model, 'color_code')->widget(
                        alexantr\colorpicker\ColorPicker::className()
                )->label('Pick Color(* Will help in shown on html elelment )') ?>
            </div>
        </div>
       <!--End row block -->
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'description')->textarea([
                'class'=>'form-control input_modifier',
                'placeholder'=>'Enter description..','rows'=> 2
            ]) ?>
        </div>
    </div>
    <!--End row block -->
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'status')->dropDownList([
                1 => 'Active',
                0 => 'Inactive'
            ],['class'=>'form-control input_modifier select_mod']) ?>
        </div>
    </div>
    <!-- row block -->
    <!-- row block -->
    <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="exp__Frm--btn">
                    <?= Html::submitButton($btn_title, ['class' => 'btn btn_primary cst_btn mr-10']) ?>
                    <a href="<?= Url::to(['/variables']); ?>" class="btn btn-secondary cst_btn">Cancel</a>
                </div>
        </div>
    </div>
   <!--End row block -->
    <?php ActiveForm::end(); ?>
</div>

