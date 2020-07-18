<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use toriphes\lazyload\LazyLoad;
$this->title = 'ERP Windows - HOME';
?>
<!-- Features Search Area Start -->
<section class="features__Search" style="background-image: url(<?= Url::to(['/theme/images/background/header-hero.jpg'])?>);">
    <div class="features__Search__Content">
        <h1>SHOP FOR COMMERCIAL DOORS, FIRE RATED DOORS, METAL DOOR FRAMES & HARDWARE.</h1>
        <p>USA Fire Door can provide the products and support you need to finish your project on time and under budget. We deliver to all 50 United States!</p>
        <div class="et_pb_section_full">
            <a href="#" class="et_pb_section">Get Started</a>
        </div>
    </div>
</section>
<!-- Features Search Area Closed -->
<!-- main Content Area Start -->
<main id="main__Content">
    <div class="hm__Block">
        <!-- Activities Category Area Start -->
        <section class="activities__Catgry">
            <div class="container">
                <div class="activities__Catgry--title">
                    <h2>Door Hardware for Contractors & Businesses</h2>
                </div>
                <div class="row">
                    <?php if(!empty($categories)){
                    foreach($categories as $k => $category){  ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 cst__Col enqualCol">
                            <div class="activities__Catgry--content equalItem">
                                <figure class="activities__Catgry--img">
                                    <a href="<?php echo Url::to([
                                        '/category/'.$category['category_slug']
                                    ]);?>">
                                        <!-- Lazy start -->
                                        <?= LazyLoad::widget(['src' => (($category['category_img']!='')?(Utils::IMG_URL($category['category_img'])):'no-image'),'options'=>[
                                            'class'=>'img-responsive',
                                            'alt'=>$category['category_name']
                                        ] ]); ?>
                                        <!-- Lazy End -->
                                    </a>
                                </figure>
                                <div class="activities__Catgry--link">
                                    <a href="<?php echo Url::to([
                                        '/category/'.$category['category_slug']
                                    ]);?>">
                                        <?= (isset($category['category_name'])?$category['category_name']:'');?>
                                    </a>
                                    <span>
                                        <?= (isset($category['category_desc'])?$category['category_desc']:'');?>
                                    </span>
                                    <div class="et_pb_section_half">
                                        <a href="<?php echo Url::to([
                                                '/category/'.$category['category_slug']
                                         ]);?>" class="et_pb_section">
                                            Browse Products
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!-- Activities Category Area Closed -->
        <div class="clearfix"></div>
        <?php if( isset($products) && !empty($products)){
           foreach ($products as $k => $prod){
                 $view = 'home_prod_section_1';
                 if( in_array($k,[1,4,7])){ $view = 'home_prod_section_2'; }
                 if( in_array($k,[2,5,8])){ $view = 'home_prod_section_3'; }
               ?>

               <?= $this->render('container/'.$view, [
                   'prod' => $prod,
               ]) ?>


           <?php } } ?>
        <div class="clearfix"></div>
        <!-- Contact Today Section Render Here -->
        <?php echo $this->render('@app/views/layouts/contact_today_section'); ?>
        <div class="clearfix"></div>
        <!-- Home Client Area Closed -->
    </div>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->