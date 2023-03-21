<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="Users";

    mysql_connect($host,$user,$password)
    mysql_select_db($db)

    if(isset([UserID]){
        $uname=$_POST['username'];
        $password=$_POST['password'];
        $sql="select * from accounts where UserID='".$uname."' and Password='".$password."' limit 1"
        $result
    }
?>