/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/
$("#subcategory").click(function(e){
    e.preventDefault();
    console.log("getting rooms");
    $.ajax({
        url: "../xhr/getavailrooms.php",
        type: 'POST',
        data:$("#bookForm").serialize(),
        dataType: "html",
        cache: false,
        success: function (data) {
          /// some code to get result
    
          $("#availroms").html(data);
        }
      });
});