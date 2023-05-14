<!DOCTYPE html>
<head>
    <link rel = "icon" href = "https://media.discordapp.net/attachments/1021975352945414186/1085188387692089474/MakSci_Express_Logo_Version_14_-_Symbol_1.1.png" type = "image/x-icon">
    <meta charset="UTF-8">
    <title>MakSci Express</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
</head>
<script type="text/javascript">
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "bi-eye-slash" );
            $('#show_hide_password i').removeClass( "bi-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "bi-eye-slash" );
            $('#show_hide_password i').addClass( "bi-eye" );
        }
    });
});
</script>
<body>
<main>
<div class="loginDiv">
    <div class="infoContainer">
        <img class="loginlogo" src="https://media.discordapp.net/attachments/1021975352945414186/1085188387692089474/MakSci_Express_Logo_Version_14_-_Symbol_1.1.png" draggable="false">
            <div id="infoHeader">Convenient and efficient</div>
            <div id="infoDesc">Experience a brand new canteen in front of your screen</div>
    </div>
    <div class="loginContainer">
    <form action="login.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error'];?> </p>
            <?php } ?>
        <div class="login">
            <input type="field" class="form-control user-box" id="UserID" name="UserID" placeholder="Username" required>
            <div class="form-group">
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control user-box2" id="Password" name="Password" placeholder="Password" required>
                    <div class="input-group-addon">
                        <a href=""><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        <input type="submit" id="submitButton">
    </div>
    </div>
</div>
</form>
</html>