<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils;

$this->title = 'Contact Enquiries';
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="feture_Tble-cst">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-outer">
                        <?php Pjax::begin(); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions' =>['class' => 'table contact-enquiry-table'],
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
                                    'label' => 'Contact Name',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->name!='')?$data->name:'--';
                                    }
                                ],
                                [
                                    'label' => 'Email',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->email!='')?$data->email:'--';
                                    }
                                ],
                                [
                                    'label' => 'Mobile/Phone',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->mobile!='')?$data->mobile:'--';
                                    }
                                ],
                                [
                                    'label' => 'Message',
                                    'class' => 'yii\grid\DataColumn',
                                    'contentOptions' => ['class' => 'messageContent'],
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return '<span class="enquiry_text_td">'.($data->message!='')
                                            ?$data->message:'--'.'</span>';
                                    }
                                ],
                                [
                                    'label' => 'Contact Time',
                                    'class' => 'yii\grid\DataColumn',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return ($data->created_at!=NULL)?date('M d Y',strtotime($data->created_at)):'';
                                    }
                                ] ,
//                                [
//                                    'class' => 'yii\grid\ActionColumn',
//                                    'header' => 'Action',
//                                    'template' => '{delete} {edit}',
//                                    'buttons'=>[
//                                        'delete'=>function ($url, $model, $key) {
//                                            return Html::tag('a', '<i class="fa fa-trash-o" aria-hidden="true"></i>',
//                                                [
//                                                    'class' => 'Tble-edit Tble-deleted',
//                                                    'data-pjax' => 0,
//                                                    'title' => 'Delete Employee',
//                                                    'data-method' => 'post',
//                                                    'data-confirm' => 'Are you sure you want to delete this employee?',
//                                                    'href'=> Url::to(['employees/delete?id='.$model->id]),
//                                                ]
//                                            );
//                                        },
//                                        'edit'=>function ($url, $model, $key) {
//                                            return Html::tag('a', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
//                                                [
//                                                    'class' => 'Tble-edit',
//                                                    'title' => 'Edit Employee',
//                                                    'href'=> Url::to(['employees/update?id='.$model->id]),
//                                                ]
//                                            );
//                                        },
//                                    ],
//                                ]
                            ]
                        ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
        </section>
    </div>
</div>
