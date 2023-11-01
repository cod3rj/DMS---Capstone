<!DOCTYPE html>
<html>

<link type="text/css" rel="stylesheet" href="../../../student/admin/Bootstrap/css/bootstrap.min.css">

<head>
</head>
<body>

<?php
$roomName = ($_GET['roomName']);

include('../../../student/config.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql = "SELECT *  FROM room_list where roomName = '$roomName'";
$result =  mysqli_query($con, $sql);
	
if ($result) {
    $row = mysqli_fetch_array($result);
    $buildingName = $row['buildingName'] ;
    $roomType = $row['roomType'] ;
  echo "<tr>";
  ?>

  <div class="form-group">    
  <div class="row">
      <div class="col-md-3" style="text-align:left;margin-top:7px;">
          <label class="control-label">Building</label>
      </div>
      <div class="col-md-9"> 
          <?php
         echo "<input type='text' class='form-control' name = buildingName id=buildingName  value ='$buildingName' readonly>";
         ?>
      </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
      <div class="col-md-3" style="text-align:left;margin-top:7px;">
          <label class="control-label">Room Type</label>
      </div>
      <div class="col-md-9">
          <?php
          echo "<input type='text' class='form-control' name = roomType id=roomType  value ='$roomType' readonly>";
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