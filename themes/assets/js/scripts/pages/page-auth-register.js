/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var HmsRegister = (function () {

  var handleRegisterFormSubmit = function () {
    $("#register").click(function (e) {
      e.preventDefault();
      var btn = $(this);
      var form = $(this).closest("form");
      var alert = $("#response");

      form.validate({
        rules: {
          username: {
            required: true
          },
          password: {
            required: true
          },
          email: {
            required: true,
            email:true
          },
          fullname: {
            required:true,
          },
        }
      });

      if (!form.valid()) {
        return;
      }
      btn.addClass(
          "btn-disabled"
        )
        .attr("disabled", true);
      $("#spin").addClass("spinner-border");
      form.ajaxSubmit({
        url: "../xhr/register.php",
        contentType: 'multipart/form-data',
        type: 'post',
        success: function (response, status, xhr, $form) {
          var data = JSON.parse(response);
          if (data.status == 200) {
            alert.addClass("alert-success p-1");
            alert.append("Sign Up Successful... Redirecting...");
            btn
              .removeClass(
                "btn-disabled"
              )
              .attr("disabled", false);
            $("#spin").removeClass("spinner-border");
            console.log(response);
            setTimeout(function () {
              redirectUser(data.redirect);
            }, 4000);
          } else {

            // simulate 2s delay
            setTimeout(function () {
              alert.addClass("alert-error p-1");
              alert.append(data.message);
              btn
                .removeClass(
                  "btn-disabled"
                )
                .attr("disabled", false);
              $("#spin").removeClass("spinner-border");

              console.log(response);
            }, 1000);
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
      handleRegisterFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsRegister.init();
});