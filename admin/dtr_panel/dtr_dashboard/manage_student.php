<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student QR</title>
    
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php
 
  include('../../init/model/class_model.php');
  
?>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>
<body>


    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
  
        <section class="content-header">
      <div class="container-fluid">
            <h1>Manage Students QR</h1>
          </div>
  </section>

          <div class="card">
            <div class="card-header">
               <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#modal-default">
               <i class="fa fa-plus"></i> Add Students QR
              </button>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>QR Image</th>
                  <th>Student ID No.</th>
                  <th>QR Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
                    $conn = new class_model();
                    $emp = $conn->fetchAll_students();
                ?>
              <?php foreach ($emp as $row) { ?>
                <tr>
                  <td><center><img src="../../init/controllers/qrcode_images/<?= $row['student_idno']; ?>.png" width="50px" height="50px"></center></td>
                  <td><?= $row['student_idno']; ?></td>
                  <td><?= $row['qr_code']; ?></td>
                  <td class="align-right">
                      <i class="fa fa-edit edit_E" style="color: blue" data-toggle="modal" data-target="#edit-student" data-id="<?= htmlentities($row['student_id']); ?>"></i> | <i class="fa fa-trash-alt delete_E" style="color: red" data-toggle="modal" data-target="#delete-student" data-del="<?= htmlentities($row['student_id']); ?>"></i>
                  </td>
                </tr>
             <?php }?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'footer/footer.php';?>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<?php include 'modal/addstudent_modal.php';?>
<?php include 'modal/editstudent_modal.php';?>
<?php include 'modal/deletestudent_modal.php';?>
<script>
     $(document).ready(function() {   
         load_data();    
         var count = 1; 
         function load_data() {
             $(document).on('click', '.edit_E', function() {
                  var student_id = $(this).data("id");
                  console.log(student_id);
                    get_Id(student_id); //argument    
           
             });
          }

           function get_Id(student_id) {
                $.ajax({
                    type: 'POST',
                    url: 'fetch_row/student_row.php',
                    data: {
                        student_id: student_id
                    },
                    dataType: 'json',
                    success: function(response) {
                    $('#edit_studentid').val(response.student_id);
                    $('#edit_studentidno').val(response.student_idno);
                 }
              });
           }
     
     });
      
</script>
<script>
     $(document).ready(function() {   
         load_data();    
         var count = 1; 
         function load_data() {
             $(document).on('click', '.delete_E', function() {
                  var student_id = $(this).data("del");
                  console.log(student_id);
                    get_delId(student_id); //argument    
           
             });
          }

           function get_delId(student_id) {
                $.ajax({
                    type: 'POST',
                    url: 'fetch_row/student_row.php',
                    data: {
                        student_id: student_id
                    },
                    dataType: 'json',
                    success: function(response2) {
                    $('#delete_studentid').val(response2.student_id);
                    $('#delete_fullname').val(response2.student_idno);
    
                 }
              });
           }
     
     });
      
</script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
$(function () {
  $("#example1").DataTable({
  });

});
</script>
</body>
</html>