<?php
include("connection.php");

$id = $_GET['id'];
// echo $id . "----------->\n";
$query = "SELECT * FROM contact where id='$id'";
$user_list = mysqli_query($conn, $query);
$count_users = mysqli_num_rows($user_list);
$user_data = mysqli_fetch_assoc($user_list);

// echo $user_data."=========>";
// update form data
?>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

</body>

<section class="form_body" id="reg_form">
    <div class="form_container">

        <form action="#" method="POST" enctype="multipart/form-data">
            <h2 id="contactus">update form</h2>
            <div class="row100">
                <div class="form_col">
                    <div class="inputbox">
                        <input type="text" name="NAME" value="<?php echo $user_data['NAME']; ?>" required />
                        <span class="text">FULL NAME</span>
                        <span class="line"></span>
                    </div>
                </div>

                <div class="form_col">
                    <div class="inputbox">
                        <input type="text" name="PHONE" value="<?php echo $user_data['PHONE']; ?>" required />
                        <span class="text">Mobile</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="form_col">
                    <div class="inputbox">
                        <input type="email" name="EMAIL" value="<?php echo $user_data['EMAIL']; ?>" required>
                        <span class="text">Email</span>
                        <span class="line"></span>
                    </div>
                </div>

                <div class="form_col">
                    <div class="inputbox">
                        <input type="text" name="ADDRESS" value="<?php echo $user_data['ADDRESS']; ?>" required>
                        <span class="text">City & State</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>

            <div class="row100">
                <div class="form_col">
                    <div class="inputbox">
                        <input type="text" name="EVENT_TYPE" value="<?php echo $user_data['EVENT_TYPE']; ?>" required>
                        <span class="text">Kind of Event</span>
                        <span class="line"></span>
                    </div>
                </div>

                <div class="form_col">
                    <div class="inputbox">
                        <input type="date" name="EVENT_DATE" placeholder=" " value="<?php echo $user_data['EVENT_DATE']; ?>" required>
                        <span class="text">Event date</span>
                        <span class="line"></span>
                    </div>
                </div>

                <div class="form_col">
                    <div class="inputbox">
                        <input type="text" name="PEOPLES" value="<?php echo $user_data['PEOPLES']; ?>" required>
                        <span class="text">Number Of People</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>

            <div class="row100">
                <div class="form_col">
                    <div class="inputbox textarea">
                        <textarea required="required" name="MESSEGE" value="<?php echo $user_data['MESSEGE']; ?>"></textarea>
                        <span class="text">Type your Messege...</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="form_col">
                    <input type="submit" name="UPDATE">
                </div>
            </div>
        </form>
    </div>

</section>

</html>
<?php

if ($_POST['UPDATE']) {

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


    $user_updated_data = "UPDATE contact SET 
    NAME = '$NAME',
    PHONE = '$PHONE',
    EMAIL = '$EMAIL',
    ADDRESS = '$ADDRESS',
    EVENT_TYPE = '$EVENT_TYPE',
    EVENT_DATE = '$EVENT_DATE',
    PEOPLES = '$PEOPLES',
    MESSEGE = '$MESSEGE',
    DATE_TIME = '$DATE_TIME' WHERE id='$id'";

    $user_data = mysqli_query($conn, $user_updated_data);

    if ($user_data) {

        echo "<script>alert('your data upadeted succecfully')</script>";
?>
        <!-- after update redirect the user list page  -->
        <meta http-equiv="refresh" content="0; url=http://localhost/final%20MINOR/admin_page.php">

<?php
    } else {
        echo "Something is wrong.";
    }
} else {
    echo "connection is secure";
}
?>