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
echo $count_users . "----------->\n";

?>

<table border="3" style="text-align:center;">
    <tr>

        <th>ID</th>
        <th>NAME</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>ADDRESS</th>
        <th>EVENT_TYPE</th>
        <th>EVENT_DATE</th>
        <th>PEOPLES</th>
        <th>MESSAGE</th>
        <th>DATE_TIME</th>
        <th>OFFTION</th>
        
    </tr>

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
                        <td>$user_data[MESSAGE]</td>           
                        <td>$user_data[DATE_TIME]</td>  
                        
                        
                        <td><a href='update_userdata_new.php?id=$user_data[ID]'>UPDATE</a></td>    
                        <td><a href='delete_userdata_new.php?id=$user_data[ID]'>DELETE</a></td>    
                        
                        
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