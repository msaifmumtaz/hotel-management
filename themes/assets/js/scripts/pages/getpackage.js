$("#package").click(function(e){
    e.preventDefault();
    console.log("getting price");
    $.ajax({
        url: "../xhr/getprice.php",
        type: 'POST',
        data:$("#bookForm").serialize(),
        dataType: "html",
        cache: false,
        success: function (data) {
          /// some code to get result
          var resp = JSON.parse(data);
          $("#price").val(resp.price);
          $("#extrabed").html(resp.extrabed);
        }
      });
});