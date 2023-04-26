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

$data = "SELECT * FROM contact";
$user_list = mysqli_query($conn, $data);
$count_users = mysqli_num_rows($user_list);
// echo $count_users . "----------->\n";

?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Prem-Shroff</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>admin panel</title>

    <style>
        .container {
            max-width: 1220px !important;
        }

        .nav-style {
            background-color: rgba(0, 0, 0, 0.8);
            height: 70px;
            width: 100%;
            overflow-x: hidden;

        }

        .table-style {
            position: relative;

        }

        .HHover:hover {
            color: #ff4d29;
            cursor: pointer;
        }

        .fa-color {
            color: black;
        }

    </style>


</head>

<body>


    <nav class="navbar navbar-dark justify-content-center fs-3 mb-5 nav-style">
        <h2 style="color:#ff4d29;">A<span style="color:white;">DMIN</span> PANEL</h2>
    </nav>

    <div class="container">
        <a href="http://localhost/final%20MINOR/index.php#reg_form" class="btn btn-dark mb-3 HHover">Add new</a>
        <a href="#" class="btn btn-dark mb-3 HHover">Total Entries: <?php echo $count_users ?></a>

        <table class="table  text-center table-style">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="HHover">ID</th>
                    <th scope="col" class="HHover">NAME</th>
                    <th scope="col" class="HHover">PHONE</th>
                    <th scope="col" class="HHover">EMAIL</th>
                    <th scope="col" class="HHover">ADDRESS</th>
                    <th scope="col" class="HHover">EVENT_TYPE</th>
                    <th scope="col" class="HHover">EVENT_DATE</th>
                    <th scope="col" class="HHover">PEOPLES</th>
                    <th scope="col" class="HHover">MESSEGE</th>
                    <th scope="col" class="HHover">DATE_TIME</th>
                    <th scope="col" class="HHover">EDIT</th>
                    <th scope="col" class="HHover">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($count_users != 0) {
                    while ($user_data = mysqli_fetch_assoc($user_list)) {
                        echo "
                     <tr>         
                         <td>$user_data[ID]</td>            
                        <td>$user_data[NAME]</td>            
                        <td>$user_data[PHONE]</td>           
                        <td>$user_data[EMAIL]</td>
                        <td>$user_data[ADDRESS]</td>             
                        <td>$user_data[EVENT_TYPE]</td>             
                        <td>$user_data[EVENT_DATE]</td>             
                        <td>$user_data[PEOPLES]</td>           
                        <td>$user_data[MESSEGE]</td>           
                        <td>$user_data[DATE_TIME]</td>  
                        
                          <td><a href='update_userdata_new.php?id=$user_data[ID]' class='link-hover'><i class='fa-solid fa-pen-to-square fs-5 me-3 HHover fa-color' ></i></a></td>

                          <td><a href='delete_userdata_new.php?id=$user_data[ID]' class='link-hover'><i class='fa-solid fa-trash  fs-5 HHover fa-color' ></i></a>
</td>  
                        
                        
                    </tr> 
                ";
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="http://localhost/final%20MINOR/index.php" class="btn btn-dark mb-3 mt-3 HHover">Log out</a>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





</body>

</html>