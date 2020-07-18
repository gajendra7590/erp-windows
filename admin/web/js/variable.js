$(document).ready(function($) {
     // $('#variables-color_code').attr('readonly',true);
     var TYPE = $('#variables-type').val();
     if(TYPE=='1'){
          $('#color_code_div').show();
     }else{
          $('#color_code_div').hide();
     }

     $('#variables-type').change(function () {
          var TYPE = $(this).val();
          if(TYPE=='1'){
               $('#color_code_div').show();
          }else{
               $('#color_code_div').hide();
          }
     });

});