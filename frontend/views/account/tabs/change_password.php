<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;

$this->registerJsFile("@web/js/my-account.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);
?>
<div class="dashboard_Panel ac-details">
    <?php $form = ActiveForm::begin([
        'id'=>'changePassword',
        'action' => Url::to(['/account/validate-password']),
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'options' => [
            'enctype' => 'multipart/form-data',
            'method' => 'post',
            'submit-url' => Url::to(['/account/save-password'])
        ]
    ]);
    ?>

    <div class="row ">
        <div class="form-group col-sm-12">
            <label class="label_Mod">Old Password <span>*</span></label>
            <?= $form->field($model, 'oldPassword')->textInput([
                'class' => 'form-control input_Mod',
                'placeholder' => 'Old Password'])->label(false)
            ?>
        </div>
        <div class="form-group col-sm-12">
            <label class="label_Mod">New Password <span>*</span></label>
            <?= $form->field($model, 'newPassword')->textInput([
                'class' => 'form-control input_Mod',
                'placeholder' => 'New Password'])->label(false)
            ?>
        </div>
        <div class="form-group col-sm-12">
            <label class="label_Mod">Confirm New Password <span>*</span></label>
            <?= $form->field($model, 'cnewPassword')->textInput([
                'class' => 'form-control input_Mod',
                'placeholder' => 'Confirm New Password'])->label(false)
            ?>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-12">
            <div class="check-btn-next">
                <button type="submit" class="primary_Btn">Change Your Password</button>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


