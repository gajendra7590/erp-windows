<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils;

$this->title = 'Product List';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="feture_Tble-cst">
            <div class="row">
                <div class="col-sm-12">
                    <div class="Tble-cst--btn">
                        <a href="<?= Url::to(['/products/create']);?>" class="add_new_btn" title="Add Product">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <div class="table-outer">
                        <?php Pjax::begin(); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions' =>['class' => 'table'],
                            'layout' => "<div class='table-responsive'>{items}</div><div class='grid-view-pagination'>{pager}</div>",
                            'summary'=>'',
                            'pager' => [
                                'class' => '\yii\widgets\LinkPager',
                                'prevPageLabel'    => '<i class="fa fa-angle-left"></i>',
                                'nextPageLabel'    => '<i class="fa fa-angle-right"></i>',
                                'firstPageLabel'   => false,
                                'lastPageLabel'    => false,
                                'nextPageCssClass' => 'cst_arrow next',
                                'prevPageCssClass' => 'cst_arrow prev',
                                'firstPageCssClass'=> 'first',
                                'lastPageCssClass' => 'last',
                                'maxButtonCount'   => 5,
                                'options' =>  [
                                    'class' => 'pagination pagination_block',
                                ]
                            ],
                            'columns' => [
                                [
                                    'label' => '#',
                                    'class' => 'yii\grid\DataColumn',
                                    'contentOptions' => ['style' => 'width: 6%'],
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        if($data->featured_image!=NULL){
                                            return '<div class="media feture_Tble-user">
                                                            <div class="media-left">
                                                                <div class="img_circle">
                                                                    <span class="media-object">
                                                                    '.Html::img(Utils::IMG_URL($data->featured_image),['onerror'=>"this.src = $(this).attr('altSrc')",'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')]).'                                                                     
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                        }else{
                                            return '<div class="media feture_Tble-user table-icon-name">
                                                            <div class="media-left">
                                                                <div class="img_circle bg-orange">
                                                                    <span class="media-object">'.substr($data->title,0,1).'</span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                        }
                                    },
                                ],
                                [
                                    'label' => 'Product title',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return isset($data->title)?'<div class="amen_desc" data-toggle="tooltip" data-placement="top" 
                                            title="'.$data->title.'">'.(substr($data->title,0,30).'...').'</div>':'';
                                    }
                                ],
                                [
                                    'label' => 'Product Type',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        if($data->product_type == '1'){
                                            return 'Simple Product';
                                        }else{
                                            return 'Variable Product';
                                        }
                                    }
                                ],
                                [
                                    'label' => 'Price',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        if( $data->product_type == '2'){
                                            return Utils::variablePriceObj($data->variablesPrice);
                                        }else{
                                            return '$ '.$data->product_sale_price;
                                        }
                                    }
                                ],
                                [
                                    'label' => 'Published',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        if($data->status == '1'){
                                            return '<span class="active__Status" title="Active">
                                                           <i class="fa fa-check" aria-hidden="true"></i>
                                                       </span>
                                                ';
                                        }else{
                                            return '<span class="unactive__Status" title="In Active">
                                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                                        </span>';
                                        }

                                    }
                                ],
                                [
                                    'label' => 'Last Updated',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->updated_at!=NULL)?date('M d Y',strtotime($data->updated_at)):'';
                                    }
                                ] ,
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Action',
                                    'template' => '{delete} {edit} {preview}',
                                    'buttons'=>[
                                        'delete'=>function ($url, $model, $key) {
                                            return Html::tag('a', '<i class="fa fa-trash-o" aria-hidden="true"></i>',
                                                [
                                                    'class' => 'Tble-edit Tble-deleted',
                                                    'data-pjax' => 0,
                                                    'title' => 'Archieved Product',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Are you sure you want to archive this product?',
                                                    'href'=> Url::to(['products/delete?id='.$model->id]),
                                                ]
                                            );
                                        },
                                        'edit'=>function ($url, $model, $key) {
                                            return Html::tag('a', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
                                                [
                                                    'class' => 'Tble-edit',
                                                    'title' => 'Edit Product',
                                                    'href'=> Url::to(['products/update?id='.$model->id]),
                                                ]
                                            );
                                        },
                                        'preview'=>function ($url, $model, $key) {
                                            return Html::tag('a', '<i class="fa fa-globe" aria-hidden="true"></i>',
                                                [
                                                    'class' => 'Tble-edit',
                                                    'target' => '_blank',
                                                    'title' => 'View product detail on website',
                                                    'style' => 'padding-left: 6px;',
                                                    'href'=> Utils::IMG_URL('product/'.$model->slug),
                                                ]
                                            );
                                        },
                                    ],
                                ]
                            ]
                        ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
        </section>
    </div>
</div>
