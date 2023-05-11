<?php
include('db_conn.php');
session_start();
$currentid = $_SESSION['UserID'];
$query = "SELECT * FROM Orders WHERE UserID = '$currentid'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Confirm your order</title>
        <link rel = "icon" href = "https://media.discordapp.net/attachments/1021975352945414186/1085188387692089474/MakSci_Express_Logo_Version_14_-_Symbol_1.1.png" type = "image/x-icon">
        <link rel="stylesheet" href="checkouthtml.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
        <script src="confirmOrder.js"></script>
    </head>
<body>
  <div class="checkoutInfo">
    <div class="checkoutHeader">    
      <div id="titleCard"><a style="color: rgb(43, 119, 132);" href="home.php"><i class="bi bi-caret-left-fill"></i></a>Confirm your order</div>
      <div id="shoppingCart"><i class="bi bi-cart-fill"></i></div>
    </div>

<?php
if (mysqli_num_rows($result) > 0) {
  while($data = mysqli_fetch_assoc($result)) {
 ?>
    <div class="eachOrderRow" id = "order1">
      <div class="row1">
        <div class="orderPicture"><i class="bi bi-bag-plus"></i></div>
        <div class="orderInfo">
          <div class="orderName"><?php echo $data['ProdName']; ?> </div>
          <div class="orderQuantity"><?php echo $data['ProdNum']; ?> orders</div>
        </div>
        <div class="totalPrice">₱ <?php echo $data['PriceValue']; ?></div>
    </div>
    <div class="row2">
        <form action = "deletion.php" method = "post" class="deleteButton" >
          <input type = "hidden" value = <?php echo $data['ProdID'];?>  name = "prod">
          <input type = "hidden" value = <?php echo $data['ProdNum'];?> name = "num">
          <input type = "hidden" value = <?php echo $data['OrderID'];?> name = "order">
          <input type = <?php 
              $tempdata = $data['OrderID'];
              $prompt = "SELECT * FROM Orders WHERE OrderID = '$tempdata'";
              $query2 = mysqli_query($conn,$prompt);
              $wrapup = mysqli_fetch_assoc($query2);
              if ($wrapup['CurrentStatus']==="CONFIRMED"||$wrapup['CurrentStatus']==="WAITING FOR PICKUP"){
                echo "hidden";
              }
              else {
                echo "submit";
              }
          ?> id = "delete" value="Remove Order">
          </form>
    </div>
  </div>
     
  <?php

            }?>
  <div class="eachOrderRow finalPriceDisplay">
    <?php
      $result = mysqli_query($conn, 'SELECT SUM(PriceValue) AS finalPrice FROM ORDERS'); 
      $row = mysqli_fetch_assoc($result); 
      $sum = $row['finalPrice'];
      ?>
    <div class="totalText">Total</div>
    <div class="finalPrice totalPrice">₱ <?php echo $sum; ?></div>
    </div>
    <div><button class="confirmButton" onclick="confirm()">PLACE ORDER</button></div>
  </div>
</div>
<!-- modal -->
<div class="modalContainer" id="appearToggle">
    <div class="confirmOrder">
        <i class="bi bi-check-circle-fill"></i>
        <div class="successMessage" style="font-weight: bold;">Your order is now being sent to the canteen!</div>
        <div class="msgTotalPrice">Don't forget to have <?php echo $sum; ?> pesos ready and pay at the canteen counter to receive your order.</div>
        <div class="marginButton">
        <form action = "confirm.php">
          <input style="background-color: rgb(43, 119, 132); text-decoration: none; padding: 10px; color: white; border-radius: 0.375em; margin-top: 60px; border: none;" type = "submit" value = "RETURN TO MENU">
        </form>
        </div>
    </div>
</div>


  <?php
  
}
else{?>
    <tr>
      <td colspan="8">No orders placed!</td>
      </tr>
    <?php } ?>


</body>
