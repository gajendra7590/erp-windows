$(document).ready(function(){

    $('.viewOrderSummary').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if ($('#orderDetailModal').data('bs.modal').isShown) {
            $('#orderDetailModal').find('#modalContent')
                .load(url);
        } else {
            //if modal isn't open; open it and load content
            $('#orderDetailModal').modal('show')
                .find('#modalContent')
                .load(url);
        }
    });


    $('.orderStatusUpdate').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if ($('#orderStatusModal').data('bs.modal').isShown) {
            $('#orderStatusModal').find('#modalContent')
                .load(url);
        } else {
            //if modal isn't open; open it and load content
            $('#orderStatusModal').modal('show')
                .find('#modalContent')
                .load(url);
        }
    });

    //callback function save order status form
    function submitForm(url, data, redirect_url) {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                     toastr.success(response.message,'Success');
                     $('#orderStatusModal').modal('hide');
                     setTimeout(function(){  window.location.href = ''; }, 500);
                } else {
                    $('#orderStatusModal').modal('hide');
                    toastr.error('We are getting error','Error');
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
    }


    $('body').on('beforeSubmit', '#product_status_change_form', function() {

        var newStatus = $('#productsorderstatusactivity-new_status').val();
        var oldStatus = $('#cuurent_order_status').val();

        if(newStatus == '0'){
            toastr.error('Please choose new status','Error');
            return false;
        }

        if( (newStatus == oldStatus) ){
            toastr.error('Same status already exist','Error');
            return false;
        }


        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#product_status_change_form")[0]);
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


})