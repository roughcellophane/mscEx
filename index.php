<!DOCTYPE html>
<html>
    <form action="login.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error'];?> </p>
            <?php } ?>
        <div class="login">
        <p>Username: </p><input type="field" class="form-control" name="UserID" placeholder="Username" >
        <p>Password: </p><input type="password" class="form-control" name="Password" placeholder="Password" >
        <input type="submit">
    </div>
</form>
</html>