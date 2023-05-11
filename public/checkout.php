<?php 
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['UserID']) && $_SESSION['Password']){
        include "checkout system.php"?>
<!DOCTYPE html>
<html>
    <table name="checkout">
        <tr>
            <th></th>
            <th></th>

        </table>
</html>
<?php 
}
else{header("Location:index.php");}
?>