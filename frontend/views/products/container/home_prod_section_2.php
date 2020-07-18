<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use toriphes\lazyload\LazyLoad;
?>
<!-- Features Exp Area Start -->
<section class="features__Exp">
    <div class="container">
        <div class="row cst__Row">
            <div class="col-sm-12 cst__Col">
                <div class="listing__Title">
                    <h3><?= $prod['category_name'] ?></h3>
                </div>
            </div>
            <div class="features__Exp--content">
                <?php if( isset($prod['products']) && (!empty($prod['products'])) ){
                foreach ($prod['products'] as $j => $product){ ?>
                    <div class="cst__Col col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="features__Exp--item">
                            <a href="<?= Url::to(['/product/'.$product['slug']]);?>">
                                <div class="features__Exp--img">
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
                                <div class="features__Exp--details">
                                    <div class="features__Exp--title" title="<?= $product['title'];?>">
                                        <?= $product['title'];?>
                                    </div>
                                    <div class="features__Exp--rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span>
                                            <?= isset($product['productsReviews']['review'])
                                                ?( number_format($product['productsReviews']['review'],1))
                                                :'0.0';
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <span class="price__Item--prduct">
                                <?php
                                  $price = '$'.$product['product_sale_price'];
                                  if( $product['product_type'] == '2'){
                                      $price = Utils::variablePrice($product['variablesPrice']);
                                  }
                                ?>
                                <?= $price;?>
                            </span>
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
<!-- Features Exp Area Closed -->
<div class="clearfix"></div>

