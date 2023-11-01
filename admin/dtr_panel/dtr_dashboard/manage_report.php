<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Logs</title>
    
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
            <h1>Attendance Logs</h1>
          </div>
  </section>
  
  <div class="card">
<!--               <div class="card-header">
                 <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#modal-default">
                 <i class="fa fa-plus"></i> Add Attendance
                </button>
              </div> --><br>
              <div class = "form-inline" style="margin-left: 10px">
                <label>Date:</label>
                <input type = "text" class = "form-control" placeholder = "Start"  id = "date1" autocomplete="off" />
                <label>To</label>
                <input type = "text" class = "form-control" placeholder = "End"  id = "date2"  autocomplete="off"/>
                <button type = "button" class = "btn btn-primary" id = "btn_search"><i class = "fa fa-search"></i></button> <button type = "button" id = "reset" class = "btn btn-warning"><i class="fa fa-sync"></i></button>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>QR Code</th>
                    <th>Student ID No.</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Log Date</th>        
                  </tr>
                  </thead>
                  <tbody id = "load_data">
                 <?php 
                      $conn = new class_model();
                      $emp = $conn->fetchAll_studAttendance();
                  ?>
                <?php foreach ($emp as $row) { ?>
                  <tr>
                    <td><?= $row['qr_code']; ?></td>
                    <td><?= $row['student_idno']; ?></td>
                    <td><?= $row['TIMEIN']; ?></td>
                    <td><?= $row['TIMEOUT']; ?></td>
                    <td><?= htmlentities(date("M d, Y",strtotime($row['LOGDATE']))); ?></td>


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


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/jquery-ui.js"></script>
 <script type="text/javascript">
      $(document).ready(function(){
      $('#date1').datepicker();
      $('#date2').datepicker();
      $('#btn_search').on('click', function(){  
        if($('#date1').val() == "" || $('#date2').val() == ""){
          alert("Please enter Date 'From' and 'To' before submit");
        }else{
          $date1 = $('#date1').val();
          $date2 = $('#date2').val();
          $('#load_data').empty();
          $loader = $('<tr ><td colspan = "7"><center>Searching....</center></td></tr>');
          $loader.appendTo('#load_data');
          setTimeout(function(){
            $loader.remove();
            $.ajax({
              url: '../../init/controllers/attendance_report.php',
              type: 'POST',
              data: {
                date1: $date1,
                date2: $date2
              },
              success: function(res){
                $('#load_data').html(res);
              }
            });
          }, 1000);
        } 
      });
      
      $('#reset').on('click', function(){
        location.reload();
      });
    });
</script>
</script>
  <script>
  $( function() {
    $( "#date1" ).datepicker();
  } );
  </script>
  <script>
  $( function() {
    $( "#date2" ).datepicker();
  } );
  </script>

<script>
  $(function () {
    $("#example1").DataTable({
    });

  });

</script>
</body>
</html>
