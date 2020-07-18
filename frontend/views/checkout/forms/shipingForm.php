<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\widgets\ActiveForm;
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php $form = ActiveForm::begin([
        'id' => 'checkoutShippingForm',
        'action' => Url::to(['/checkout/shipping-validate']),
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'options' => [
            'enctype' => 'multipart/form-data',
            'submit-url' => Url::to(['/checkout/shipping-submit']),
            'redirect-url' => Url::to(['/'])
        ]
    ]);
    ?>
    <h3> Ship to a different address</h3>
    <!-- ChecK Info Frm -->
    <div class="check-info-frm">
        <div class="row">
            <div class="col-sm-12">
                <input
                    type="hidden"
                    id="same_as_billing_address"
                    value="1"
                    name="ShippingForm[same_as_billing_address]"
                    style="display: none;"
                >
                <label class="primary_Btn ship_Address" data-toggle="collapse" data-target="#collapsetwo"
                       aria-controls="collapseOne">Ship to a different address?</label>

                <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                    <div class="row ">
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">First Name <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'first_name')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->first_name)?$userModel->first_name:'',
                                'placeholder' => 'First Name'])->label(false)
                            ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">Last Name <span>*</span></label>
                            <?= $form->field($shippingModel, 'last_name')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->last_name)?$userModel->last_name:'',
                                'placeholder' => 'Last Name'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-6">
                            <label class="label_Mod"> Email Address <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'email')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->email)?$userModel->email:'',
                                'placeholder' => 'Email Address'])->label(false)
                            ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">Phone<sub>*</sub></label>
                            <?= $form->field($shippingModel, 'phone')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->phone)?$userModel->phone:'',
                                'placeholder' => 'Phone Number'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-12">
                            <label class="label_Mod">Company Name</label>
                            <?= $form->field($shippingModel, 'company_name')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->company_name)?$userModel->company_name:'',
                                'placeholder' => 'Company Name'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-6">
                            <label class="label_Mod" for="country">country <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'country')->dropDownList([
                                'usa' => 'USA',
                                'india' => 'India',
                            ], ['class' => 'form-control input_Mod select_Mod','value' => isset($userModel->country)?$userModel->country:'',])
                                ->label(false) ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">State <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'state')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->state)?$userModel->state:'',
                                'placeholder' => 'State Name'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">Town / City <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'city')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->city)?$userModel->city:'',
                                'placeholder' => 'City Name'])->label(false)
                            ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label_Mod">Zip Code <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'zipcode')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->zip)?$userModel->zip:'',
                                'placeholder' => 'Zip Code'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-12">
                            <label class="label_Mod">Street address <sub>*</sub></label>
                            <?= $form->field($shippingModel, 'address_line_one')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->address_line_two)?$userModel->address_line_two:'',
                                'placeholder' => 'House number and street name'])->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-12">
                            <?= $form->field($shippingModel, 'address_line_two')->textInput([
                                'class' => 'form-control input_Mod',
                                'value' => isset($userModel->address_line_two)?$userModel->address_line_two:'',
                                'placeholder' => 'Apartment, suite, unit etc. (optional)'])->label(false)
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group order-notes">
                    <label class="label_Mod" for="order_note">Order Notes</label>
                    <?= $form->field($shippingModel, 'order_note')->textarea([
                        'class' => 'form-control input_Mod',
                        'rows' => '5',
                        'value' => isset($userModel->address_line_two)?$userModel->address_line_two:'',
                        'placeholder' => 'Notes about your order, e.g. special notes for delivery.'])
                        ->label(false)
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="check-btn-next">
                    <button type="button" data-page_id="billingForm" class="primary_Btn pull-left previousPage">
                        Previous To Billing
                    </button>
                    <button type="submit" class="primary_Btn">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- // ChecK Info Frm -->
    <?php ActiveForm::end(); ?>
</div>
