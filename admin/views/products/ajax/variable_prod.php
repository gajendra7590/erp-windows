<?php if( isset($edit_data) && !empty($edit_data)){
foreach ($edit_data as $variation){

    //echo '<pre>';print_r($variation);
$time = rand(11111111,999999999); ?>
        <div class="remove_parent">
          <?php if(!empty($varData)){ ?>
            <div class="row">
               <?php foreach ($varData as $k => $var){
                $editD = \common\models\ProductsVarsRowsItems::find()
                    ->where(['row_id' => $variation['id'],'var_type_id' => $var['id']])
                    ->asArray()->one();
                ?>
                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="<?= $var['vname'];?>"><?= $var['vname'];?></label>
                           <input type="text"
                              class="form-control input_modifier required_input <?= strtolower($var['vname']);?>_input"
                              placeholder="Please enter <?= strtolower($var['vname']);?> value.."
                                  value="<?= isset($editD['value'])?$editD['value']:'';?>"
                              name="Products[variable][<?php echo $time;?>][var_types][<?= $var['id'];?>]"
                              aria-required="true">
                       </div>
                   </div>
               <?php } ?>
            </div>
        <?php } ?>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="control-label" for="price">Regular Price</label>
                        <input type="hidden"
                               value="<?php echo $variation['id'];?>"
                               id="<?php echo $time;?>_id"
                               name="Products[variable][<?php echo $time;?>][id]">
                        <input type="hidden"
                               value="0"
                               id="<?php echo $time;?>_is_deleted"
                               name="Products[variable][<?php echo $time;?>][is_deleted]">
                        <input type="hidden"
                               value="<?=$prod_id;?>"
                               id="<?php echo $time;?>_prod_id"
                               name="Products[variable][<?php echo $time;?>][prod_id]">
                        <input type="text"
                               class="form-control input_modifier price_input"
                               value="<?php echo $variation['regular_price'];?>"
                               placeholder="Regular Price.."
                               name="Products[variable][<?php echo $time;?>][regular_price]"
                               aria-required="true">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="control-label" for="price">Sale Price</label>
                        <input type="text"
                               class="form-control input_modifier price_input"
                               value="<?php echo $variation['sale_price'];?>"
                               placeholder="Sale Price.."
                               name="Products[variable][<?php echo $time;?>][sale_price]"
                               aria-required="true">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-4 col-lg-2">
                    <div class="form-group">
                        <label class="control-label close-label-remove">&nbsp;</label>
                        <a data-id="<?php echo $variation['id'];?>"
                           data-prod_id="<?=$prod_id;?>"
                           data-time="<?php echo $time;?>"
                           class="btn btn-danger cst_btn var_prod_btn_remove">
                           <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
    </div>
<?php }}else{
    $time = time();
?>
    <div class="remove_parent">

        <?php if(!empty($varData)){ ?>
            <div class="row">
                <?php foreach ($varData as $k => $var){ ?>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="<?= $var['vname'];?>"><?= $var['vname'];?></label>
                            <input type="text"
                               class="form-control input_modifier required_input <?= strtolower($var['vname']);?>_input"
                               placeholder="Please enter <?= strtolower($var['vname']);?> value.."
                               name="Products[variable][<?php echo $time;?>][var_types][<?= $var['id'];?>]"
                               aria-required="true">
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="price">Regular Price</label>
                    <input type="hidden"
                           value="0" id="<?php echo $time;?>_id"
                           name="Products[variable][<?php echo $time;?>][id]">
                    <input type="hidden"
                           value="0"
                           id="<?php echo $time;?>_is_deleted"
                           name="Products[variable][<?php echo $time;?>][is_deleted]">
                    <input type="hidden"
                           value="<?=$prod_id;?>"
                           id="<?php echo $time;?>_prod_id"
                           name="Products[variable][<?php echo $time;?>][prod_id]">
                    <input type="text"
                           class="form-control input_modifier price_input"
                           placeholder="Regular Price.."
                           name="Products[variable][<?php echo $time;?>][regular_price]"
                           aria-required="true">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="price">Sale Price</label>
                    <input type="text"
                           class="form-control input_modifier price_input"
                           placeholder="Sale Price.."
                           name="Products[variable][<?php echo $time;?>][sale_price]"
                           aria-required="true">
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-4 col-lg-2">
                <div class="form-group">
                    <label class="control-label close-label-remove">&nbsp;</label>
                    <a data-id="0" data-prod_id="<?=$prod_id;?>" data-time="<?php echo $time;?>"
                       class="btn btn-danger cst_btn var_prod_btn_remove">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>