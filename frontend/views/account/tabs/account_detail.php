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
        'id'=>'userProfile',
        'action' => Url::to(['/account/validate-profile']),
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'options' => [
            'enctype' => 'multipart/form-data',
            'method' => 'post',
            'submit-url' => Url::to(['/account/save-profile'])
        ]
    ]);
    ?>

        <div class="row ">
            <div class="form-group col-sm-6">
                <label class="label_Mod">First Name <span>*</span></label>
                <?= $form->field($userModel, 'first_name')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Last Name'])->label(false)
                ?>
            </div>
            <div class="form-group col-sm-6">
                <label class="label_Mod">Last Name <span>*</span></label>
                <?= $form->field($userModel, 'last_name')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Last Name'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-6">
                <label class="label_Mod"> Email Address <sub>*</sub></label>
                <?= $form->field($userModel, 'email')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Email Address'])->label(false)
                ?>
            </div>
            <div class="form-group col-sm-6">
                <label class="label_Mod">Phone<sub>*</sub></label>
                <?= $form->field($userModel, 'phone')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Phone Number'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-12">
                <label class="label_Mod">Company Name</label>
                <?= $form->field($userModel, 'company_name')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Company Name'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-6">
                <label class="label_Mod" for="country">country <sub>*</sub></label>
                <?= $form->field($userModel, 'country')->dropDownList([
                    'usa' => 'USA',
                    'india' => 'India',
                ], ['class' => 'form-control input_Mod select_Mod'])
                    ->label(false) ?>
            </div>
            <div class="form-group col-sm-6">
                <label class="label_Mod">State <sub>*</sub></label>
                <?= $form->field($userModel, 'state')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'State Name'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-6">
                <label class="label_Mod">Town / City <sub>*</sub></label>
                <?= $form->field($userModel, 'city')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'City Name'])->label(false)
                ?>
            </div>
            <div class="form-group col-sm-6">
                <label class="label_Mod">Zip Code <sub>*</sub></label>
                <?= $form->field($userModel, 'zip')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Zip Code'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-12">
                <label class="label_Mod">Street address line one <sub>*</sub></label>
                <?= $form->field($userModel, 'address_line_one')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'House number and street name'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-sm-12">
                <label class="label_Mod">Street address line two</label>
                <?= $form->field($userModel, 'address_line_two')->textInput([
                    'class' => 'form-control input_Mod',
                    'placeholder' => 'Apartment, suite, unit etc. (optional)'])->label(false)
                ?>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <div class="check-btn-next">
                    <button type="submit" class="primary_Btn">Save Profile</button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
