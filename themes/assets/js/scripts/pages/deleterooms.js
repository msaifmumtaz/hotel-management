/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsDelRooms = (function () {

  var handleDelRoomsFormSubmit = function () {
    $("#deleterooms").click(function (e) {
      e.preventDefault();
      var btn = $(this);
      var form = $(this).closest("form");

      form.validate({
        rules: {
          catid: {
            required: true
          },
          subcatid:{
            required:true
          }
        }
      });

      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/deleterooms.php",
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
      handleDelRoomsFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsDelRooms.init();
});