<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils;


$this->title = 'Company info';
$img_url = ($model->logo!='')?(Utils::IMG_URL($model->logo)):Url::to('@web/theme/images/icons/upload_img.png');
?>

<section class="exp__Frm--cst">
    <!-- Edit add_new_client section -->
    <div class="exp__Frm--ele">
        <div class="experience-categories-form">
            <?php $form = ActiveForm::begin(); ?>
            <!-- profile upload Section-->
            <div class="exp__Prfile">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="exp__Prfile--img">
                            <div class="exp__Prfile--edit">
                                <?= $form->field($model, 'upload_image')->fileInput(['id'=>'imageUpload'])->label(false) ?>
                            </div>
                            <div class="exp__Prfile--preview">
                                <div id="imagePreview" style='background-image: url(<?php echo $img_url;?>);'>
                                </div>
                            </div>
                        </div>
                        <div class="exp__Prfile--btn">
                            <label for="imageUpload" class="btn btn_primary--outline cst_btn mr-10">Choose logo</label>
                            <p>At least 256 X 256px PNG or JPG file</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of profile upload Section-->
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'name')->textInput([
                            'class'=>'form-control input_modifier',
                        'placeholder'=>'Company name'
                    ]) ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'owner')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Company owner name'
                    ]) ?>
                </div>
            </div>
            <!--End row block -->
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'email')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Company email'
                    ]) ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'phone')->textInput([
                            'class'=>'form-control input_modifier',
                        'placeholder'=>'Company phone'
                    ]) ?>
                </div>
            </div>
            <!--End row block -->
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <?= $form->field($model, 'address')->textarea([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Company Address','rows'=> 3
                    ]) ?>
                </div>
            </div>
            <!-- row block -->
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'social_fb')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter facebook page link'
                    ]) ?>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'social_linkedin')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter instagram page link'
                    ]) ?>
                </div>
            </div>
            <!--End row block -->
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <?= $form->field($model, 'social_instagram')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter twitter page link'
                    ]) ?>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <?= $form->field($model, 'social_twitter')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter twitter page link'
                    ]) ?>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <?= $form->field($model, 'social_pinterest')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter pinterest page link'
                    ]) ?>
                </div>
            </div>
            <!--End row block -->
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <?= $form->field($model, 'about_company')->textarea([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'About company','rows'=> 5
                    ]) ?>
                </div>
            </div>
            <!-- row block -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="exp__Frm--btn">
                        <?= Html::submitButton('Update Company Info', ['class' => 'btn btn_primary cst_btn mr-10']) ?>
                        <a href="<?= Url::to(['/']); ?>" class="btn btn-secondary cst_btn">Cancel</a>
                    </div>
                </div>
            </div>
            <!--End row block -->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- Edit add_new_client section -->
</section>