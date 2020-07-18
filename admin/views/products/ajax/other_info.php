<?php
use common\models\Variables;
use common\helpers\Utils;
?>
<?php if( isset($otherInfoData) && !empty($otherInfoData)){
    foreach ($otherInfoData as $row){
        $time = rand(11111111,999999999); ?>
        <div class="remove_parent_other_info">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group tab-menu-info">
                        <label class="control-label" for="price">Tab/Menu Title</label>
                        <input type="text"
                               class="form-control input_modifier"
                               placeholder="Tab/Menu title.."
                               value="<?= $row['tab_title'];?>"
                               name="Products[other_info][<?php echo $time;?>][tab_title]"
                               aria-required="true">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group info-remove-tab">
                        <label class="control-label close-label-remove">&nbsp</label>
                        <input type="hidden"
                           id="is_remove_<?php echo $time;?>"
                           name="Products[other_info][<?php echo $time;?>][is_removed]"
                           value="0">
                        <input type="hidden"
                           name="Products[other_info][<?php echo $time;?>][product_id]"
                           value="<?= $row['product_id'];?>">
                        <input type="hidden"
                           name="Products[other_info][<?php echo $time;?>][id]"
                           value="<?= $row['id'];?>">
                        <a data-id="<?= $row['id'];?>"
                           href="javascript:void(0);"
                           title="Remove Other Info Section"
                           data-prod_id="<?= $row['product_id'];?>"
                           data-time="<?php echo $time;?>"
                           class="btn btn-danger cst_btn prod_otherinfo_btn_remove">
                            <i class="fa fa-times" aria-hidden="true"></i> Remove Section
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="info-tab-desc">
                        <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
                            'name' => 'Products[other_info]['.$time.'][tab_content]',
                            'value' => $row['tab_content'],
                            'options' => [
                                'id'=>'content',
                            ],
                            'clientOptions' => [
                                'toolbarInline'=> false,
                                'theme' =>'royal', //optional: dark, red, gray, royal
                                'language'=>'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }}else if( isset($add_more)){
    $time = time();
    ?>
    <div class="remove_parent_other_info">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group tab-menu-info">
                    <label class="control-label" for="price">Tab/Menu Title</label>
                    <input type="text"
                       class="form-control input_modifier"
                       placeholder="Tab/Menu title.."
                       name="Products[other_info][<?php echo $time;?>][tab_title]"
                       aria-required="true">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group info-remove-tab">
                    <label class="control-label close-label-remove">&nbsp</label>
                    <input type="hidden" id="is_remove_<?php echo $time;?>" name="Products[other_info][<?php echo $time;?>][is_removed]" value="0">
                    <input type="hidden" name="Products[other_info][<?php echo $time;?>][product_id]" value="0">
                    <input type="hidden" name="Products[other_info][<?php echo $time;?>][id]" value="0">
                    <a
                       data-id="0"
                       href="javascript:void(0);"
                       title="Remove Other Info Section"
                       data-prod_id="0"
                       data-time="<?php echo $time;?>"
                       class="btn btn-danger cst_btn prod_otherinfo_btn_remove">
                        <i class="fa fa-times" aria-hidden="true"></i> Remove Section
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="info-tab-desc">
                    <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
                        'name' => 'Products[other_info]['.$time.'][tab_content]',
                        'value' => "",
                        'options' => [
                            'id'=>'content',
                        ],
                        'clientOptions' => [
                            'toolbarInline'=> false,
                            'theme' =>'royal', //optional: dark, red, gray, royal
                            'language'=>'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
                        ]
                    ]); ?>
                 </div>
            </div>
        </div>
    </div>
<?php } ?>