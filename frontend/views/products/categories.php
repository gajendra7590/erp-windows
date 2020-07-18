<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use toriphes\lazyload\LazyLoad;
$this->title = 'ERP Windows - Categories List';
?>
<!-- main Content Area Start -->
<section class="inner__headbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blogs_banner">
                    <h1 class="fl-heading">Categories</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<main id="main__Content">
    <div class="hm__Block">
     <?php if( isset($categories) && !empty($categories)){
           foreach ($categories as $k => $cat){
               $cls = 'rted__Exp';
               if( in_array($k,[1,4,7])){ $cls = 'features__Exp'; }
               if( in_array($k,[2,5,8])){ $cls = ' meet__Host--world'; }
      ?>
        <section class="<?= $cls;?>">
            <div class="container">
                <div class="listing__Title">
                    <h3><?= $cat['category_name'] ?></h3>
                </div>
                <div class="row">
                    <?php if( isset($cat['products']) && (!empty($cat['products'])) ){
                          foreach ($cat['products'] as $j => $prod){
                    ?>
                        <div class="cst__Col col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="rted__Exp--item">
                                <a href="<?= Url::to(['/product/'.$prod['slug']]);?>">
                                    <figure class="rted__Exp--img">
                                        <?= LazyLoad::widget(['src' => (($prod['featured_image']!='')?(Utils::IMG_URL($prod['featured_image'])):'no-image'),'options'=>[
                                            'class'=>'img-responsive',
                                            'alt'=>$prod['title']
                                        ] ]); ?>
                                    </figure>
                                    <p data-toggle="tooltip" title="<?= $prod['title'];?>">
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
                    <?php }} else{ ?>
                        <div class="no_product_home">
                            <span>No product found for
                                <b>
                                    <?= ucfirst( strtolower( $cat['category_name']));?>
                                </b> category
                            </span>
                        </div>
                    <?php } ?>
                </div>
                <div class="row cst__Row">
                    <div class="col-sm-12 cst__Col">
                        <div class="show__all--exp">
                            <a class="exp__Btn--outline"
                               href="<?= Url::to(['/category/'.$cat['category_slug']]);?>">
                                Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <?php }} ?>
        <!-- Contact Today Section Render Here -->
        <?php echo $this->render('@app/views/layouts/contact_today_section'); ?>
    </div>
</main>
