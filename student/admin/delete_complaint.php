<?php
	include('config.php');

	$id = $_GET['complaint'];
	
	$sql3="delete from complaint where notice_id='$id'";
	$con->query($sql3);
	

	header("Location: complaint.php?id=4");
?>