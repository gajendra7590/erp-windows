$(document).ready(function($) {

    //Callback function for remove item from cart
    function removeCartItemAction(action,form){
        $.ajax({
            url: action,
            type: 'post',
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message,'Success');
                    setTimeout(function () {
                        window.location.href = response.redirect_url;
                    },1000);
                } else {
                    console.log(response);
                    return false;
                }
            },
            error: function(error) {
                return false;
            }
        });
    }

    //Callback function for add Item in Cart
    function addToCartItemAction(action,data) {
        $.ajax({
            url: action,
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
                    console.log(response);
                    return false;
                }
            },
            error: function(error) {
                return false;
            }
        });
    }

    //Callback function for update Cart
    function updateCartItemAction(action,formdata) {
        $.ajax({
            url: action,
            type: 'post',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message,'Success');
                    setTimeout(function () {
                        window.location.href = response.redirect_url;
                    },1000);
                } else {
                    console.log(response);
                    return false;
                }
            },
            error: function(error) {
                return false;
            }
        });
    }


    $('.removeCartItem').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = $(this).data('action');
        var form = new FormData();
        form.append('id',id);
        removeCartItemAction(action,form);
    });

    $('.addCart_Btn').click(function (e) {
        e.preventDefault();
        var quantity = $('#product_quantity').val();
        if(quantity > 0){
            var form = $('#addToCartForm');
            var formData = new FormData(form[0]);
            var action = form.attr('action');
            addToCartItemAction( action ,formData);
        }else{
            toastr.error('Invalid quantity');
        }
    });

    $('#updateCartBtn').click(function (e) {
        e.preventDefault();
        var validate = true;
        $('.quantityInput').each(function(index,item) {
            if($(this).val() <= 0 ){
                validate = false;
            }
        });
        if(validate == true) {
            var form = $('#updateCartForm');
            var formData = new FormData(form[0]);
            var Action = form.attr('action');
            updateCartItemAction(Action,formData);
        }else {
            toastr.error('Invalid quantity value');
        }
    });

    $('.updateCart_Btn').click(function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var quantity = $('#product_quantity').val();
        if(quantity > 0){
            var action = $(this).data('action');
            var form = $('#addToCartForm');
            var formData = new FormData(form[0]);
            formData.append('id',id);
            updateCartItemAction(action,formData);
        }else{
            toastr.error('Invalid quantity');
        }

        // alert( id +' '+quantity+' '+action);
    });


    //Fucntion for add/remove wishlist from product detail page
    $('.addWishlistBtn').click(function(e){
        e.preventDefault();
        var URL = $(this).data('url');
        $.ajax({
            url: URL,
            type: 'put',
            data: {},
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message,'Success');
                    setTimeout(function () {
                        window.location.href = '';
                    },500);
                } else {
                    console.log(response);
                    return false;
                }
            },
            error: function(error) {
                return false;
            }
        });
    });



    // $('.quantityInput').keyup(function () {
    //     var quantity = $(this).val();
    //     var prevq = $(this).data('prevq');
    //     var price = $(this).data('price');
    //     var id = $(this).data('id');
    //     if(quantity > 0){
    //         var total = ( price * quantity );
    //         $('#total_'+id).html(total);
    //     }
    //
    // });


});