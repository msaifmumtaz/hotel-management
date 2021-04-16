/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsAddBooking = (function () {

  var handleAddBookingFormSubmit = function () {
    function PriceTotal() {
      var pricesum = 0;
      $('input[name*="price"]').each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
          pricesum += parseFloat($(this).val());
        }
      });
      return pricesum;
    }
    function BedTotal() {
      var bedsum = 0;
      $('[name*="extrabed"]').each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
          bedsum += parseFloat($(this).val());
        }
      });
      return bedsum;
    }
    function AllTotal(){
      var sum=PriceTotal()+BedTotal();
      $("#total-payment").val(sum)
      console.log("Sum of Total Payment is : "+sum);
    }
    $("#total-payment").click(function(){
      AllTotal();
    })
    $("#addbooking").click(function (e) {
      console.log("Adding Booking");
      e.preventDefault();
      $('.flatpickr-mobile').removeAttr("step");
      AllTotal();
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
              "icon": "success",
              "confirmButtonClass": "btn btn-success"
            });
            setTimeout(function(){ window.location.reload(); }, 2000);
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
      handleAddBookingFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsAddBooking.init();
});