<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event";

    $conn = mysqli_connect($servername,$username,$password,$dbname, 3333);

    if($conn){
        echo "Connection success.";
      
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
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">

        <div class="modal fade" id="create-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><u>Create an Admin account !!</u></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form>
                            <div class="form-group">
                                <i class="fas fa-user"></i> <label class="text">Full Name</label>
                                <input type="text" name="NAME" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-envolope"></i> <label class="text">Email</label>
                                <input type="email" name="EMAIL" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i> <label class="text"> creat password</label>
                                <input type="password" name="PASSWORD" class="form-control" required="required">
                            </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i> <label class="text"> confirm password</label>
                        <input type="password" name="CPASSWORD" class="form-control" required="required">
                    </div>
                    
                </div>
            </form>
            <div class="modal-footer justify-content-center">
                <a href="#"><input type="submit" class="btn " name="LOGIN"></a>
            </div>
        </div>

    </div> 
</div>
</form>
<?php

if($_POST['LOGIN']){

        $NAME = $_POST['NAME'];
        $EMAIL = $_POST['EMAIL'];
        $PASSWORD = $_POST['PASSWORD'];
        $CPASSWORD = $_POST['CPASSWORD'];
        // $HASH_PASSWORD = md5($PASSWORD,$CPASSWORD);
        $HASH_PASSWORD = md5($PASSWORD);
        $HASH_CPASSWORD = md5($CPASSWORD);

        $email_find="SELECT * FROM admin where EMAIL='$EMAIL'";
        $email_query = mysqli_query($conn,$email_find);
        $email_checked = mysqli_num_rows($email_query);

        if(!$email_checked>0){
            
            if($PASSWORD == $CPASSWORD){

                $user_query = "INSERT INTO admin(NAME,EMAIL,PASSWORD,CPASSWORD) VALUES('$NAME','$EMAIL','$HASH_PASSWORD','$HASH_CPASSWORD')";
                $user_data = mysqli_query($conn,$user_query);
        
                if($user_data){
                    echo "<script>alert('Data saved successfully')</script>";
                    ?>
                        <meta http-equiv="refresh" content="0;url=http://localhost/project/createadmin.php">
                    <?php 
                }
                else{
                    echo "please try again later";
                }   
            }
            else{
                  echo "<script>alert('email is already exit')</script>";
                       
            }
        }
        else{
                 echo "<script>alert('Dont match password')</script>";
        }
}
 ?>
</body>
</html>