<?php
 session_start();
 if(isset($_SESSION['UserID']) && $_SESSION['Password']){
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
            </body>
    <?php
 }
 else{
    header('Location: index.php');
    exit();
 }
?>

<!DOCTYPE html>