<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'ERP Windows - Resend verification email';
?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Please fill out your email. A verification email will be sent there.</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-4 col-sm-12">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                    <div class="sbs__Erp">
                        <h3 class="form__head">Resend account verification link</h3>
                        <div class="form-group">
                            <label class="label_Mod">Email Address <sub>*</sub></label>
                            <?= $form->field($model, 'email')->textInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'Enter email address..'
                            ])->label(false) ?>
                        </div>
                        <button type="submit" class="form-login__submit" name="login" value="Log in">
                            Send Email
                        </button>
                        <p class="lost_password">
                            <a href="<?php echo Url::to(['/login']);?>">Login account?</a>
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