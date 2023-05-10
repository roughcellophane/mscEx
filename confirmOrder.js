function deleteOrder(orderDetails) {
  const orderNum = document.getElementById(orderDetails);
  orderNum.remove();
}

function confirm() {
    var x = document.getElementById("appearToggle");
    x.style.display = "flex";
  }

  $(".totalPrice").keyup(function() {
    var tot = 0;
    $(".totalPrice").each(function() {
      total += Number($(this).val());
    });
    $('#finalPrice').Number(text(total));
  });

/*
$(".confirmButton").click(function() {
    $(".modalContainer,.confirmOrder").fadeIn("slow");
  });
  
  $(".modalContainer").click(function() {
    $(".modalContainer,.confirmOrder").fadeOut("slow");
  });
  */