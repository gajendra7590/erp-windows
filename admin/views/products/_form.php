<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\ProductsCategories as PC;
use common\helpers\Utils;
use dosamigos\ckeditor\CKEditor;

$this->registerJsFile("@web/js/products.js",[
    'depends' => [ \yii\web\JqueryAsset::className() ]
]);

$variableTypes = \common\models\VariablesType::find()->where(['vstatus' => '1'])->asArray()->all();
$form_action = ($model && isset($model->id)) ? Yii::$app->request->url : Url::to(['/products/create']);
$valdiation = ($model && isset($model->id)) ? Url::to(['/products/ajax-validation', 'id' => $model->id]) : Url::to(['/products/ajax-validation']);

$btn_title = ( isset($model->id) && ($model->id > 0))?'Update Product':'Save Product';
$feature_img = ($model->featured_image!='')?(Utils::IMG_URL($model->featured_image)):Url::to('@web/theme/images/icons/default.jpg');
?>

<div class="experience-categories-form">
    <input name="bs_url"
           id="bs_url"
           type="hidden"
           value="<?= Url::to(['/products/get-variable-prod','id'=> isset($model->id)?$model->id:0 ]) ?>">
    <?php $form = ActiveForm::begin([
        'id' => 'product_form',
        'action' => $valdiation,
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'options' => [
            'enctype' => 'multipart/form-data',
            'submit-url' => $form_action, 'redirect-url' => Url::to(['/products'])
        ]
    ]); ?>
    <section class="product-create">
        <section class="loader_Sec" style="display: none;">
            <div class="loader_Block">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>
        </section>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <!-- Product Create Content-->
                <div class="product-create_content">

                    <div class="form-group">
                        <?= $form->field($model, 'title')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter product title'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'sku_code')->textInput([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter product SKU Code'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'short_desc')->textarea([
                            'class'=>'form-control input_modifier',
                            'placeholder'=>'Enter product short description',
                            'rows'=> 3
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                            'options' => [
                                'rows' => 15,
                            ],
                            'preset' => 'custom',
                            'clientOptions' => [
                                ['height' => 200],
                                'toolbarGroups' => [
                                    ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                                    ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
                                    ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker']],
                                    '/',
                                    ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                                    ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                                    ['name' => 'links'],
                                    ['name' => 'insert'],
                                    '/',
                                    ['name' => 'styles'],
                                    ['name' => 'size'],
                                    ['name' => 'colors'],
                                    ['name' => 'tools'],
                                    ['name' => 'others']
                                ],
                            ],
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'product_type')->dropDownList([
                            '1' => 'Simple Product',
                            '2' => 'Variable Product',
                        ], ['class' => 'form-control input_modifier select_mod']) ?>
                    </div>
                    <!-- Product Create Tab-->
                    <div class="product-create_tab">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Nav Tabs-->
                                <ul class="nav">
                                    <li class="active"><a data-toggle="tab" href="#home">Product Price</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Product Gallery</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Other Informations</a></li>
                                </ul>
                                <!-- // Nav Tabs-->
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Tab Content-->
                                <div class="tab-content product-crea_tab-content">
                                    <div id="home" class="tab-pane fade in active">

                                        <div class="product_var_types_check_section"
                                             id="variable_types_section" style="display: none;">
                                            <div class="inline_checkbox_container">
                                                <div class="container-title">
                                                    <h4>Select variable types</h4>
                                                </div>
                                                   <?php foreach ($variableTypes as $k => $v) {
                                                       //echo $model->product_variables;
                                                       $isChecked = '';
                                                       $var = explode(',',$model->product_variables);
                                                       if( in_array($v['id'],$var)){
                                                           $isChecked = 'checked';
                                                       }
                                                   ?>
                                                    <label class = "checkbox-inline">
                                                        <div class="custom_checkboxGreen">
                                                            <div class="checkbox_block">
                                                                <span class="checkbox_lable"></span>
                                                                <input type="checkbox"
                                                                       class="variableTypesCheckBoxes"
                                                                       value="<?= $v['id'];?>"
                                                                    <?= $isChecked;?>
                                                                >
                                                                <span class="checkmark"></span><?= $v['vname'];?>
                                                            </div>
                                                        </div>
                                                    </label>
                                                <?php } ?>
                                                <?= $form->field($model, 'product_variables')->hiddenInput()->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="product-crea_tab-title">
                                            <!--<h3>Product Price</h3>-->
                                            <div class="upload_wrapper">
                                                <a href="javascript:void(0)"
                                                   class="btn btn_primary--outline cst_btn"
                                                   id="add_more_variable"
                                                   style="display: none;">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    add more
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-tabs-content" id="simple_prod_section">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <?= $form->field($model, 'product_regular_price')->textInput([
                                                        'class'=>'form-control input_modifier',
                                                        'placeholder'=>'Enter regular price..'
                                                    ]) ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <?= $form->field($model, 'product_sale_price')->textInput([
                                                        'class'=>'form-control input_modifier',
                                                        'placeholder'=>'Enter sale price..'
                                                    ]) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-tabs-content" id="variable_prod_section" style="display: none;">
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="product-crea_tab-title">
                                            <h3>Gallery</h3>
                                            <div class="upload_wrapper">
                                                <input type="file" name="slide_img[]" multiple id="slide_img"
                                                       data-product_id="<?= isset($model->id) ? $model->id : 0; ?>"
                                                       data-url="<?php echo Url::to(['products/upload-media/']); ?>">
                                                <input type="hidden" name="remove_action" id="remove_action"
                                                       data-url="<?php echo Url::to(['products/delete-media/']); ?>">
                                                <label for="slide_img" class="btn btn_primary--outline cst_btn">
                                                    <i class="fa fa-upload" aria-hidden="true"></i> Upload Image
                                                </label>
                                            </div>

                                        </div>
                                        <!--Product Gallery-->
                                        <div class="product-gallery">
                                            <div class="image_upload_section add_on_container">
                                                <div class="row">
                                                     <?php echo isset($mediaHtml) ? $mediaHtml : ''; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- // Product Gallery-->
                                    </div>

                                    <div id="menu2" class="tab-pane fade">
                                        <div class="product-crea_tab-title">
                                            <h3>Other Information</h3>
                                            <div class="upload_wrapper">
                                                <a href="javascript:void(0)"
                                                   class="btn btn_primary--outline cst_btn"
                                                   id="add_more_other_info"
                                                   data-url="<?= Url::to(['/products/add-more-otherinfo']); ?>"
                                                 >
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    add extra info
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-tabs-content" id="prod_other_info_section">
                                            <?= isset($otherInfoHtml)?$otherInfoHtml:'';?>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab Content-->
                            </div>
                        </div>
                    </div>
                    <!-- // Product Create Tab-->
                </div>
                <!-- // Product Create Content-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <!--product-category-->
                <div class="product-category">
                    <?php if( isset($model->id)){ ?>
                        <!--Product Update-->
                        <div class="product-category-list">
                            <a href="<?= Utils::IMG_URL('product/'.$model->slug); ?>"
                               target="_blank"
                               class="view_product">
                                View product detail on website
                            </a>
                        </div>
                    <?php } ?>
                    <!--Product Update-->
                    <div class="product-category-list">
                        <h4>Publish</h4>
                        <ul class="product-category-item">
                            <li>
                                <div class="btn-update-cate">
                                    <?php if( isset($model->id)){ ?>
                                        <?= Html::a(($model->status == '1')?'Unpublish':'Publish',
                                            ['published?id='.$model->id], [
                                                'class' => ($model->status == '1')?'pull-left btn btn-secondary cst_btn':'pull-left btn cst_btn btn-warning',
                                                'data' => [
                                                    'confirm' => ($model->status == '1')?'Are you sure to un publish this product ?':
                                                        'Are you sure to publish this product ?',
                                                    'data-pjax' => 0,
                                                    'title' => ($model->status == '1')?'Un Publish Product':'Publish Product',
                                                    'data-method' => 'post',
                                                ]
                                            ]); ?>
                                    <?php } ?>
                                    <button
                                        data-loading-text="Changes Saving..."
                                        type="submit"
                                        class="product_save btn btn_primary cst_btn">
                                        Save Changes
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--Product Update-->
                    <!--Product Update-->
                    <div class="product-category-list">
                        <h4>Featured</h4>
                        <ul class="product-category-item">
                            <li>
                                <?= $form->field($model, 'is_featured', [
                                    'options' => [
                                        'tag' => 'div',
                                        'class' => 'form_group has-feedback'
                                    ],
                                    'template' =>
                                        '<div class="custom_checkboxGreen">
                                    <div class="checkbox_block">
                                        <span class="checkbox_lable"></span>
                                           {input} 
                                           Check this to mark featured 
                                        <span class="checkmark"></span>
                                    </div>
                                </div>',
                                ])->checkbox()->label(false)->checkbox([], false); ?>
                            </li>
                        </ul>
                    </div>
                    <!--Product Update-->
                    <!--Product Category List-->
                    <div class="product-category-list">
                        <h4>Categories</h4>
                        <ul class="product-category-item">
                            <?=
                            $form->field($model, 'categories')->checkboxList(
                                \yii\helpers\ArrayHelper::map(PC::find()->where(['status'=> '1'])->all(), "id", "category_name"),[
                                'onclick' => "$(this).val( $('input:checkbox:checked').val()); ",
                                'item' => function($index, $label, $name, $checked, $value) {
                                    $isCheched = ($checked == true)?"checked='checked'":"";
                                    return "<li>
                                              <div class='custom_checkboxGreen'>
                                                    <div class='checkbox_block'>
                                                        <span class='checkbox_lable'></span>
                                                        <input type='checkbox' { $isCheched }checked='no' name='{$name}' value='{$value}' aria-invalid='false'>
                                                          {$label}
                                                        <span class='checkmark'></span>
                                                    </div>
                                               </div>
                                            </li>";
                                },
                                'template'=> '{error}{input}'
                            ])->label(false);
                            ?>
                        </ul>
                    </div>
                    <!--Product Category List-->
                    <!-- Featured Image -->
                    <div class="product-category-list">
                        <h4>Featured Image</h4>
                        <ul class="product-category-item">
                            <li class="features_images-ele">
                                <!-- Featured Images -->
                                <div class="product-featured">
                                    <div class="product-featured-img">
                                        <div class="product-featured-img-edit">
                                            <div class="field-imageUpload">
                                                <?= $form->field($model, 'fimage')->fileInput([
                                                    'id'=>'imageUpload'
                                                ])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="product-featured-img-preview">
                                            <div id="imagePreview" style="background-image: url(<?= $feature_img ?>);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-featured-btn">
                                        <label for="imageUpload" class="btn btn_primary--outline cst_btn">Choose Featured Image</label>
                                        <!--<button class="btn btn-secondary cst_btn"> Cancel</button>-->
                                    </div>
                                </div>
                                <!-- // Featured Images -->
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- // Product Category-->
            </div>
        </div>
    </section>
    <?php ActiveForm::end(); ?>
</div>



