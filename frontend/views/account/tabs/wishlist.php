<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
?>
<div class="dashboard_Panel wishlist-myac">
    <div class="table_desc">
        <div class="cart_page table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="product_remove">Delete</th>
                    <th class="product_thumb">Image</th>
                    <th class="product_name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product_quantity">Stock Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php if ( isset($product_wishlist) && (!empty($product_wishlist))){
                        foreach ($product_wishlist as $wish){ ?>
                        <tr id="item_row_<?= $wish['id'];?>">
                            <td class="product_remove">
                                <a
                                   href="javascript:void(0);"
                                   class="product_remove_btn"
                                   data-id="<?= $wish['id'];?>"
                                   data-url="<?= Url::to(['/account/remove-wishlist?id='.$wish['id']]);?>"
                                >
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                            <td class="product_thumb">
                                <a href="<?= Url::to(['/product/'.$wish['product']['slug'] ]);?>" title="View Product Detail">
                                    <img src="<?= isset($wish['product']['featured_image'])?Utils::IMG_URL($wish['product']['featured_image']):'No Image';?>"
                                         alt="<?= $wish['product']['title'];?>" style="height: 60px;">
                                </a>
                            </td>
                            <td class="product_name">
                                <a href="<?= Url::to(['/product/'.$wish['product']['slug'] ]);?>" target="_blank" title="View Product Detail">
                                    <?= isset($wish['product']['title'])?$wish['product']['title']:'';?>
                                </a>
                            </td>
                            <td class="product-price">
                                <?php if( isset($wish['product']['product_type']) && ($wish['product']['product_type'] == '1') ){ ?>
                                   $<?= isset($wish['product']['price'])?number_format($wish['product']['price'],2):'00.00';?>
                                <?php } else {
                                    echo Utils::variablePrice($wish['product']['variablesPrice']);
                                     ?>
                                <?php }?>
                            </td>
                            <td class="product_quantity">
                                <?= isset($wish['product']['stock_status_label'])?$wish['product']['stock_status_label']:'';?>
                            </td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
