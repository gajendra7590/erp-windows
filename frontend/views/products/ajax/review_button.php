<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
?>
<div class="row">
    <div class="col-sm-9">
        <h3 class="productTabTitle">Reviews</h3>
    </div>
    <div class="col-sm-3">
        <?php
        if( (!Yii::$app->user->isGuest) && ($reviewModel->review_value == NULL) ){  ?>
            <a href="javascript:void(0);" class="add_Review open_reviewModal">
                Add A Review
            </a>
        <?php } else if( (!Yii::$app->user->isGuest) && ($reviewModel->review_value != 'NULL') ) { ?>
            <a href="javascript:void(0);" class="add_Review open_reviewModal">
                Edit Your Review(<?= number_format($reviewModel->review_value,1);?>/5.0)
            </a>
        <?php } else if(Yii::$app->user->isGuest) {?>
             <a href="<?php echo Url::to(['/login']);?>" class="add_Review">
                Add A Review
            </a>
        <?php }?>
    </div>
</div>