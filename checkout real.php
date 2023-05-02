<?php
include('db_conn.php');
session_start();
$currentid = $_SESSION['UserID'];
$query = "SELECT * FROM Orders WHERE UserID = '$currentid'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<head>
  <style>
    #delete {}
    </style>
  </head>
<body>
<a href="home.php">Home</a>
<table border ="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Time left</th>
        <th>Current Status</th>
        <th>Delete?</th>
        </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['ProdName']; ?> </td>
   <td><?php echo $data['ProdNum']; ?> </td>
   <td><?php echo $data['CurrentTime']; ?> </td>
   <td><?php echo $data['CurrentStatus']; ?> </td>
   <td><form action = "deletion.php" method = "post">
       <form>
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
          ?> id = "delete">
          </form></td>
    </tr>
  <?php
  }?>
  </table>
  <form action = "confirm.php">
    <input type = "submit" value = "Confirm Orders">
    </form>
  <?php
  
}
else{?>
    <tr>
      <td colspan="8">No orders placed!</td>
      </tr>
    <?php } ?>
</body>