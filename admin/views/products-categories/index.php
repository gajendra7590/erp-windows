<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use common\helpers\Utils; 
 
$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?> 
 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <section class="feture_Tble-cst">
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="Tble-cst--btn">
                                    <a href="<?= Url::to(['/products-categories/create']);?>" class="add_new_btn" title="Add New Category">
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
                                            if($data->category_img!=NULL){
                                                return '<div class="media feture_Tble-user">
                                                            <div class="media-left">
                                                                <div class="img_circle">
                                                                    <span class="media-object">
                                                                    '.Html::img(Utils::IMG_URL($data->category_img),['onerror'=>"this.src = $(this).attr('altSrc')",'altSrc'=>Url::to('@web/asset/images/icons/upload_img.png')]).'                                                                     
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>';
                                            }else{
                                                return '<div class="media feture_Tble-user table-icon-name">
                                                            <div class="media-left">
                                                                <div class="img_circle bg-orange">
                                                                    <span class="media-object">'.substr($data->category_name,0,1).'</span>
                                                                </div>
                                                            </div> 
                                                        </div>'; 
                                            }                                
                                          },
                                      ],
                                      [
                                        'label' => 'Category Name',
                                        'class' => 'yii\grid\DataColumn',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return ($data->category_name!='')?$data->category_name:'--';
                                         }
                                      ],
                                      [
                                        'label' => 'Category Description',
                                        'class' => 'yii\grid\DataColumn',
                                        'contentOptions' => [
                                            'class' => 'gridviewDesc',
                                            'style' => 'width:100px;'
                                        ],
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return isset($data->category_desc)?'<div class="amen_desc" data-toggle="tooltip" data-placement="top" 
                                            title="'.$data->category_desc.'">'.(substr($data->category_desc,0,49).'...').'</div>':'';
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
                                                    'title' => 'Delete',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Are you sure you want to archive this category?',
                                                    'href'=> Url::to(['products-categories/delete?id='.$model->id]),
                                                    ]
                                                ); 
                                            },
                                            'edit'=>function ($url, $model, $key) {
                                                return Html::tag('a', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
                                                        [
                                                        'class' => 'Tble-edit',
                                                        'title' => 'Edit',
                                                        'href'=> Url::to(['products-categories/update?id='.$model->id]),
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
