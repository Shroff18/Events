<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

if ($conn) {
    // echo "Connection success.";

} else {
    echo "Connection failed.";
}
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($EMAIL, $reset_token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mr.premshroff19@gmail.com';                     //SMTP username
        $mail->Password   = 'tzhqxdobzkxioalp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mr.premshroff19@gmail.com', 'Prem Shroff');
        $mail->addAddress($EMAIL);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password resent link from event site';
        $mail->Body    = "we got a request from you to reset your password <br>
         click the link below:<br>
         <a href='http://localhost/final%20MINOR/EVENTP/udate_password.php?EMAIL=$EMAIL&reset_token=$reset_token '>Reset Pasword</a> ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_POST['send']) {

    $EMAIL = $_POST['EMAIL'];
    // $email_find="SELECT * FROM createf where EMAIL='$EMAIL'";
    // $email_query = mysqli_query($conn,$email_find);
    // $email_checked = mysqli_num_rows($email_query);

    // if(!$email_checked>0){

    $query = "SELECT * FROM admin WHERE EMAIL='$EMAIL'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {

            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("y-m-d");

            $update_query = "UPDATE `admin` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `EMAIL`='$EMAIL'";

            if (mysqli_query($conn, $update_query) && sendMail($EMAIL, $reset_token)) {

                echo "
                <script>
                    alert('Password reset link to sent to mail');
                    window.location.href='login_form.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('server down try agin letter');
                    window.location.href='login_form.php';
                </script>
                ";
            }
        } else {
            echo "
            <script>
                alert('invalid email');
                window.location.href='index.php';
            </script>
            ";
            // header('location:login_form.php');
        }
    } else {
        echo "
            <script>
                alert('not run');
            </script>
        ";
    }
}
