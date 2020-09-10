<?php  
 $connect = mysqli_connect("34.80.172.111", "uep_user", "neutronion", "dbuep"); 
 $connect->query("SET NAMES 'utf8'"); 
 $query ="SELECT DISTINCT * FROM stud_masterlist_sample WHERE SchYear = '2020-2021'";  
 $result = mysqli_query($connect, $query);  


//  // check request
// if(isset($_POST['ID']) && isset($_POST['ID']) != "")
// {
// //     // include Database connection file
// //     include("db_connection.php");

//     // get user id
//     $user_id = $_POST['ID'];

//     // delete User
//     $query2 = "DELETE FROM user WHERE ID = '$user_id'";
//     if (!$result = mysqli_query($connect, $query2)) {
//         exit(mysqli_error($connect));
//     }
// }
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>UEP Subsystem MASTER LIST</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
           <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
           <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
           <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
            



      </head>  
      <body>  
           <br /><br />  
           <div class="container-fluid">
               <div class="info-box">
              
               </div>
               <!-- /.info-box -->
                <h3 align="center">MASTER LIST OF STUDENTS</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Sysnum</td>  
                                    <td>ID</td> 
                                    <td>Lastname</td>  
                                    <td>Firstname</td>   
                                    <td>Middlename</td>
                                    <td>Ename</td>
                                    <td>Course</td>  
                                    <td>Year</td>  
                                    <td>Major</td>  
                                    <td>SchoolYear</td>  
                                    <td>Status</td>  
                                    <td>Gender</td>
                                    <td>Civil Status</td>  
                                    <td>Birthdate</td>  
                                    <td>Age</td>  
                                    <td>Guardian</td>  
                                    <td>Address</td>  
                                    <td>Contact#</td>  
                                    <td>Relation</td>  
                                    <td>Percent</td>  
                                    <td>StudentType</td>  
                                    <td>Block</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  

                            //   if ($row["Status"]=='new'){
                            //        $Status = '<span class=" btn btn-primary">'.$row["Status"].'</span>';
                            //   }
                            //   elseif($row["Status"]=='active'){
                            //        $Status = '<span class=" btn btn-success">'.$row["Status"].'</span>';
                            //   }
                               echo '  
                               <tr>  
                                    <td>'.$row["SysNum"].'</td>  
                                    <td>'.$row["StudID"].'</td>  
                                    <td>'.$row["LName"].'</td>  
                                    <td>'.$row["FName"].'</td>  
                                    <td>'.$row["MName"].'</td>  
                                    <td>'.$row["EName"].'</td>  
                                    <td>'.$row["Course"].'</td> 
                                    <td>'.$row["YrLvl"].'</td> 
                                    <td>'.$row["Major"].'</td> 
                                    <td>'.$row["SchYear"].'</td> 
                                    <td>'.$row["Status"].'</td> 
                                    <td>'.$row["Gender"].'</td> 
                                    <td>'.$row["CivilStat"].'</td> 
                                    <td>'.$row["BirthDate"].'</td> 
                                    <td>'.$row["Age"].'</td> 
                                    <td>'.$row["GuardianName"].'</td> 
                                    <td>'.$row["GuardianAddress"].'</td> 
                                    <td>'.$row["GuardianTel"].'</td> 
                                    <td>'.$row["Relation"].'</td> 
                                    <td>'.$row["Percent"].'</td> 
                                    <td>'.$row["SType"].'</td> 
                                    <td>'.$row["Block"].'</td> 
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
         <!--edit  Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               ...
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
               </div>
          </div>
          </div>
          </div>
      </body>  
 </html>  
 <script>  
//  $(document).ready(function(){  
//       $('#employee_data').DataTable();  
//  });  
 </script>  

 <script>
//      $(document).ready(function() {
//     $('#employee_data').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );
 </script>

<script>

$(document).ready(function() {
    var table = $('#employee_data').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
 </script>