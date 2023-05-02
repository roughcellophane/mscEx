<?php
 session_start();
 include('db_conn.php');
 if(isset($_SESSION['UserID']) && $_SESSION['Password']){
    if(isset($_SESSION['error'])){
        if($_SESSION['error'] =='wait'){
            echo "<script>alert('Please wait for your pre-existing order to be completed first.')</script>";
            $_SESSION['error']="";
        }
        elseif($_SESSION['error'] =='invalidfood'){
            echo "<script>alert('Food code invalid.')</script>";
            $_SESSION['error']="";
            }
        elseif($_SESSION['error']=='nocopies'){
            echo "<script>alert('Please remove your pre-existing copy of this food first.')</script>";
            $_SESSION['error']="";
            }
        elseif($_SESSION['error']=='deletepickup'){
            echo "<script>alert('Please remove your awaiting food first.')</script>";
            $_SESSION['error']="";
        }
    }
        ?>    
                
        <!DOCTYPE html>
    <html>
        <script>
            </script>
        <head>
            <title>MENU</title>
            </head>
        <body>
            <h1>Good day, <?php echo $_SESSION['FName']?> <?php echo $_SESSION['LName']?>!</h1>
            <a href="logout.php">Logout</a>
            <br>
            <a href="checkout real.php">Checkout</a> 
            <br>
            <table>
                <tr>
                    <td>Tonkatsu
                        <form action="entry.php" method="post">
                            <input name="Food" type="hidden" value="M1">
                            <input type="number" name ="quan" max = "9" min = "1">
                            <input type="submit">
                            </form>
                    </td>
                    <td>Fried Chicken
                        <form action="entry.php" method="post">
                            <input name="Food" type="hidden" value="M2">
                            <input type="number" name ="quan" max = "9" min = "1">
                            <input type="submit">
                            </form>
                    </td>
                    <td>Dinuguan
                        <form action="entry.php" method="post">
                            <input name="Food" type="hidden" value="M3">
                            <input type="number" name ="quan" max = "9" min = "1">
                            <input type="submit">
                            </form>
                    </td>
                    </tr>
                </table>
            <div>
                
            <?php if (isset($_SESSION['COS'])){
                echo $_SESSION['COS'];
                }
                ?>
            <?php
                if ($_SESSION['Access']=="admin"){
                ?>
                <p><br>Clear all orders</p>
                <form action = "clear.php">
                    <input type="submit">
                    </form>
                <p><br>Start timer</p>
                <form action = "timerstart.php">
                    <input type="submit">
                    </form>
                    <br>
                    <table border ="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>UserID</th>
        <th>CurrentStatus</th>
        </tr>
<?php
$query = "SELECT * FROM Orders";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['UserID']; ?> </td>
   <td><?php echo $data['CurrentStatus']; ?> </td>
    </tr>
  <?php
  }
}?>
  </table>
            <?php
                }
                ?>
            </body>
    <?php
 }
 else{
    header('Location: index.php');
    exit();
 }
?>

<!DOCTYPE html>