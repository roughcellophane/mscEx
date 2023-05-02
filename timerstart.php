<?php
    ini_set('max_execution_time', '0');
    include "db_conn.php";
        $timerprompt = "SELECT * FROM Timers LIMIT 1";
        $result = mysqli_query($conn,$timerprompt);
        $checker = mysqli_fetch_assoc($result);
        if(isset($checker)){
        $reference = $checker['UserID'];
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $countprompt = "SELECT COUNT(*) FROM Timers";
        $countresult = mysqli_query($conn,$countprompt);
        $counter=mysqli_num_rows($countresult);
        while($counter>0 && isset($checker)){
            if(!isset($row['UserID']) && isset($checker)){
                $timerprompt = "SELECT * FROM Timers LIMIT 1";
                $result = mysqli_query($conn,$timerprompt);
                $checker = mysqli_fetch_assoc($result);
                $reference = $checker['UserID'];
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $reference = $checker['UserID'];
                $maxtime = $checker['InitTime'];
                $currtime = 0;
                $updatetimer = "UPDATE Timers SET TimeLeft = $currtime WHERE UserID = '$reference'";
                while($currtime<$maxtime){
                    sleep(1);
                    $currtime = $currtime + 1;
                    if(mysqli_query($conn,$updatetimer)){$updatetimer = "UPDATE Timers SET TimeLeft = $currtime WHERE UserID = '$reference'";
                    };
                }
                $prompt3= "DELETE FROM Timers
                           WHERE UserID = '$reference'";
                $prompt4 = "UPDATE Orders 
                            SET CurrentStatus = 'READY FOR PICKUP'
                            WHERE UserID = '$reference'";
                $ms = floor(microtime(true));
                $prompt5 = "UPDATE TStamps 
                            SET OrderUp = '$ms' 
                            WHERE UserID = '$reference'";
                mysqli_query($conn,$prompt3);
                mysqli_query($conn,$prompt4);
                mysqli_query($conn,$prompt5);
                $checker = mysqli_fetch_assoc($result);
                $counter=mysqli_num_rows($countresult);
            }
        }
    }
    else{
        header("Location: home.php");
    }
    header("Location: home.php");
    exit();
    ?>