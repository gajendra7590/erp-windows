<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\helpers\Utils;

$btn_title = ( isset($model->id) && ($model->id > 0))?'Update Category':'Create New Category';
$img_url = ( isset($model->category_img) && ($model->category_img!='') )?(Utils::IMG_URL($model->category_img)):Url::to('@web/theme/images/icons/upload_img.png');
?>

<div class=product-categories-form">
    <?php $form = ActiveForm::begin(); ?>  
    <!-- profile upload Section-->
    <div class="exp__Prfile">
        <div class="row">
            <div class="col-sm-12">
                <div class="exp__Prfile--img">                   
                    <div class="exp__Prfile--edit"> 
                       <?= $form->field($model, 'temp_image')->fileInput(['id'=>'imageUpload'])->label(false) ?>
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
            <div class="col-sm-12 col-lg-12">
                <?= $form->field($model, 'category_name')->textInput([
                    'class'=>'form-control input_modifier',
                    'placeholder'=>'Category name'
                ]) ?>
            </div>
        </div>
       <!--End row block -->
    <!-- row block -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <?= $form->field($model, 'category_desc')->textarea([
                'class'=>'form-control input_modifier',
                'placeholder'=>'Description..','rows'=> 4
            ]) ?>
        </div>
    </div>
    <!--End row block -->
    <!-- row block -->
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
                    <a href="<?= Url::to(['/products-categories']); ?>" class="btn btn-secondary cst_btn">Cancel</a>
                </div>
        </div>
    </div>
   <!--End row block -->
    <?php ActiveForm::end(); ?>
</div>

