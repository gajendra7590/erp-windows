<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use toriphes\lazyload\LazyLoad;
$this->title = 'ERP Windows - Products By Category';
?>
<!-- main Content Area Start -->
<section class="inner__headbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blogs_banner">
                    <h1 class="fl-heading">Products / <?= ucfirst( strtolower( isset($products['category_name'])?$products['category_name']:''));?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<main id="main__Content">
    <div class="hm__Block">
        <section class="meet__Host--world back__White">
            <div class="container">
                <div class="row">
                    <?php if( isset($products['products']) && (!empty($products['products']))){
                        foreach ($products['products'] as $k => $prod) {
                     ?>
                        <div class="cst__Col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="meet__Host--item">
                                <a href="<?= Url::to(['/product/'.$prod['slug']]);?>">
                                    <figure class="meet__Host--img">
                                        <?= LazyLoad::widget(['src' => (($prod['featured_image']!='')?(Utils::IMG_URL($prod['featured_image'])):'no-image'),'options'=>[
                                            'class'=>'img-responsive',
                                            'alt'=>$prod['title']
                                        ] ]); ?>
                                    </figure>
                                    <p title="<?= $prod['title'];?>">
                                        <?= $prod['title'];?>
                                    </p>
                                </a>
                                <span class="price__Item--prduct">
                                    <?php
                                        $price = '$'.$prod['product_sale_price'];
                                        if( $prod['product_type'] == '2'){
                                            $price = Utils::variablePrice($prod['variablesPrice']);
                                        }
                                    ?>
                                    <?= $price;?>
                                </span>
                            </div>
                        </div>
                    <?php }}else{ ?>
                        <div class="no_product">
                            <span>No product found for
                                <b>
                                    <?= ucfirst( strtolower( isset($products['category_name'])?$products['category_name']:''));?>
                                </b> category
                            </span>
                        </div>
                    <?php } ?>
                    <!-- Contact Today Section Render Here -->
                    <?php echo $this->render('@app/views/layouts/contact_today_section'); ?>
                </div>
            </div>
        </section>
    </div>
</main>