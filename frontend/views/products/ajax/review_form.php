<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
?>
<div id="myModal_review" class="modal fade" role="dialog" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Submit Your Review</h4>
        </div>
           <div class="modal-body">
             <p>
                <?php $form = ActiveForm::begin([
                    'id' => 'review_form',
                    'action' => Url::to(['/products/ajax-review-validate?id='.$product_id]),
                    'enableClientValidation' => false,
                    'enableAjaxValidation' => true,
                    'options' => [
                        'enctype' => 'multipart/form-data',
                        'submit-url' => Url::to(['/products/ajax-review-submit?id='.$product_id]),
                    ]
                ]); ?>
            <!--reviewModel-->
                <?= $form->field($reviewModel, 'review_title')->textInput([
                    'class'=>'form-control',
                    'placeholder'=>'Review Title'
                ])->label('Review Title') ?>

                 <?= $form->field($reviewModel, 'review_value')->widget(
                         \yii2mod\rating\StarRating::class, [
                     'options' => [
                         'class'=>'',
                     ],
                     'clientOptions' => [
                     ],
                 ])->label('Rating') ?>

                <?= $form->field($reviewModel, 'review_message')->textarea([
                    'class'=>'form-control',
                    'placeholder'=>'Review Message','rows'=> 5
                ])->label('Review Message') ?>

                <button type="submit" class="btn btn-default">
                    <?= isset($reviewModel->id)?'Update Review':'Submit Review';?>
                </button>
            <?php ActiveForm::end(); ?>
        </p>
      </div>
    </div>
 </div>
</div>
