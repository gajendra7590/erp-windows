<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'ERP Windows - Set New Password';
?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading">Set Your New Password</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-account">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-4 col-sm-12">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                    <div class="sbs__Erp">
                        <h3 class="form__head">Set New Password</h3>
                        <div class="form-group">
                            <label class="label_Mod">Enter New Password <sub>*</sub></label>
                            <?= $form->field($model, 'password')->passwordInput([
                                'class'=>'form-control input_Mod',
                                'placeholder'=>'******'
                            ])->label(false) ?>
                        </div>
                        <button type="submit" class="form-login__submit" name="login" value="Log in">
                            Save New Password
                        </button>
                        <p class="lost_password">
                            <a href="<?php echo Url::to(['/login']);?>">Back to login?</a>
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