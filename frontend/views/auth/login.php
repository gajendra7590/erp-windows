<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$this->title = 'ERP Windows - Client Login';
?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Login Your Account</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-4 col-sm-12">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="sbs__Erp">
                            <h3 class="form__head">Sign In</h3>
                            <div class="form-group">
                                <label class="label_Mod">Email Address <sub>*</sub></label>
                                <?= $form->field($model, 'email')->textInput([
                                    'class'=>'form-control input_Mod',
                                    'placeholder'=>'Ex. dumy@dumy.com '
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
                                Log in
                            </button>
                            <p class="lost_password">
                                <a href="<?php echo Url::to(['/request-password-reset']);?>">
                                    I forgot my password?
                                </a>
                            </p>
                            <p class="lost_password">
                                <a href="<?php echo Url::to(['/resend-verification-email']);?>">
                                    Resend account activation link?
                                </a>
                            </p>
                            <p class="lost_password">
                                <a href="<?php echo Url::to(['/signup']);?>">
                                    Create your free ERP Windows account?
                                </a>
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