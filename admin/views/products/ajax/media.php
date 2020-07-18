  <?php
use yii\helpers\Url;
use common\helpers\Utils;
if(isset($media_images) && (!empty($media_images)) ){
    foreach($media_images as $m){  ?>
            <div class="col-mobile col-xs-4 col-sm-4 col-md-4 col-lg-4 image-div-main">
            <div class="product-gallery-item">
                <img src="<?php echo Utils::IMG_URL($m['url']);?>" alt="product gallery" />
                <div class="product-gallery-icn">
                    <a href="javascript:void(0);" class="removeMediaImage"
                       data-product_id = "<?php echo $m['product_id'];?>"
                       data-img="<?php echo $m['name'];?>"
                       data-media_id="<?php echo $m['id'];?>" >
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } } else if( isset($_uploaded)){
    foreach ($_uploaded as $single_upload){ ?>
        <div class="col-mobile col-xs-4 col-sm-4 col-md-4 col-lg-4 image-div-main">
        <div class="product-gallery-item">
            <img src="<?php echo  Utils::IMG_URL($single_upload['img']);?>" alt="Media Image">
            <?php if( isset($single_upload['action_type']) && ($single_upload['action_type'] == 'insert') ){ ?>
                <input type="hidden" name="media_image[<?php echo $single_upload['name'];?>]" value="<?php echo $single_upload['name'];?>">
            <?php } ?>
            <div class="product-gallery-icn">
                <a href="javascript:void(0);" class="removeMediaImage"
                   data-product_id = "<?php echo $single_upload['product_id'];?>"
                   data-img="<?php echo $single_upload['name'];?>"
                   data-media_id="<?php echo $single_upload['media_id'];?>"
                > <i class="fa fa-times" aria-hidden="true"></i>
              </a>
            </div>
        </div>
    </div>

<?php } } ?>
