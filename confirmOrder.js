function deleteOrder(orderDetails) {
  const orderNum = document.getElementById(orderDetails);
  orderNum.remove();
}

function confirm() {
    var x = document.getElementById("appearToggle");
    x.style.display = "flex";
  }

/*
$(".confirmButton").click(function() {
    $(".modalContainer,.confirmOrder").fadeIn("slow");
  });
  
  $(".modalContainer").click(function() {
    $(".modalContainer,.confirmOrder").fadeOut("slow");
  });
  */