/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var HmsExtendBooking = (function () {

  var handleExtendBookingFormSubmit = function () {
    $("#extendbooking").click(function (e) {

      e.preventDefault();
      $('.flatpickr-mobile').removeAttr("step");
      var btn = $(this);
      var form = $(this).closest("form");
      form.validate({
        rules: {
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
      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/extendbooking.php",
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
      handleExtendBookingFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsExtendBooking.init();
});