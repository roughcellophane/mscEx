<?php
    session_start();
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST['Food']) ){
        $current = validate($_POST['Food']);
        $command = "SELECT * FROM Menu WHERE ProdId = '$current'";
        $currentinput = mysqli_query($conn,$command);
        $row = mysqli_fetch_assoc($currentinput);
        $_SESSION['COS'] = $row['ProdName'];
        $user = $_SESSION['UserID'];
        $order = validate($current.$_SESSION['UserID']);
        $ID = validate($_SESSION['UserID']);
        $quantity = validate($_POST['quan']);
        $quantityupdated = $quantity - 1 ;
        $standard = 10;
        $check = "SELECT * FROM Orders WHERE UserID = $user";
        $checker = mysqli_fetch_assoc(mysqli_query($conn,$check));
        $comparison = $checker['OrderID'];
        if ($order != $comparison){
            $prep = validate($row['PrepTime'] + ($quantityupdated * $standard));
            $name = validate($row['ProdName']);
            $entry = "INSERT INTO Orders (OrderID, CurrentStatus, UserID, ProdID, ProdNum, CurrentTime, ProdName)
            VALUES ('$order','PLEASE CONFIRM','$ID','$current','$quantity','$prep','$name')";
            if (mysqli_query($conn, $entry)) {
                echo "<script>alert('New record created successfully!')</script>";
            }
            else {
            echo "Error: " . $entry . "<br>" . mysqli_error($conn);
            };
            header("Location: home.php");
            }
        else{
            echo "<h2>Please remove the copy of this order first.</h2>";
            header("Location: home.php?error=Please remove the copy of this order first.");
            exit();
            }
    }
?>