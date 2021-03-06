/*=========================================================================================
  File Name: Login.js
  Description: User Login Handler
  ----------------------------------------------------------------------------------------
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
var HmsLogin = (function () {

  var handleLoginFormSubmit = function () {
    $("#signin").click(function (e) {
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
          }
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
        url: "../xhr/login.php",
        type: 'post',
        success: function (response, status, xhr, $form) {
          var data = JSON.parse(response);
          if (data.status == 200) {
            alert.addClass("alert-success p-1");
            alert.append("Login Successful... Redirecting...");
            btn
              .removeClass(
                "btn-disabled"
              )
              .attr("disabled", false);
            $("#spin").removeClass("spinner-border");
            console.log(response);
            setTimeout(function(){ window.location = "/admin/dashboard"; }, 4000);
          } else {

            // simulate 2s delay
              alert.addClass("alert-danger p-1");
              alert.append(data.msg);
              btn
                .removeClass(
                  "btn-disabled"
                )
                .attr("disabled", false);
              $("#spin").removeClass("spinner-border");

              console.log(response);
            setTimeout(function () {
              alert.removeClass("alert-danger");
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
      handleLoginFormSubmit();
    }
  };
})();

// Class Initialization
jQuery(document).ready(function () {
  HmsLogin.init();
});