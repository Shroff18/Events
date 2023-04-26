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

<table border="3" style="text-align:center;">
    <tr>

        <th>NAME</th>
        <th>EMAIL</th>
        <th>GENDER</th>
        <th>PHONE</th>
        <th>ADDress</th>
        <th>EVENT_TYPE</th>
        <th>TEXT_AREA</th>
        <th>DATE_TIME</th>
    </tr>

    <?php
    if ($count_users != 0) {
        while ($user_data = mysqli_fetch_assoc($user_list)) {
            echo "
                     <tr>         
                        <td>$user_data[NAME]</td>            
                        <td>$user_data[EMAIL]</td>
                        <td>$user_data[GENDER]</td>           
                        <td>$user_data[PHONE]</td>           
                        <td>$user_data[ADDRESE]</td>             
                        <td>$user_data[EVENT_TYPE]</td>             
                        <td>$user_data[TEXT_AREA]</td>             
                        <td>$user_data[DATE_TIME]</td>             
                    </tr> 
                ";
        }
    }
    ?>
</table>
<!-- <script>
    function checkdelete(){
        return confirm ('are you sure to delete this data ');
    }
</script> -->