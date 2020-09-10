<?php
 // check request
 if(isset($_POST['ID']) && isset($_POST['ID']) != "")
 {
 //     // include Database connection file
 //     include("db_connection.php");
 
     // get user id
     $user_id = $_POST['ID'];
 
     // delete User
     $query2 = "DELETE FROM user WHERE ID = '$user_id'";
     if (!$result = mysqli_query($connect, $query2)) {
         exit(mysqli_error($connect));
     }
     
 }

?>