<?php
	include('config.php');

	$id=$_GET['complaint'];

	$title=$_POST['title'];
    $room_building=$_POST['room_building'];
	$notice=$_POST['notice'];
	$date=$_POST['date'];
	

	$sql="update complaint set n_type='$title', room_building = '$room_building', notice='$notice',date='$date' where notice_id='$id'";
	$con->query($sql);
	
	header("Location: complaint.php?id=3");
	
	
?>