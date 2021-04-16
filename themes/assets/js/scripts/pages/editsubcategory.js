/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsEditSubCategory = (function () {

  var handleEditSubCategoryFormSubmit = function () {
    $("#editsubcatname").click(function (e) {
      e.preventDefault();
      var btn = $(this);
      var form = $("#editcate");

      form.validate({
        rules: {
          editnamesubcat: {
            required: true
          }
        }
      });

      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/editsubcategory.php",
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
      handleEditSubCategoryFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsEditSubCategory.init();
});