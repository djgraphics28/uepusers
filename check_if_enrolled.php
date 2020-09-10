<?php  
 $connect = mysqli_connect("34.80.172.111", "uep_user", "neutronion", "dbuep");  
 $connect->query("SET NAMES 'utf8'");
 $query ="SELECT DISTINCT  oerl.StudID, ostu.LName, ostu.FName,ostu.MName, ostu.EName, ostu.Course  FROM oerl
   INNER JOIN ostu ON oerl.StudID = ostu.StudID  WHERE oerl.SchoolYr ='2020-2021' and oerl.Semester ='1st semester'";  
 $result = mysqli_query($connect, $query);  


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

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>UEP Subsystem</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">
              
               <!-- /.info-box -->
                <h3 align="center">University of Eastern Pangasinan List of Enrollees</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>   
                                    <td>Lastname</td>  
                                    <td>Firstname</td>   
                                    <td>Middlename</td>
                                    <td>Ename</td>
                                    <td>Course</td>  
                                    <td>Status</td> 
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["StudID"].'</td>  
                                    <td>'.$row["LName"].'</td>  
                                    <td>'.$row["FName"].'</td>  
                                    <td>'.$row["MName"].'</td>  
                                    <td>'.$row["EName"].'</td>  
                                    <td>'.$row["Course"].'</td>
                                    <td><button class="btn btn-success">ENROLLED</button></td> 
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  

 <script>
    function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: ID
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
 
 </script>