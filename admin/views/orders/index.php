<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils;

$this->title = 'Orders List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("@web/js/order.js",[
    'depends' => [\yii\web\JqueryAsset::className()]
]);


?>

<?php
    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'id' => 'orderDetailModal',
        'size' => 'modal-lg',
        //        'header' => '<h4>Order Summary</h4>',
        'closeButton' => [
            'tag'   => 'button',
            'label' => '<span aria-hidden="true"><img src="theme/images/icons/close-icn-popup.png" alt="close icn" /></span>'
        ],
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContent'></div>";
    yii\bootstrap\Modal::end();

    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'header' => '<h4>Update Order Status</h4>',
        'id' => 'orderStatusModal', 
        'closeButton' => [
            'tag'   => 'button',
            'label' => '<span aria-hidden="true"><img src="theme/images/icons/close-icn-popup.png" alt="close icn" /></span>'
        ],
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContent'></div>";
    yii\bootstrap\Modal::end();
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="feture_Tble-cst">
            <div class="row">
                <div class="col-sm-12">
                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
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
                                    'label' => 'Order ID',
                                    'class' => 'yii\grid\DataColumn',
                                    'contentOptions' => ['style' => 'width: 3%','class' => 'user_image_td'],
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return '#'.str_pad( $data->id, 6, '0', STR_PAD_LEFT);
                                    }
                                ],
                                [
                                    'label' => 'Client',
                                    'class' => 'yii\grid\DataColumn',
                                    'contentOptions' => ['style' => 'width: 4%','class' => 'user_nameimg'],
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        if($data->user->profile_photo!=NULL){
                                            return '<div class="media feture_Tble-user">
                                                            <div class="media-left">
                                                                <div class="img_circle">
                                                                    <span class="media-object" title="'.$data->user->first_name.'">
                                                                    '.Html::img(Utils::IMG_URL($data->user->profile_photo),[
                                                    'onerror'=>"this.src = $(this).attr('altSrc')",
                                                    'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')
                                                ]).'                                                                     
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                        }else{
                                            return '<div class="media feture_Tble-user table-icon-name">
                                                            <div class="media-left"> 
                                                                <div class="img_circle bg-orange"> 
                                                                    <span class="media-object" title="'.$data->user->first_name.'">
                                                                        '.Utils::getUserShortName($data->user).'
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                        }
                                    },
                                ],
                                [
                                    'label' => '',
                                    'class' => 'yii\grid\DataColumn',
                                    'contentOptions' => ['style' => 'width: 2%','class' => 'user_name_td'],
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return isset($data->user->first_name)
                                            ?(ucwords($data->user->first_name.' '.$data->user->last_name))
                                            :'--' ;
                                    }
                                ],
                                [
                                    'label' => 'Order Status',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        $status = isset($data->productsOrdersStatus->name)?$data->productsOrdersStatus->name:'--';
                                        return '<a title="Change Order Status" href="'.Url::to(['/orders/update-order-status-form?id='.$data->id]).'" class="orderStatusUpdate">'
                                            .$status.'<a/>';
                                    }
                                ],
                                [
                                    'label' => 'Total Pay',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return '$ '.number_format($data->total_pay,2);
                                    }
                                ],
                                [
                                    'label' => 'Total Cart Products',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return $data->totalCartItems;
                                    }
                                ],
                                [
                                    'label' => 'Applied Coupen Code',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->coupen_code!='')?$data->coupen_code:'--';
                                    }
                                ],
                                [
                                    'label' => 'Order Date',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->booking_date!=NULL)?date('M d Y',strtotime($data->booking_date)):'';
                                    }
                                ] ,
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Action',
                                    'template' => '{view}{update_status}',
                                    'buttons'=>[
                                        'view'=>function ($url, $model, $key) {
                                            return Html::tag('a', ' <i class="fa fa-eye" aria-hidden="true"></i>                                                ',
                                                [
                                                    'class' => 'Tble-edit Table-avil viewOrderSummary',
                                                    'title' => 'View Order Summary',
                                                    'href'=> Url::to(['/orders/view-order-summary','id' => $model->id]),
                                                ]
                                            );
                                        },
                                        'update_status'=>function ($url, $model, $key) {
                                            return Html::tag('a', ' <i class="fa fa-pencil-square-o" aria-hidden="true"></i>                                                ',
                                                [
                                                    'class' => 'Tble-edit Table-avil orderStatusUpdate',
                                                    'title' => 'Change Order Status',
                                                    'href'=> Url::to(['/orders/update-order-status-form','id' => $model->id]),
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