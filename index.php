 <?php  
 $connect = mysqli_connect("34.80.172.111", "uep_user", "neutronion", "dbuep"); 
//  $connect = mysqli_connect("192.168.0.102", "root", "neutronion", "dbuep"); 

 $connect->query("SET NAMES 'utf8'"); 
 $query ="SELECT user.ID, user.UserName, user.UserLvl, user.created_at, user.updated_at, user.Status, user.EmailAdd, ostu.LName, ostu.FName, ostu.MName, ostu.EName  FROM user  INNER JOIN ostu ON user.UserName = ostu.StudID ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query);  



 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>UEP Subsystem</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
               <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
               <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
               <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
               <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   -->
               <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
               <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
               <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
               <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
               <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
               <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
               <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
               <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>



      </head>  
      <body>  
           <br /><br />  
           <div class="container-fluid">
               <div class="info-box">
              
               </div>
               <!-- /.info-box -->
                <h3 align="center">University of Eastern Pangasinan Registered Users</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>  
                                    <td>UserName</td> 
                                    <td>Lastname</td>  
                                    <td>Firstname</td>   
                                    <td>Middlename</td>
                                    <td>Ename</td>
                                    <!-- <td>UserLvl</td>   -->
                                    <td>Created_at</td>  
                                    <td>Updated_at</td>  
                                    <td>Status</td>  
                                    <td>Email Add</td>
                                    <td>DELETE</td>  
                                    <td>EDIT</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  

                              if ($row["Status"]=='new'){
                                   $Status = '<span class=" btn btn-primary">'.$row["Status"].'</span>';
                              }
                              elseif($row["Status"]=='active'){
                                   $Status = '<span class=" btn btn-success">'.$row["Status"].'</span>';
                              }
                               echo '  
                               <tr>  
                                    <td>'.$row["ID"].'</td>  
                                    <td>'.$row["UserName"].'</td>  
                                    <td>'.$row["LName"].'</td>  
                                    <td>'.$row["FName"].'</td>  
                                    <td>'.$row["MName"].'</td>  
                                    <td>'.$row["EName"].'</td>  
                                    <td>'.$row["created_at"].'</td> 
                                    <td>'.$row["updated_at"].'</td> 
                                    <td>'.$Status.'</td>  
                                    <td>'.$row["EmailAdd"].'</td> 
                                    <td><button onclick="DeleteUser('.$row['ID'].')" class="btn btn-danger">Delete</button></td> 
                                    <td><button onclick="editUser('.$row['ID'].')" class="btn btn-info" data-target="#editModal">EDIT</button></td> 
                                    
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
     $(document).ready(function() {
    $('#employee_data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 </script>

<script>
  $('#editModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
 <script>
    function DeleteUser(id) {
     alert(id);
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id;
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
 
 </script>