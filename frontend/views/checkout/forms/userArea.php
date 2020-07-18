<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
?>
<!--  User Actions -->
<div class="user-actions">
    <h3>
        <i class="fa fa-file-o" aria-hidden="true"></i>
        Returning customer?
        <a class="Returning" href="javascript:void(0);" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">
            Click here to login
        </a>
    </h3>
    <div id="checkout_login" class="collapse" data-parent="#accordion">
        <div class="checkout_info">
            <p>
                If you have shopped with us before, please enter your details in the boxes below.
                If you are a new customer please proceed to the Billing &amp; Shipping section.
            </p>
            <div class="row">
                <div class="col-sm-5">
                    <?php $form = ActiveForm::begin([
                        'id' => 'checkoutLogin',
                        'action' => Url::to(['/checkout/login-validate']),
                        'enableClientValidation' => false,
                        'enableAjaxValidation' => true,
                        'options' => [
                            'enctype' => 'multipart/form-data',
                            'submit-url' => Url::to(['/checkout/login-submit']),
                            'redirect-url' => Url::to(['/'])
                        ]
                    ]); ?>
                    <div class="form-group">
                        <label class="label_Mod">Username or email <sub>*</sub></label>
                        <?= $form->field($model, 'email')->textInput([
                            'class' => 'form-control input_Mod',
                            'placeholder' => 'Email address'])->label(false)
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="label_Mod">Password <sub>*</sub></label>
                        <?= $form->field($model, 'password')->passwordInput([
                            'class' => 'form-control input_Mod',
                            'placeholder' => '*******'])->label(false)
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="login-group-btn">
                            <button class="primary_Btn" type="submit">Login</button>
                        </div>
                    </div>
                    <a href="#">Lost your password?</a>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // User Actions -->
