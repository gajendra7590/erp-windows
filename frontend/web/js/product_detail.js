$(document).ready(function () {
    function getReview(){
        var URL = $('#getReviewURL').val();
        $.ajax({
            url: URL,
            type: 'get',
            data: {},
            success: function(response) {
                $('#loadReviewContainer').html(response);
            },
            error: function() {
                return false;
            }
        });
    }

    function submitReviewForm(url, data) {
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
                        },2000);
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


    $('body').on('beforeSubmit', '#review_form', function() {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                if (response == '1') {
                    var url = form.attr('submit-url');
                    var data = new FormData($("#review_form")[0]);
                    var redirect_url = form.attr('redirect-url');
                    submitReviewForm(url, data); // callback function call
                    return false;
                }
            },
            error: function() {
                return false;
            }
        });
        return false;
    });

    $(document).on('click','.open_reviewModal',function(e){
        e.preventDefault();
        $('#myModal_review').modal('show');
    });

    $(document).on('click','.shareModalOpen',function(e){
        e.preventDefault();
        $('#shareIcon').modal('show');
    });

    //On Page Load get Reivew
    getReview();

});