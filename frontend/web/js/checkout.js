$(document).ready(function($) {
    $('#billingForm').show();
    $('#shipingForm').hide();
    $('#orderForm').hide();
    $('#paymentForm').hide();

    function loaderHide(){
        $('.loader_image').hide();
    }

    function loaderShow(){
        $('.loader_image').show();
    }

    function setBillingForm() {
        $('#shippingform-first_name').val( $('#billingform-first_name').val() );
        $('#shippingform-last_name').val( $('#billingform-last_name').val() );
        $('#shippingform-company_name').val( $('#billingform-company_name').val() );
        $('#shippingform-email').val( $('#billingform-email').val() );
        $('#shippingform-phone').val( $('#billingform-phone').val() );
        $('#shippingform-country').val( $('#billingform-country').val() );
        $('#shippingform-state').val( $('#billingform-state').val() );
        $('#shippingform-city').val( $('#billingform-city').val() );
        $('#shippingform-zipcode').val( $('#billingform-zipcode').val() );
        $('#shippingform-address_line_one').val( $('#billingform-address_line_one').val() );
        $('#shippingform-address_line_two').val( $('#billingform-address_line_two').val() ) ;
    }

    function resetBillingForm() {
        $('#shippingform-first_name').val('')
        $('#shippingform-last_name').val('')
        $('#shippingform-company_name').val('')
        $('#shippingform-email').val('')
        $('#shippingform-phone').val('');
        $('#shippingform-country').val('');
        $('#shippingform-state').val('');
        $('#shippingform-city').val('');
        $('#shippingform-zipcode').val('');
        $('#shippingform-address_line_one').val('');
        $('#shippingform-address_line_two').val('');
    }

    $('.ship_Address').click(function (e) {
        e.preventDefault();
        var addInput = $('#same_as_billing_address').val();
        var newVal = 0;
        if(addInput == 0){
            newVal = 1;
            setBillingForm();
        }else{
            newVal = 0;
            resetBillingForm();
        }
        $('#same_as_billing_address').val(newVal);
    });
    


    $('.previousPage').click(function (e) {
        e.preventDefault();
        var page_id = $(this).data('page_id');
        $('.allForms').hide();
        $('#'+page_id).show();
    });

    //callback function
    function submitLoginForm(url, data) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    setTimeout(function () {
                        window.location.href = '';
                    },200);
                } else {
                    console.log(response);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
    }

    //callback function
    function submitBillingForm(url, data) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response.success) {
                    $('.allForms').hide();
                    $('#shipingForm').show();
                    setBillingForm();
                }
            },
            error: function() {
                return false;
            }
        });
    }

    //callback function
    function submitShippingForm(url, data) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response.success) {
                    $('.allForms').hide();
                    $('#orderForm').show();
                }
            },
            error: function() {
                return false;
            }
        });
    }

    //checkoutLogin
    $('body').on('beforeSubmit', '#checkoutLogin', function() {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#checkoutLogin")[0]);
                    submitLoginForm(url, data);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });

    //checkoutBillingForm
    $('body').on('beforeSubmit', '#checkoutBillingForm', function() {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#checkoutBillingForm")[0]);
                    submitBillingForm(url, data);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });

    //checkoutBillingForm
    $('body').on('beforeSubmit', '#checkoutShippingForm', function() {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            beforeSend :function () { loaderShow(); },
            complete : function () { loaderHide(); },
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#checkoutShippingForm")[0]);
                    submitShippingForm(url, data);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });

    $('.termsCheck').click(function(){
        if ($(this).is(":checked")){
            $('.stripePayBtn').removeClass('disabled_pay_btn');
        }else{
            $('.stripePayBtn').addClass('disabled_pay_btn');
        }
    });

});