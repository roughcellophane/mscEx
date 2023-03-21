<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="Users";

    mysql_connect($host,$user,$password);
    mysql_select_db($db);

    if(isset($_POST[UserID])){
        $uname=$_POST['username'];
        $password=$_POST['password'];
        $sql="select * from accounts where UserID='".$uname."' and Password='".$password."' limit 1";
        $result=mysql_query($sql);
        if mysql_num_rows($result)==1{
            echo "Log in Success!";
            exit();
        }
        else{
            echo "Pakshit ka talaga alam mo yun";
            exit();
        }
    }
?>