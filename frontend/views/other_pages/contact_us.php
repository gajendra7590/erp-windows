<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
$this->title = 'ERP Windows - Contact US';
?>
<!-- main Content Area Start -->
<section class="inner__headbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blogs_banner">
                    <h1 class="fl-heading">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<main id="main__Content">
    <div class="hm__Block">
        <section class="white__Shade">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="cl__left">
                            <h3>Contact Details</h3>
                            <p>Please submit this form to apply for the Brick Battle Robots club.</p>
                        </div>
                        <div class="cl__left">
                            <h3>Follow Us</h3>
                            <p>Connect with ERP Windows social media accounts.</p>
                            <div class="fl-icon-group">
                                <span class="fl-icon">
                                    <a href="<?php echo $company['social_fb'];?>" target="_blank">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="fl-icon">
                                    <a href="<?php echo $company['social_twitter'];?>" target="_blank">
                                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="fl-icon">
                                    <a href="<?php echo $company['social_instagram'];?>" target="_blank">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="fl-icon">
                                    <a href="<?php echo $company['social_linkedin'];?>" target="_blank">
                                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="fl-icon">
                                    <a href="<?php echo $company['social_pinterest'];?>" target="_blank">
                                        <i class="fa fa-pinterest-square" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="cl__left">
                            <h3>Address Info</h3>
                            <p>Check the locator out To see if there is a ERP Windows near you!</p>
                            <p>
                                <span class="city-location">
                                    <?= $company['name'];?>
                                </span>
                                <span class="text-info">
                                    <?= $company['address'];?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-7">

                        <div class="contact__add">
                            <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <h4><i class="icon fa fa-check"></i>Submitted</h4>
                                    <p><?= Yii::$app->session->getFlash('success') ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="contact_center">
                                <h3>Let's Get In Touch</h3>
                            </div>
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="support-form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'name')->textInput([
                                                'class'=>'form-control',
                                                'placeholder'=>'Enter your name..'
                                            ])->label(false) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'email')->textInput([
                                                'class'=>'form-control',
                                                'placeholder'=>'Enter your email..'
                                            ])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'mobile')->textInput([
                                                'class'=>'form-control',
                                                'placeholder'=>'Enter your number..'
                                            ])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 textarea">
                                            <?= $form->field($model, 'message')->textarea([
                                                'class'=>'form-control',
                                                'placeholder'=>'Enter message','rows'=> 10
                                            ])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="wpcf7-submit" id="final-submit">
                                    </div>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <!-- Home Client Area Closed -->
    </div>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->