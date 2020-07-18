<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$this->title = 'ERP Windows - Client Signup';
?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Create Your Free ERP Windows Account</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="sbs__Erp">
                        <h3 class="form__head">Signup</h3>
                        <div class="form-group">
                            <label class="label_Mod">First Name <sub>*</sub></label>
                            <?= $form->field($model, 'first_name')->textInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'Enter first name..'
                            ])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <label class="label_Mod">Last Name <sub>*</sub></label>
                            <?= $form->field($model, 'last_name')->textInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'Enter last name..'
                            ])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <label class="label_Mod">Email<sub>*</sub></label>
                            <?= $form->field($model, 'email')->textInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'Enter email address..'
                            ])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <label class="label_Mod">Password <sub>*</sub></label>
                            <?= $form->field($model, 'password')->passwordInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'******'
                            ])->label(false) ?>
                        </div>
                        <button type="submit" class="form-login__submit" name="login" value="Log in">
                            Create your free account
                        </button>
                        <p class="lost_password">
                            <a href="<?= Url::to(['/login']);?>">I have an already ERP WINDOWS account?</a>
                        </p>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->