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

          for (var i=0; i<resp.length; i++) {
            // alert("JSON Data: " + json[i].pk_records_id);
            $('input[name="packages['+i+'][price]"]').val(resp[i].price);
            console.log(resp[i].price);
         }
          $("#price").val(resp.price);
          $("#extrabed").html(resp.extrabed);
        }
      });
});