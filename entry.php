<?php
    session_start();
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $UserID = $_SESSION['UserID'];
    $sql = "SELECT * FROM Orders WHERE UserID = '$UserID' AND CurrentStatus = 'CONFIRMED'";
    $sql2 = "SELECT * FROM Orders WHERE UserID = '$UserID' AND CurrentStatus = 'READY FOR PICKUP'";

    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
    if(mysqli_num_rows($result2) == 0){   
    if(mysqli_num_rows($result) == 0) {
        if (isset($_POST['Food'])){
            $current = validate($_POST['Food']);
            $command = "SELECT * FROM Menu WHERE ProdId = '$current'";
            $currentinput = mysqli_query($conn,$command);
            $row = mysqli_fetch_assoc($currentinput);
            $_SESSION['COS'] = $row['ProdName'];
            $user = $_SESSION['UserID'];
            $order = validate($current.$_SESSION['UserID']);
            $ID = validate($_SESSION['UserID']);
            $quantity = validate($_POST['quan']);
            $price = $row['PriceValue'];
            $value = $price * $quantity;
            $quantityupdated = $quantity - 1 ;
            $standard = 10;
            $check = "SELECT * FROM Orders WHERE UserID = '$user'";
            $checker = mysqli_fetch_assoc(mysqli_query($conn,$check));
            $comparison = $checker['OrderID'];
            if ($order != $comparison){
                $prep = validate($row['PrepTime'] + ($quantityupdated * $standard));
                $name = validate($row['ProdName']);
                $entry = "INSERT INTO Orders (OrderID, CurrentStatus, UserID, ProdID, ProdNum, CurrentTime, ProdName, PriceValue)
                VALUES ('$order','PLEASE CONFIRM','$ID','$current','$quantity','$prep','$name','$value')";
                if (mysqli_query($conn, $entry)) {
                    echo "<script>alert('New record created successfully!')</script>";
                }
                else {
                    echo "Error: " . $entry . "<br>" . mysqli_error($conn);
                };
                header("Location: home.php");
            }
            else{
                $_SESSION['error'] ='nocopies';
                header('Location: home.php');
                exit();
                }
    }
    else{
        $_SESSION['error'] ='invalidfood';
        header('Location: home.php');
        exit();
    }
}
else{
    $_SESSION['error'] ='wait';
    header('Location: home.php');
    exit();}
}
else{
    $_SESSION['error'] ='deletepickup';
    header('Location: home.php');
    exit();
}
?>