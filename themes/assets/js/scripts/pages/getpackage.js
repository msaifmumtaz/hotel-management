function getPrices() {
  $.ajax({
    url: "../xhr/getprice.php",
    type: 'POST',
    data: $("#bookForm").serialize(),
    dataType: "html",
    cache: false,
    success: function (data) {
      /// some code to get result
      var resp = JSON.parse(data);
      for (var i = 0; i < resp.length; i++) {
        $('[name="packages[' + i + '][price]"]').val(resp[i].price);
        $('[name="packages[' + i + '][extrabed]"]').html(resp[i].extrabed);
      }
    }
  });
}