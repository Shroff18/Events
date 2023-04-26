<?php
include("connection.php");

$id = $_GET['id'];

$user_delete_data = "DELETE FROM contact WHERE id='$id'";

$user_data = mysqli_query($conn, $user_delete_data);

if ($user_data) {

    echo "<script>alert('your data deleted succesfully')</script>";
?>

    <meta http-equiv="refresh" content="0; url=http://localhost/final%20MINOR/admin_page.php">


<?php
} else {
    echo "no data delete";
}
?>