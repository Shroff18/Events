<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event";

    $conn = mysqli_connect($servername,$username,$password,$dbname,3306);

    if($conn){
        // echo "Connection success.";
      
    }
    else {
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
    <title>FORGOT_PASSWORD_FORM</title>
</head>
<body style="text-align:center; margin:200px" >
    <form action="forgot_password.php" method="POST">
        <input type="text" placeholder="ENTER YOUR EMAIL" name="EMAIL">  <br><br>
        <input type="submit" value="send link" name="send">
    </form>

</body>
</html>