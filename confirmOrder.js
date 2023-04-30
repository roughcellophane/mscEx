$(".modalbttn").click(function() {
    $(".modalcontainer,.modal").fadeIn("slow");
  });
  
  $(".close,.buttons").click(function() {
    $(".modalcontainer,.modal").fadeOut("slow");
  });