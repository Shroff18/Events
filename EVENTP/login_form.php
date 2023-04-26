<?php
error_reporting (0);
include("conection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN_FORM</title>
</head>
<body style="text-align:center; margin:200px">
    <div>
        <form action="#" method="POST" autocomplete="off">
        <input type="text" placeholder="ENTER YOUR NAME" name="username"><br><br>
        <!-- <input type="email" placeholder="ENTER YOUR EMAIL" name="EMAIL"><br><br> -->

        <input type="password" placeholder="ENTER YOUR PASSWORD" name="pass"><br><br>

        <DIV><a href="http://localhost/project/EVENTP/forgot_password_form.php">fogot password</a></DIV><br><br>

        <div><a href="admin_create_form.php">sign up</a></div><br><br>

        <input type="submit" name="LOGIN">
        </form>
    </div>
</body>
<?php

    if($_POST['LOGIN']){

            $NAME = $_POST['username'];
            $PASSWORD = $_POST['pass'];
            $HASH_PASSWORD = md5($PASSWORD);

            $qurey= "SELECT * FROM admin WHERE EMAIL='$NAME' && PASSWORD='$HASH_PASSWORD'";

            $data = mysqli_query($conn,$qurey);
            $total = mysqli_num_rows($data);

            if($total==1){
                header('location:user_list.php');
                // echo "login done";
            }
            else{
                echo "login failed";
            }

    }
?>
</html>