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
<section class="form_body" id="reg_form">
    <div class="form_container">

            <form action="#" method="POST" enctype="multipart/form-data">
            <h2>Get In Touch</h2>
        <div class="row100">
            <div class="form_col">
                <div class="inputbox">
                    <input type="text" name="NAME" required/>
                    <span class="text">FULL NAME</span>
                    <span class="line"></span>
                </div>
            </div>
            
            <div class="form_col">
                <div class="inputbox">
                    <input type="text" name="PHONE" required/>
                    <span class="text">Mobile</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="row100">
            <div class="form_col">
                <div class="inputbox">
                    <input type="email" name="EMAIL" required>
                    <span class="text">Email</span>
                    <span class="line"></span>
                </div>
            </div>
            
            <div class="form_col">
                <div class="inputbox">
                    <input type="text" name="ADDRESS" required>
                    <span class="text">City & State</span>
                    <span class="line"></span>
                </div>
            </div>        
        </div>
        
        <div class="row100">
            <div class="form_col">
                <div class="inputbox">
                    <input type="text" name="EVENT_TYPE" required>
                    <span class="text">Kind of Event</span>
                    <span class="line"></span>
                </div>
            </div>
            
            <div class="form_col">
                <div class="inputbox">
                    <input type="date" name="EVENT_DATE" placeholder="" required>
                    <span class="text">Event date</span>
                    <span class="line"></span>
                </div>
            </div>
            
            <div class="form_col">
                <div class="inputbox">
                    <input type="text" name="PEOPLES" required>
                    <span class="text">Number Of People</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        
        <div class="row100">
            <div class="form_col">
                <div class="inputbox textarea">

                <input type="text" name="MESSEGE">
                    <!-- <textarea required="required" name="MESSEGE"></textarea>
                    <span class="text">Type your Messege...</span>
                    <span class="line"></span> -->
                </div>
            </div>
        </div>
        <div class="row100">
            <div class="form_col">
                <input type="submit" name="login">
            </div>
        </div>
    </form>
    </div>
<?php

if($_POST['login']){
        
        // $NAME = $_POST['NMAE'];
        $NAME = $_POST['NAME'];
        $PHONE = $_POST['PHONE'];
        $EMAIL = $_POST['EMAIL'];
        $ADDRESS = $_POST['ADDRESS'];
        $EVENT_TYPE = $_POST['EVENT_TYPE'];
        $EVENT_DATE = $_POST['EVENT_DATE'];
        $PEOPLES = $_POST['PEOPLES'];
        $MESSEGE = $_POST['MESSEGE'];
        $DATE_TIME = $_POST['DATE_TIME'];
        
        $email_find="SELECT * FROM contact where EMAIL='$EMAIL'";
        $email_query = mysqli_query($conn,$email_find);
        $email_checked = mysqli_num_rows($email_query);

        if(!$email_checked>0){
            
            $user_query = "INSERT INTO contact(NAME,PHONE,EMAIL,ADDRESS,EVENT_TYPE,EVENT_DATE,PEOPLES,MESSEGE,DATE_TIME) VALUES('$NAME','$PHONE','$EMAIL','$ADDRESS','$ADDRESE','$EVENT_TYPE','$EVENT_DATE','$PEOPLES','$MESSEGE')";
            
            $user_data = mysqli_query($conn,$user_query);
            
            if($user_data){
                // echo "Data saved successfully.";
                echo "<script>alert('Data saved successfully')</script>";
                ?>
                    <meta http-equiv="refresh" content="0;url=http://localhost/minor/#reg_form">
                    <?php
                }
                else{
                    echo "<script>alert('try again later')</script>";
                }   
                }
        
        else{
            // echo "email is already exit";
            echo "<script>alert('email is already exit')</script>";
            ?>
            <meta http-equiv="refresh" content="0;url=http://localhost/minor/#reg_form">
            <?php
        }
    }
    else{
        echo "connection is secure";
    }
    ?>
</body>
</html>