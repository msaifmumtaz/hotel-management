/*=========================================================================================
  File Name: roomcheckout.js
  Description: Room CheckOut Form Submit Handler
  ----------------------------------------------------------------------------------------
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsCheckOutBooking = (function () {

  var handleCheckOutBookingFormSubmit = function () {
    $("#roomcheckout").click(function (e) {

      e.preventDefault();
      $('.flatpickr-mobile').removeAttr("step");
      var btn = $(this);
      var form = $(this).closest("form");
      form.validate({
        rules: {
          remainingpayment:{
            required:true,
          },
          expaid:{
            required:true,
          },
          paid:{
            required:true,
          },
          verify:{
            required:true,
          },
          rmpay:{
            required:true
          },
          totalpayment:{
            required:true
          }
        }
      });
      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/roomcheckout.php",
        type: 'post',
        success: function (response, status, xhr, $form) {
          var data = JSON.parse(response);
          if (data.status == 200) {
            swal.fire({
              "title": "",
              "text": data.msg,
              "icon": 'success',
              "confirmButtonClass": "btn btn-success"
            });
            setTimeout(function(){ window.location.reload(); }, 5000);
          } else {

            swal.fire({
              "title": "",
              "text": data.msg,
              "icon": "error",
              "confirmButtonClass": "btn btn-danger"
            });
            setTimeout(function () {
              alert.removeClass("alert-error");
              alert.empty();
            }, 5000)
          }
        },
        error: function (response) {
          console.log(response);
        }
      });
    });
  };

  // Public Functions
  return {
    // public functions
    init: function () {
      handleCheckOutBookingFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsCheckOutBooking.init();
});