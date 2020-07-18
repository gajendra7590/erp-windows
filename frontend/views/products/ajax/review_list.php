<?php
use common\helpers\Utils;
use yii\helpers\Url;

if( isset($reivews) && (!empty($reivews)) ){
    foreach ($reivews as $review){ ?>
    <ul class="commentlist">
        <li class="review_li">
            <div class="comment_container">
                <div class="usr_avtar">
                    <div class="cr_usr">
                        <img alt="" src="<?= (isset($review['user']['profile_photo']) && ($review['user']['profile_photo']!=''))
                            ?Utils::IMG_URL($review['user']['profile_photo'])
                            :Url::to(['/theme/images/thumnails/review_user_default.png']);?>"
                        >
                    </div>
                </div>
                <div class="comment-text">
                    <div class="star-rating">
                        <?php for ($i = 1;$i <= $review['review_value'];$i++){ ?>
                           <span class="fa fa-star checked"></span>
                        <?php } ?>
                        <?php for ($i = 1;$i <= (5 - $review['review_value']);$i++){ ?>
                            <span class="fa fa-star"></span>
                        <?php } ?>
                    </div>
                    <p class="meta">
                        <em class="awaiting-approval">
                            <?= ucwords($review['user']['first_name'].' '.$review['user']['last_name']);?>
                        </em>
                    </p>
                    <p class="meta">
                        <em class="awaiting-approval">
                            <?= $review['review_title'];?>
                        </em>
                    </p>
                    <div class="comment-description">
                        <p>
                            <?= $review['review_message'];?>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
<?php }} else { ?>
    <h3 class="no_review_found">Currently no review for this product</h3>
<?php } ?>