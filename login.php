<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    session_start();
    include "db_conn.php";
    if(isset($_POST['UserID']) && ($_POST['Password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $UserID = validate($_POST['UserID']);
        $Password = validate($_POST['Password']);
    }
    if (empty($UserID)) {
        echo "<h2>Please fill out all of the forms.</h2>";
        header('Location: index.php?error=Please fill out all of the forms.');
        exit();
    }
    
    else if (empty($Password)) {
        echo "<h2>Please fill out all of the forms.</h2>";
        header('Location: index.php?error=Please fill out all of the forms.');
        exit();
    }



    $sql = "SELECT * FROM Users WHERE UserID = '$UserID' AND Pass = '$Password'";

    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['UserID'] === $UserID && $row['Pass'] === $Password){
            echo "Logged in successfully!";
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['LName'] = $row['LName'];
            $_SESSION['FName'] = $row['FName'];
            $_SESSION['Password'] = $row['Pass'];
            $_SESSION['Access'] = $row['Access'];
            header("Location: home.php");
            exit();
        }
        else{
            echo "<h2>Incorrect user ID or password. Please try again.</h2>";
            header('Location: index.php?error=Incorrect UserID or Password.');
            exit();
        }
    }
    else{
        echo "<h2>Incorrect user ID or password. Please try again.</h2>";
        header('Location: index.php?error=Incorrect UserID or Password.');
        exit();
    }
?>