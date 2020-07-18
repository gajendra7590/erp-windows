<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use common\models\ProductsOrdersStatus;
$options1[0] = 'Filter by product status';
$options = ProductsOrdersStatus::getAllStatusDropDown(true,'Filter by product status');
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
            <?= $form->field($model, 'order_status')->dropDownList(
                 $options
                ,['class'=>'form-control input_modifier select_mod',
                'onchange'=>'this.form.submit()'])
                ->label(false) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
