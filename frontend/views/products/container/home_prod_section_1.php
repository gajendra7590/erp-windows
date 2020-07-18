<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use toriphes\lazyload\LazyLoad;
?>
<!-- Meet Host World Area Start-->
<section class="meet__Host--world">
    <div class="container">
        <div class="listing__Title">
            <h3><?= $prod['category_name'] ?></h3>
        </div>
        <div class="row">
            <?php if( isset($prod['products']) && (!empty($prod['products'])) ){
                foreach ($prod['products'] as $j => $product){ ?>

                    <div class="cst__Col col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="meet__Host--item">
                            <a href="<?= Url::to(['/product/'.$product['slug']]);?>">
                                <div class="meet__Host--img">
                                    <!-- Lazy start -->
                                    <?= LazyLoad::widget([
                                        'src' => (($product['featured_image']!='')?(Utils::IMG_URL($product['featured_image'])):'no-image'),
                                        'options'=>[
                                            'class'=>'img-responsive',
                                            'alt'=>$product['title']
                                        ]
                                    ]); ?>
                                    <!-- Lazy End -->
                                </div>
                                <p title="<?= $product['title'];?>">
                                    <?= $product['title'];?>
                                </p>
                            </a>
                        </div>
                    </div>

                <?php } } else{ ?>
                <div class="no_product_home">
                    <span>No product found for
                        <b>
                            <?= ucfirst( strtolower( $prod['category_name']));?>
                        </b> category
                    </span>
                </div>
            <?php } ?>

        </div>
        <div class="clearfix"></div>
        <div class="row cst__Row">
            <div class="col-sm-12 cst__Col">
                <div class="show__all--exp">
                    <a class="exp__Btn--outline"
                       href="<?= Url::to(['/category/'.$prod['category_slug']]);?>">
                        Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Meet Host World Area Closed -->
<div class="clearfix"></div>

