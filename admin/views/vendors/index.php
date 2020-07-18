<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils; 
 
$this->title = 'Vendors List';
$this->params['breadcrumbs'][] = $this->title;
?> 
 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <section class="feture_Tble-cst">
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="Tble-cst--btn">
                                    <a href="<?= Url::to(['/vendors/create']);?>" class="add_new_btn" title="Add Vendor">
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
                                            if($data->profile_photo!=NULL){
                                                return '<div class="media feture_Tble-user">
                                                            <div class="media-left">
                                                                <div class="img_circle">
                                                                    <span class="media-object">
                                                                    '.Html::img(Utils::IMG_URL($data->profile_photo),['onerror'=>"this.src = $(this).attr('altSrc')",'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')]).'                                                                     
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                            }else{ 
                                                return '<div class="media feture_Tble-user table-icon-name">
                                                            <div class="media-left">
                                                                <div class="img_circle bg-orange">
                                                                    <span class="media-object">'.Utils::getUserShortName($data).'</span>
                                                                </div>
                                                            </div> 
                                                        </div>'; 
                                            }                                
                                          },
                                      ],
                                      [
                                        'label' => 'First Name',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return ($data->first_name!='')?$data->first_name:'--';
                                         }
                                      ],
                                      [
                                        'label' => 'Last Name',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return ($data->last_name!='')?$data->last_name:'--';
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
                                        'label' => 'Phone',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return ($data->phone!='')?$data->phone:'--';
                                        }
                                      ],
                                      [
                                        'label' => 'Gender',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            if($data->gender == 'male'){
                                                return '<i title="Male" class="fa fa-male fa-2x" aria-hidden="true"></i>';
                                            }else if ($data->gender == 'female'){
                                                return '<i title="Female" class="fa fa-female fa-2x" aria-hidden="true"></i>';
                                            }
                                            else{
                                                return '--';
                                            }
                                        }
                                      ],
                                      [
                                        'label' => 'Ip Address',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return ($data->ip_address!='')?$data->ip_address:'--';
                                         }
                                      ],
                                      [
                                        'label' => 'Status',
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
                                        'template' => '{delete} {edit}',
                                        'buttons'=>[
                                            'delete'=>function ($url, $model, $key) {  
                                                return Html::tag('a', '<i class="fa fa-trash-o" aria-hidden="true"></i>',
                                                    [
                                                    'class' => 'Tble-edit Tble-deleted',
                                                    'data-pjax' => 0,
                                                    'title' => 'Archieved Vendor',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Are you sure you want to archive this vendor?',
                                                    'href'=> Url::to(['vendors/delete?id='.$model->id]),
                                                    ]
                                                ); 
                                            },
                                            'edit'=>function ($url, $model, $key) {
                                                return Html::tag('a', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
                                                        [
                                                        'class' => 'Tble-edit',
                                                        'title' => 'Edit Vendor',
                                                        'href'=> Url::to(['vendors/update?id='.$model->id]),
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
