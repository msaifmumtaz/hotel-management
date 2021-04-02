/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var HmsAddSubCategory = (function () {

  var handleAddSubCategoryFormSubmit = function () {
    $("#addsubcategory").click(function (e) {
      e.preventDefault();
      var btn = $(this);
      var form = $(this).closest("form");

      form.validate({
        rules: {
          catname: {
            required: true
          }
        }
      });

      if (!form.valid()) {
        return;
      }
      form.ajaxSubmit({
        url: "../xhr/addsubcategory.php",
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
      handleAddSubCategoryFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsAddSubCategory.init();
});