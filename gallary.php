<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0"> -->
    <title>IMAGE_UPLOAD</title>
</head>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="image[]" multiple> <br><br>
        <input type="submit" name="submit" value="upload">
    </form>
</body>

</html>

<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $imageCount = count($_FILES['image']['name']);
    for ($i = 0; $i < $imageCount; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['temp_name'][$i];
        $targetPath = "./gallary_img/" . $imageName;
        echo "$targetPath";
        if (move_uploaded_file($imageTempName, $targetPath)) {
            $sql = "INSERT INTO gallary(img_src) VALUES('$imageName')";
            $result = mysqli_query($conn, $sql);
        }
    }
}













// if($_POST['submit'])
// {
// $image="uploadfile"

// print_r($_FILES["uploadfile"]); all desceibe by photo information
// $filename = $_FILES["uploadfile"]["name"];
// $tempname = $_FILES["uploadfile"]["tmp_name"];
// $folder = "gallary_img/" . $filename;
// echo $folder;
// move_uploaded_file($tempname, $folder);
// echo "<img src='$folder' height='100px' width='100px'> ";

// $user_query = "INSERT INTO upload_file VALUES ('$folder')";
// $user_data = mysqli_query($conn,$user_query);
// if ($user_data){

//     // echo "Data saved successfully."; 
//      echo "<script>alert('your data upadeted succecfully')</script>";
// }
// else{
//     echo "try again";
// }
// // $img_show = move_uploaded_file($tempname,$folder);
// // if(!$img_show){

//     // }
//     // echo "<img src='$folder' height='100px' width='100px'>";

// }
//     
?>

<!-- <meta http-equiv ="refresh" content ="0; url=http://localhost/project/image_upload.php"> -->