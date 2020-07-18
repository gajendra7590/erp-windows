$(document).ready(function($) {

    function loaderHide(){
        $('.loader_image').hide();
    }

    function loaderShow(){
        $('.loader_image').show();
    }

    $('.viewOrderSummary').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');

        $('#orderDetailModal').modal('show')
            .find('#modalContent')
            .load(url);
    })

    //callback function for save profile
    function submitUserProfile(url, data) {
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

    //callback function for change password
    function submitChangePassword(url, data) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            beforeSend :function () { loaderShow(); },
            success: function(response) {
                loaderHide();
                if (response.success == true) {
                    toastr.success(response.message);
                    window.location.href = '';
                }else if (response.success == false) {
                    toastr.error(response.message);
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

    $('.product_remove_btn').click(function(e){
        e.preventDefault();
        var URL = $(this).data('url');
        var ID = $(this).data('id');
        $.ajax({
            url: URL,
            type: 'delete',
            data: {},
            beforeSend :function () { loaderShow(); },
            success: function(response) {
                loaderHide();
                if (response.success == true) {
                    $('#item_row_'+ID).remove();
                    toastr.success(response.message);
                }else if (response.success == false) {
                    toastr.error(response.message);
                } else {
                    console.log(response);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
    });

    //Submit function for profile
    $('body').on('beforeSubmit', '#userProfile', function() {
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
                    var data = new FormData($("#userProfile")[0]);
                    submitUserProfile(url, data);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });


    //Submit function for Change Password
    $('body').on('beforeSubmit', '#changePassword', function() {
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
                    var data = new FormData($("#changePassword")[0]);
                    submitChangePassword(url, data);
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });


});