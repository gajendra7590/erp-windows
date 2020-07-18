$(document).ready(function($) {
    //callback function
    function submitForm(url, data, redirect_url) {
        var ifSuccess = validateCustomInputs();
        if (ifSuccess == false) { //Check Custom validations for dynamic fields
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message,'Success');
                        setTimeout(function () {
                            window.location.href = response.redirect_url;
                        },1000);
                    } else {
                        toastr.error('We are getting error','Success');
                        return false;
                    }
                },
                error: function() {
                    return false;
                }
            });
        }
    }

    $('body').on('beforeSubmit', '#product_form', function() {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            beforeSend:function(){
                $('.product_save').button('loading');
                //$('.loader_Sec').show();
            },
            complete:function(){
                $('.product_save').button('reset');
               // $('.loader_Sec').hide();
            },
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#product_form")[0]);
                    var redirect_url = form.attr('redirect-url');
                    submitForm(url, data, redirect_url); // callback function call
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });

    function getVariableProd(bs_url,action = 'new'){
        var var_ids = $('#products-product_variables').val();
        $.ajax({
            url: bs_url+'&var_ids='+var_ids+'&action='+action,
            type: 'get',
            data: {},
            success: function(html) {
                $('#variable_prod_section').append(html);
            },
            error: function() {
                return false;
            }
        });
    }


    function onPageLoad(){
        var bs_url = $('#bs_url').val();
        var type = $('#products-product_type').val();
        REGULAR_PRICE =  $('#products-product_regular_price').val();
        SELL_PRICE =  $('#products-product_sell_price').val();
        if(type == '2'){
            $('#simple_prod_section').hide();
            $('#variable_prod_section').show();
            $('#variable_types_section').show();
            $('#add_more_variable').show();
            $('#products-product_regular_price').val(0);
            $('#products-product_sell_price').val(0);
            getVariableProd(bs_url,'edit_data');
        }else{
            $('#add_more_variable').hide();
            $('#simple_prod_section').show();
            $('#variable_prod_section').hide();
            $('#variable_types_section').hide();
            $('#variable_prod_section').html('');
        }
    }
    var SELL_PRICE = 0;
    var REGULAR_PRICE = 0;
    onPageLoad(); //On Page Load

    //Add more variables button
    $('#add_more_variable').click(function (e) {
        e.preventDefault();
        var bs_url = $('#bs_url').val();
        getVariableProd(bs_url);
    });

    //variables types checkboxes checked event update values
    $('.variableTypesCheckBoxes').click(function(){
        var bs_url = $('#bs_url').val();
        var checkedVals = $('.variableTypesCheckBoxes:checkbox:checked').map(function() {
            return this.value;
        }).get();
        checkedVals = checkedVals.join(",");
        $('#products-product_variables').val(checkedVals);
        $('#variable_prod_section').html('');
        getVariableProd(bs_url,'edit_data');
    });

    $(document).on('click','.var_prod_btn_remove',function (e){
      e.preventDefault();
           var count = $('.remove_parent').length;
           if(count > 1){
                var id = $(this).data('id');
                var prod_id = $(this).data('prod_id');
                var time = $(this).data('time');
                if(id > 0 && prod_id > 0){
                    $('#'+time+'_is_deleted').val(1);
                    $(this).parents().parent('div.remove_parent').hide();
                    $(this).parents().parent('div.remove_parent').removeClass('remove_parent');
                }else{
                    $(this).parents().parent('div.remove_parent').remove();
                }
           }else{
               toastr.error('Opps! You can not remove all the variations');
           }
    });

    $('#publish_status').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        alert(id);

    })

    $('#products-product_type').change(function () {
        var type = $(this).val();
        var bs_url = $('#bs_url').val();
        if(type == '2'){
            $('#simple_prod_section').hide();
            $('#variable_prod_section').show();
            $('#variable_types_section').show();
            $('#add_more_variable').show();
            $('#products-product_regular_price').val(REGULAR_PRICE);
            $('#products-product_sell_price').val(SELL_PRICE);
            getVariableProd(bs_url,'edit_data');
        }else{
            $('#add_more_variable').hide();
            $('#simple_prod_section').show();
            $('#variable_prod_section').hide();
            $('#variable_types_section').hide();
            $('#variable_prod_section').html('');
        }
    });

    // Callback function for upload slider images
    $('#slide_img').change(function() {
            var formdata = new FormData();
            var filesLength = document.getElementById('slide_img').files.length;
            for(var i=0;i<filesLength;i++){
                formdata.append("upload_media[]", document.getElementById('slide_img').files[i]);
            }
            var url = $(this).data('url');
            var product_id = $(this).data('product_id');
            formdata.append('product_id', product_id);
            $.ajax({
                url: url,
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response != false) {
                        $('.image_upload_section').append(response);
                    }
                },
                error: function() {
                    return false;
                }
            });
    });

    $(document).on('click', '.removeMediaImage', function() {
        var formdata = new FormData();
        formdata.append('image_name', $(this).data('img'));
        formdata.append('media_id', $(this).data('media_id'));
        formdata.append('product_id', $(this).data('product_id'));
        var url = $('#remove_action').data('url');
        var ele = $(this);
        $.ajax({
            url: url,
            type: 'post',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response == '1') {
                    ele.closest("div.image-div-main").remove();
                }
            },
            error: function() {
                return false;
            }
        });
    });


    //Code start for validate JS Client Side
    $(document).on('blur keyup','.required_input',function () {
    // $('.color_input').bind('blur keyup', function(){
        $(this).parent('div').children('.text-danger').remove();
        if($(this).val() == ''){
            $(this).parent('div').append('<span class="text-danger">Field Required</span>');
        }
    });

    $(document).on('blur keyup','.price_input',function () {
    // $('.price_input').bind('blur keyup', function(){
        var  phone_number = $(this).val();
        $(this).parent('div').children('.text-danger').remove();
        if (phone_number == '') {
            $(this).after('<p class="custom_errors text-danger">Price Required</p>');
        } else {
            if (($.isNumeric(phone_number) == false) || (phone_number < 0)) {
                $(this).after('<p class="custom_errors text-danger">Invalid Price</p>');
            }
        }
    });


    //Function for remove add more info tab item
    $(document).on('click','.prod_otherinfo_btn_remove',function(){
        var prod_id = $(this).data('prod_id');
        var time = $(this).data('time');
        if(prod_id > 0 ){
            $('#is_remove_'+time).val(1);
            $(this).parent('div').parents('div.remove_parent_other_info').hide();
        }else {
            $(this).parent('div').parents('div.remove_parent_other_info').remove();
        }
    });

    //Event for add more Other Infomration
    $('#add_more_other_info').click(function(e){
        e.preventDefault();
        var URL = $(this).data('url');
        $.ajax({
            url: URL,
            type: 'get',
            data: {},
            success: function(response) {
                $('#prod_other_info_section').append(response);
            },
            error: function() {
                return false;
            }
        });

    });

    function validateCustomInputs() {
        var price_input = $('.price_input').length;
        var required_input = $('.required_input').length;
        $('.custom_errors').remove();
        var errors = false;

        if (required_input > 0) {
            $('.required_input').each(function(index, input) {
                if (input.value == '') {
                    $(this).after('<p class="custom_errors text-danger">Field Required</p>');
                    errors = true;
                }
            });
        }

        if (price_input > 0) {
            $('.price_input').each(function(index, input) {
                if (input.value == '') {
                    $('a[href="#home"]').trigger("click");
                    $(this).after('<p class="custom_errors text-danger">Price Required</p>');
                    $(this).focus();
                    errors = true;
                } else {
                    if (($.isNumeric(input.value) == false) || (input.value < 0)) {
                        $('a[href="#home"]').trigger("click");
                        $(this).after('<p class="custom_errors text-danger">Invalid Price</p>');
                        $(this).focus();
                        errors = true;
                    }
                }
            });
        }

        if(errors == true){
            window.scrollTo(0,document.body.scrollHeight);
        }
        return errors;
    }

});