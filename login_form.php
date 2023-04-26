<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

if ($conn) {
    echo "Connection success.";
} else {
    echo "Connection failed.";
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loggin</title>
</head>

<body>
    <div class="modal fade" id="mymodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><u>Admin Signin !!</u></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <form method="POST" autocomplete="on">
                        <div class="form-group">
                            <i class="fas fa-user"></i> <label class="text">Email</label>
                            <input type="text" name="username" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock"></i> <label class="text">password</label>
                            <input type="password" name="pass" class="form-control" required="required">
                        </div>

                </div>
                <div class="forgot">
                    <p><a href="#" class="forget-pass">forgot your password ?</a></p>
                    <p class="create-acc">Don't have any account
                        <label for="show-Sigin-form" class="user-icon search-user" data-target="#create-modal" data-toggle="modal" data-dismiss="modal">create one<i class="fas fa-user"></i></label></a>
                    </p>
                </div>


                <div class="modal-footer justify-content-center">
                    <a href="#"><input type="submit" value="Login" name="LOGINE" class="btn"></a>
                </div>
                </form>
            </div>

        </div>
    </div>
    <?php

    if ($_POST['LOGINE']) {

        $NAME = $_POST['username'];
        $PASSWORD = $_POST['pass'];
        // $HASH_PASSWORD = md5($PASSWORD);

        $qurey = "SELECT * FROM admin WHERE EMAIL='$NAME' && PASSWORD='$PASSWORD'";

        $data = mysqli_query($conn, $qurey);
        $total = mysqli_num_rows($data);
        echo $total;
        echo $HASH_PASSWORD;

        // if ($total == 1) {
        //     // header('location:user_list.php');
        //     echo "<script>alert('Data saved successfully')</script>";
        //     // echo "login done";
        // } else {
        //     echo "login failed";
        // }
    }
    ?>
</body>

</html>