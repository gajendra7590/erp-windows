<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\helpers\Utils;

$btn_title = ( isset($model->id) && ($model->id > 0))?'Update Vendor':'Create New Vendor';
$img_url = ($model->profile_photo!='')?(Utils::IMG_URL($model->profile_photo)):Url::to('@web/theme/images/icons/upload_img.png');
?>

<div class="experience-categories-form"> 
    <?php $form = ActiveForm::begin(); ?>  
    <!-- profile upload Section-->
    <div class="exp__Prfile">
        <div class="row">
            <div class="col-sm-12">
                <div class="exp__Prfile--img">                   
                    <div class="exp__Prfile--edit"> 
                       <?= $form->field($model, 'temp_image')->fileInput([
                               'id'=>'imageUpload'
                       ])->label(false) ?>
                    </div> 
                    <div class="exp__Prfile--preview">
                        <div id="imagePreview" style='background-image: url(<?php echo $img_url;?>);'> 
                        </div>
                    </div>
                </div> 
                <div class="exp__Prfile--btn">
                    <label for="imageUpload" class="btn btn_primary--outline cst_btn mr-10">Choose Image</label>
                    <p>At least 256 X 256px PNG or JPG file</p>
                </div> 
            </div>
        </div>
    </div>
    <!--End of profile upload Section--> 
       <!-- row block -->
        <div class="row"> 
            <div class="col-sm-12 col-lg-6">
            <?= $form->field($model, 'first_name')->textInput([
                    'class'=>'form-control input_modifier',
                    'placeholder'=>'Enter First Name'
            ]) ?>
            </div>
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'last_name')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter Last Name'
                ]) ?>
            </div>            
        </div>
       <!--End row block --> 
       <!-- row block -->
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'email')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter Email Address'
                ]) ?>
            </div> 
            <?php if( ($model->id) && $model->id > 0 ){ ?> 
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'update_password')->passwordInput([
                            'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter New Password'
                    ])->label('( Leave empty if dont wants to update )') ?>
                </div>  
            <?php }else{ ?>   
                <div class="col-sm-12 col-lg-6">
                    <?= $form->field($model, 'password')->passwordInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter Password'
                    ]) ?>
                </div>
            <?php } ?>
        </div>
       <!--End row block --> 
       <!-- row block -->
       <div class="row">    
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'phone')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter Phone Number'
                ]) ?>
            </div>
           <div class="col-sm-12 col-lg-6">
               <?= $form->field($model, 'gender')->dropDownList([
                   'male' => 'Male',
                   'female' => 'Female'
               ],['class'=>'form-control input_modifier select_mod']) ?>
           </div>
       </div>
       <!--End row block --> 
       <!-- row block -->
       <div class="row">    
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'country')->dropDownList([
                    'india' => 'India', 
                    'usa' => 'USA'
                ],['class'=>'form-control input_modifier select_mod']) ?>
            </div> 
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'state')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter State Name'
                ]) ?>
            </div>
        </div>
       <!--End row block --> 
        <!-- row block -->
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'city')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter City Name'
                ]) ?>
            </div>
            <div class="col-sm-12 col-lg-6">
                <?= $form->field($model, 'zip')->textInput([
                        'class'=>'form-control input_modifier',
                        'placeholder'=>'Enter Zip Code'
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <?= $form->field($model, 'status')->dropDownList([
                    1 => 'Active',
                    0 => 'Inactive'
                ],['class'=>'form-control input_modifier select_mod']) ?>
            </div>
        </div>
       <!-- row block -->
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="exp__Frm--btn"> 
                        <?= Html::submitButton($btn_title, ['class' => 'btn btn_primary cst_btn mr-10']) ?>
                        <a href="<?= Url::to(['/vendors']); ?>" class="btn btn-secondary cst_btn">Cancel</a>
                    </div>
            </div>
        </div>
       <!--End row block --> 
    <?php ActiveForm::end(); ?>
</div>

