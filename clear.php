<?php
    session_start();
    include "db_conn.php";
    $clear= "TRUNCATE TABLE Orders";
    $clear2= "TRUNCATE TABLE Timers";
    $clear3= "TRUNCATE TABLE TStamps";
    if(mysqli_query($conn, $clear) && mysqli_query($conn, $clear2)&&mysqli_query($conn, $clear3)){
        echo "clear";
    }
    else{
        echo "error";
    }
    header("Location: home.php");
    exit();
    ?>