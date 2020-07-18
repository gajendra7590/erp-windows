<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\base\view;
use toriphes\lazyload\LazyLoad;
use yii\widgets\ActiveForm;
$this->title = 'ERP Windows - Product Description';
$this->registerJsFile("@web/js/cart.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$this->registerJsFile("@web/js/product_detail.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);

?>
<!-- main Content Area Start -->
<main id="main__Content">
    <section class="inner__headbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blogs_banner">
                        <h1 class="fl-heading"><?= (isset($product['title']))?$product['title']:'';?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="bread__headbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="breadcrumb">
                        <a href="<?php echo Url::to(['/products']);?>">Products</a> <strong>»</strong>
                        <a href="javascript:void(0);">
                            <?= (isset($product['title']))?$product['title']:'';?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="prdt__Views">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <!--Main Slider Container-->
                    <div class="slider-container">
                        <!-- Wish Product-->
                        <div class="wish-Product">
                            <div class="share_social">
                                <button type="button" class="primary_Btn shareModalOpen">
                                    <i class="fa fa-share-square-o" aria-hidden="true"></i> Share
                                </button>
                            </div>
                            <div class="wishlist_share">
                                <?php if($wishlist!='no_auth'){ ?>
                                    <button type="button"
                                                class="primary_Btn addWishlistBtn"
                                                data-url="<?=Url::to(['/products/wishlist-item?id='.$product['id']]);?>"
                                        ><i class="fa fa-heart-o" aria-hidden="true"></i>
                                            <?php if($wishlist!=NULL){
                                                echo 'Remove from wishlist';
                                            }else{
                                                echo 'Add to wishlist';
                                            } ?>
                                        </button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- // Wish Product-->
                        <!--Main Slider Start-->
                        <div id="slider" class="slider owl-carousel">
                            <?php if( isset($product['productMedia']) && (!empty($product['productMedia']))){
                            foreach ( $product['productMedia'] as $k => $prod) { ?>
                            <div class="item">
                                <div class="content">
                                    <img
                                     src="<?= Utils::IMG_URL($prod['url']);?>"
                                     class="img-responsive">
                                </div>
                            </div>
                            <?php }}else { ?>
                                <div class="item">
                                    <div class="content">
                                        <img src="<?= Utils::IMG_URL($product['featured_image']);?>" class="img-responsive">
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!--Main Slider End-->

                        <!--Navigation Links For the Main Items-->
                        <div class="slider-controls">
                            <a class="slider-left" href="javascript:;">
                                <span><i class="fa fa-2x fa-chevron-left"></i></span>
                            </a>
                            <a class="slider-right" href="javascript:;">
                                <span><i class="fa fa-2x fa-chevron-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!--Thumbnail slider container-->
                    <div class="thumbnail-slider-container">
                        <!--Thumbnail Slider Start-->
                        <div id="thumbnailSlider" class="thumbnail-slider owl-carousel">
                            <?php if( isset($product['productMedia']) && (!empty($product['productMedia']))){
                                foreach ( $product['productMedia'] as $k => $prod) { ?>
                                    <div class="item">
                                        <div class="content">
                                            <img src="<?= Utils::IMG_URL($prod['url']);?>" class="img-responsive">
                                        </div>
                                    </div>
                                <?php }}else { ?>
                                <div class="item">
                                    <div class="content">
                                        <img src="<?= Utils::IMG_URL($product['featured_image']);?>" class="img-responsive">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!--Thumbnail Slider End-->
                    </div>
                </div>
                <div class="col-sm-6 col-md-7">
                    <div class="prdt__Info">
                        <h3>
                            <?= (isset($product['title']))?$product['title']:'';?>
                        </h3>
                        <p class="prdt__Para">
                            <?= (isset($product['short_desc']))?$product['short_desc']:'';?>...
                        </p>
                    </div>
                    <div id="productTotals">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="productPricing">
                                    <div class="sale">
                                        <div class="asset"> <!-- Asset 4139 -->
                                            Today's Sale Price! <!-- End Asset 4139 -->
                                        </div>
                                        <div class="total">
                                            <span class="priceForAffirm">
                                                <?php
                                                if( isset($product['product_type']) && ($product['product_type'] == '1') ){
                                                    echo '$'.$product['product_sale_price'];
                                                }else{
                                                     echo Utils::variablePrice($product['variablesPrice']);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="totalLine" style="display: <?php if($product['product_type'] == '2'){ echo 'none';}else{ echo 'show'; }?>;">
                                        <label>Starting at</label>
                                        <div class="total">
                                            $ <?= $product['product_regular_price'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="overallInfo">
                                    <div class="productRatingWrap">
                                        <?php $val = floor($product_review['review_avg']); ?>
                                        <div class="ratingStars">
                                            <?php for ($i = 1;$i <= $val;$i++){ ?>
                                                 <span class="fullstar"></span>
                                            <?php } ?>
                                            <?php for ($i = 1;$i <= 5-$val;$i++){ ?>
                                               <span class="halfstar"></span>
                                            <?php } ?>
                                        </div>
                                        <span class="productRatingValue">
                                            <?= isset($product_review['review_avg'])?number_format($product_review['review_avg'],1):'0.0';?>
                                        </span>
                                        <span class="productNumReviews">
                                            (<a href="#productTabs" class="anchor__tab">
                                                <span itemprop="reviewCount"><?= isset($product_review['review_cnt'])?number_format($product_review['review_cnt']):0;?></span> Reviews</a> )
                                        </span>
                                    </div>
                                    <span id="availability__Stock">In Stock</span> </div>
                            </div>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'id' => 'addToCartForm',
                        'action' => Url::to(['/cart/add-to-cart']),
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>
                    <?php if( isset($product['product_type']) && ($product['product_type'] == '2')){ ?>
                        <div class="addCart__Cont">
                            <div class="subTitle">Avaliable Product Variations</div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table_desc">
                                        <div class="cart_page table-responsive">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th style="width: 48px;"></th>
                                                    <?php if( isset($product['variables'][0]['productsVarsRowsItems']) && !empty($product['variables'][0]['productsVarsRowsItems'])){
                                                        foreach ($product['variables'][0]['productsVarsRowsItems'] as $var){ ?>
                                                            <th>
                                                                <?= isset($var['varType']['vname'])?$var['varType']['vname']:'--';?>
                                                            </th>
                                                    <?php }} ?>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if( isset($product['variables']) && (!empty($product['variables'])) ){
                                                foreach ($product['variables'] as $k => $prod){
                                                    $checked = '';
                                                    if( isset($cart_item) &&
                                                        $cart_item!=false &&
                                                        ($prod['id'] == $cart_item['var']['id'])
                                                    ){
                                                        $checked = 'checked';
                                                    }else{
                                                        if($k == 0){  $checked = 'checked'; }
                                                    }
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="checbox_Cst">
                                                                <input
                                                                 type="radio"
                                                                 name="product[var][id]"
                                                                 value="<?= $prod['id'];?>"
                                                                 <?= $checked ?>>
                                                                <span class="checkmark_Cst"></span>
                                                            </div>
                                                        </td>
                                                        <?php if( isset($prod['productsVarsRowsItems']) && !empty($prod['productsVarsRowsItems'])){
                                                            foreach ($prod['productsVarsRowsItems'] as $item){ ?>
                                                            <td>
                                                                <?= isset($item['value'])?$item['value']:'--';?>
                                                            </td>
                                                        <?php }} ?>

                                                        <td>
                                                            <span class="var_tbl_sale_price">
                                                                $<?= number_format($prod['sale_price'],2);?>
                                                            </span>
                                                            /
                                                            <span class="var_tbl_regular_price">
                                                                $<?= number_format($prod['regular_price'],2);?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="addCart__Cont">
                            <div class="subTitle"> Starting Now!! </div>
                             <div class="row">
                                <div class="col-quantity">
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <input name="product[quantity]"
                                               type="number"
                                               min="1"
                                               max="9"
                                               step="1"
                                               value="<?= ( isset($cart_item) && ($cart_item!=false))?$cart_item['quantity']:1; ?>"
                                               id="product_quantity"
                                        >
                                    </div>
                                </div>
                                <div class="col-add-cart">
                                    <div class="addToCartButtonContainer add_CartTo">
                                        <div class="add__Cart">
                                            <input type="hidden" name="product[product_type]" value="<?= $product['product_type'];?>">
                                            <input type="hidden" name="product[id]" value="<?= $product['id'];?>">
                                            <input type="button" value="Add To Cart"
                                                   class="addCart_Btn <?= ( isset($cart_item) && ($cart_item!=false))?'hideSection':'showSection'; ?>" >
                                        </div>
                                    </div>
                                    <div class="addToCartButtonContainer update-remove-Cart">
                                        <div class="add__Cart <?= ( isset($cart_item) && ($cart_item!=false))?'showSection':'hideSection'; ?>">
                                            <input type="button"
                                                   data-action="<?= Url::to(['/cart/remove-item']);?>"
                                                   data-id="<?= $product['id'];?>"
                                                   value="Remove From Cart"
                                                   class="removeCartItem">
                                        </div>
                                        <div class="add__Cart <?= ( isset($cart_item) && ($cart_item!=false))?'showSection':'hideSection'; ?>">
                                            <input type="button"
                                                   data-action="<?= Url::to(['/cart/update-single-cart-item']);?>"
                                                   data-id="<?= $product['id'];?>"
                                                   value="Update To Cart"
                                                   class="updateCart_Btn">
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="prdt__Information">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_default_info" data-toggle="tab" aria-expanded="true">Product Info </a>
                                </li>
                                <?php if( (isset($product['productsOtherInfo'])) && (!empty($product['productsOtherInfo'])) ){
                                    foreach ($product['productsOtherInfo'] as $item) { ?>
                                    <li>
                                        <a href="#tab_default_<?= $item['id']?>" data-toggle="tab">
                                            <?= $item['tab_title']?>
                                        </a>
                                    </li>
                                <?php }} ?>

                                <li class="">
                                    <a href="#tab_default_review" data-toggle="tab"> Reviews </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_info">
                                    <h3 class="productTabTitle">Product Info</h3>
                                    <p> <strong>Description and Features</strong> </p>
                                     <?= isset($product['description'])?$product['description']:''; ?>
                                </div>
                                <?php if( (isset($product['productsOtherInfo'])) && (!empty($product['productsOtherInfo'])) ){
                                foreach ($product['productsOtherInfo'] as $item) { ?>
                                    <div class="tab-pane" id="tab_default_<?= $item['id']?>">
                                        <h3 class="productTabTitle">
                                            <?= $item['tab_title']?>
                                        </h3>
                                        <p>
                                            <?= $item['tab_content']?>
                                        </p>
                                    </div>
                                <?php }} ?>

                                <div class="tab-pane" id="tab_default_review">
                                    <!-- Load Review Model Modal -->
                                    <?php echo $this->render('ajax/review_button',
                                        ['reviewModel' => $reviewModel,'product_id' => $product['id']]
                                    );
                                    ?>
                                    <!-- Load Review Model Modal -->
                                     <?php echo $this->render('ajax/review_form',
                                            ['reviewModel' => $reviewModel,'product_id' => $product['id']]
                                        );
                                     ?>
                                    <!-- Load Client Reviews -->
                                    <input type="hidden" id="getReviewURL" value="<?= Url::to(['/products/get-reviews?id='.$product['id']]);?>">
                                    <div id="loadReviewContainer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Today Section Render Here -->
    <?php echo $this->render('@app/views/layouts/contact_today_section'); ?>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->

<?php //print_r($product);die;?>

<!-- Share Social Media-->
<section class="modal fade share_Popup" id="shareIcon" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="<?= Url::to(['/theme/images/icons/close-icn-popup.png']);?>" alt="close icn" />
                </button>
            </div>
            <div class="modal-body">
                <?= \ymaker\social\share\widgets\SocialShare::widget([
                    'configurator'  => 'socialShare',
                    'url'           => (Yii::$app->request->hostInfo).(Yii::$app->request->url),
                    'title'         => $product['title'],
                    'description'   => substr(strip_tags($product['short_desc']),0,150).'...',
                    'imageUrl'      => Utils::IMG_URL($product['featured_image']),
                ]); ?>
            </div>
        </div>
    </div>
</section>
<!-- Share Social Media Closed-->