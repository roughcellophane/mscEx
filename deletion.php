<?php
    session_start();
    include("db_conn.php");
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };
    $code  = validate($_POST['prod']);
    $num   = validate($_POST['num']);
    $order = validate($_POST['order']);
    $id    = validate($_SESSION['UserID']);
    $condition = "ProdID = '$code' AND ProdNum = '$num' AND OrderID = '$order' AND UserID = '$id'";
    $deletion = "DELETE FROM Orders WHERE $condition";
    $result = mysqli_query($conn,$deletion);
    header("Location:checkout real.php");?>