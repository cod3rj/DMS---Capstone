<!DOCTYPE html>
<html>

<link type="text/css" rel="stylesheet" href="../../../student/admin/Bootstrap/css/bootstrap.min.css">

<head>
</head>
<body>

<?php
$student_id = ($_GET['student_id']);

include('../../../student/config.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql = "SELECT *  FROM student where student_id = '$student_id'";
$result =  mysqli_query($con, $sql);
	
if ($result) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'] ;
  echo "<tr>";
  ?>

  <div class="form-group">    
  <div class="row">
      <div class="col-md-3" style="text-align:left;margin-top:7px;">
          <label class="control-label">Student Name</label>
      </div>
      <div class="col-md-9"> 
          <?php
         echo "<input type='text' class='form-control' name = name id=name  value ='$name' readonly>";
         ?>
      </div>
  </div>
</div>

<?php
}
mysqli_close($con);
?>
</body>
</html>