<?php
    session_start();
    $ms = floor(microtime(true) * 1000);
    require('db_conn.php');
    $id = $_SESSION['UserID'];
    $command = "UPDATE Orders 
                SET CurrentStatus = 'CONFIRMED' 
                WHERE UserID='$id'
                AND CurrentStatus = 'PLEASE CONFIRM'";
    $stamp1=$ms;
    if (mysqli_query($conn,$command)){
        $ms = floor(microtime(true));
        $stamp1=$ms;
        $ts1 = "INSERT INTO TStamps(UserID, OrderSent, OrderReceived, OrderUp)
                VALUES
                    ('$id','$stamp1','NOT RECEIVED','NOT DONE YET')";
        if(mysqli_query($conn,$ts1)){
        echo "<h2>Confirmed Orders!</h2>";
        $i = 0;
        while($i==0){
            $ask = "SELECT * FROM TStamps WHERE UserID = '$id' AND OrderSent = '$stamp1'";
            $ask2= mysqli_query($conn,$ask);
            $prompt = mysqli_fetch_assoc($ask2);
            $cs = $prompt['OrderSent'];
            $ms = floor(microtime(true));
            $stamp2= $ms;
            if(isset($cs)){
                $i = 1;
                $ts2 =  "UPDATE TStamps 
                         SET OrderReceived = '$stamp2' 
                         WHERE UserID = '$id'
                         AND OrderSent = '$stamp1'";
                mysqli_query($conn,$ts2);
                }
            }
        $timesum = "SELECT SUM(CurrentTime) AS totaltime FROM Orders WHERE UserID = '$id'";
        $timesumquery = mysqli_query($conn,$timesum);
        $fetch= mysqli_fetch_assoc($timesumquery);
        $sum = $fetch['totaltime'];
        $timer = "INSERT INTO Timers (UserID, TimeLeft, InitTime, StartTime)
                  VALUES ('$id','$sum','$sum','$stamp2')";
        mysqli_query($conn,$timer);
        }
    }
    else {
        echo "<h2>Order failed to be confirmed.</h2>";
    };
    header("Location: home.php")
    ?>