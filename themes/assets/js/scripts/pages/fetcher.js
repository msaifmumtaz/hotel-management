/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
function getallcategories() {
    $.ajax({
      url: "../xhr/getcategories.php",
      type: 'POST',
      dataType: "html",
      cache: false,
      success: function (data) {
        /// some code to get result
  
        $("#categories").html(data);
      }
    });
}
function getallsubcategories() {
    $.ajax({
      url: "../xhr/getsubcategories.php",
      type: 'POST',
      dataType: "html",
      cache: false,
      success: function (data) {
        /// some code to get result
  
        $("#subcategory").html(data);
      }
    });
}