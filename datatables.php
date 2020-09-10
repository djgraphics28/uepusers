<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" >
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" >
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" >

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    </head>
    <body>
    <table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Course</th>
            <th>Year</th>
        </tr>
    </thead>
   <tbody>
   <tr>
        <td>1</td>
        <td>DARZ</td>
        <td>BSIT</td>
        <td>1st year</td>
    </tr>
    <tr>
        <td>1</td>
        <td>DARZ</td>
        <td>BSIT</td>
        <td>1st year</td>
    </tr>
    <tr>
        <td>1</td>
        <td>DARZ</td>
        <td>BSIT</td>
        <td>1st year</td>
    </tr>
   </tbody>
    
    </table>  

    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        } );
    } );
    </script> 
    </body>
</html>