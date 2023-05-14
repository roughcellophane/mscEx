<?php
    $sname = "localhost";
    $uname = "root";
    $pass = "";

    $db_name = "accounts";

    $conn = mysqli_connect($sname,$uname,$pass,$db_name);

    if(!$conn){
        echo "Error connecting!";
    }
?>