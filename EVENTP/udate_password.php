
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <?php
        // require("conection.php");
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "event";
    
        $conn = mysqli_connect($servername,$username,$password,$dbname, 3306);
    
        if($conn){
            // echo "Connection success.";
          
        }
        else {
            echo "Connection failed.";
        }
        error_reporting(0);

        if(isset($_GET['EMAIL']) && isset($_GET['reset_token'])){
echo "ggggggggggggggggggggggggggggggggg";
             date_default_timezone_set('Asia/kilkata');
            //  echo "dddddddddddddddddddddddddddddddd";
             $date=date('y-m-d');

             $data_query="SELECT * FROM `admin` WHERE EMAIL='$_GET[EMAIL]' AND resettoken='$_GET[reset_token]' AND resettokenexpire='$date'";

             $result=mysqli_query($conn,$data_query);
             if($result){
                if(mysqli_num_rows($result)==1){

                    echo "
                        <form method='POST'>
                            <h1>create new password</h1>
                            <input type='password' placeholder='enter new password' name='PASSWORD'>
                            <input type='submit' name='update' value='update'>
                            <input type='hidden' name='EMAIL' value='$_GET[EMAIL]'>
                        </form>

                        ";

                }else{
                    echo "
                        <script>
                            alert('invalid or expired link');
                            window.location.href='login_form.php';
                        </script>
                        ";
                }
             }
             else{
                echo "
                    <script>
                        alert('server down try agin letter');
                        window.location.href='login_form.php';
                    </script>
                    ";
             }
        }
    ?>

    <?php
        if(isset($_POST['update'])){

            // echo 'clicked';
            $pass=md5($_POST['PASSWORD']);
            $update="UPDATE admin SET PASSWORD ='$pass',resettoken=NULL, resettokenexpire=NULL WHERE EMAIL='$_POST[EMAIL]'";

            if(mysqli_query($conn,$update)){
                echo  "
                <script>
                    alert('Password updated successfully');
                    window.location.href='login_form.php';
                </script>
                ";
            }
            else{
                echo "
                <script>
                    alert('invalid or expired link');
                    window.location.href='forgot_password_form.php';
                </script>
                ";
            }

        }
    ?>
</body>
</html>