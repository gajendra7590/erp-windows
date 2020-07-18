<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>
<!--experiences-search filter class name-->
<div class="product-variable-filter">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => ''
        ],
    ]); ?>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        <?= $form->field($model, 'type')->dropDownList(
            \common\models\VariablesType::getList(true)
            ,['class'=>'form-control input_modifier select_mod',
            'onchange'=>'this.form.submit()'])->label(false) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>
</div>
