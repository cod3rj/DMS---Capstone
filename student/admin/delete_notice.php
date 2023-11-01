<?php
	include('config.php');

	$id = $_GET['notice'];
	
	$sql3="delete from notice where notice_id='$id'";
	$con->query($sql3);
	

	header("Location: notice.php?id=4");
?>