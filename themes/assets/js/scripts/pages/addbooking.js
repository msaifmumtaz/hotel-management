/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var HmsAddBooking = (function () {

  var handleAddBookingFormSubmit = function () {
    $("#addbooking").click(function (e) {

      e.preventDefault();
      $('.flatpickr-mobile').removeAttr("step");
      var btn = $(this);
      var form = $(this).closest("form");
      form.validate({
        rules: {
          checkin:{required: true},
          checkout:{required: true},
          fname: {
            required: true
          },
          lname: {
            required: true
          },
          email: {
            required: true,
            email:true
          },
          phoneno: {
            required:true,
          },
          idcard: {
            required:true,
          },
          address: {
            required:true,
          },
          country: {
            required:true,
          },
          guests:{
            required:true,
          },
          room_no:{
            required:true,
          },
          price:{
            required:true,
          },
          extrabed:{
            required:true,
          },
          totalpayment:{
            required:true,
          },
          paymentmethod:{
            required:true,
          },
          paid:{
            required:true
          }
        }
      });
      $('[name="checkin"]').rules('remove', 'step');

      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/addbooking.php",
        type: 'post',
        success: function (response, status, xhr, $form) {
          var data = JSON.parse(response);
          if (data.status == 200) {
            swal.fire({
              "title": "",
              "text": data.msg,
              "type": "success",
              "confirmButtonClass": "btn btn-success"
            });
            setTimeout(function(){ window.location.reload(); }, 2000);
          } else {

            swal.fire({
              "title": "",
              "text": data.msg,
              "type": "error",
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
      handleAddBookingFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsAddBooking.init();
});