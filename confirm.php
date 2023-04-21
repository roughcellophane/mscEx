<?php
    session_start();
    require('db_conn.php');
    $id = $_SESSION['UserID'];
    $command = "UPDATE Orders 
                SET CurrentStatus = 'CONFIRMED' 
                WHERE UserID='$id'";
    if (mysqli_query($conn,$command)){
        echo "<h2>Confirmed Orders!</h2>";
    }
    else {
        echo "<h2>Order failed to be confirmed.</h2>";
    };
    header("Location:checkout real.php")
    ?>