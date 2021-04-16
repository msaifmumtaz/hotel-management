/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsExtendBooking = (function () {

  var handleExtendBookingFormSubmit = function () {
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
      var extotal=parseFloat($("#ex-total-payment").val());
      var sum=PriceTotal()+BedTotal()+extotal;
      $("#total-payment").val(sum)
      console.log("Sum of Total Payment is : "+sum);
    }
    $("#total-payment").click(function(){
      AllTotal();
    })
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
          },
          expaid:{
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