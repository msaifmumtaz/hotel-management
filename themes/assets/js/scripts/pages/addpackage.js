/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsAddPackage = (function () {

  var handleAddPackageFormSubmit = function () {
    $("#addpackage").click(function (e) {
      e.preventDefault();
      var btn = $(this);
      var form = $(this).closest("form");

      form.validate({
        rules: {
          package: {
            required: true
          },
          price:{
            required:true
          },
          extrabed:{
            required:true
          }
        }
      });

      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/addpackage.php",
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
      handleAddPackageFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsAddPackage.init();
});