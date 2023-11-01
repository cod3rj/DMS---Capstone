<?php
	include('config.php');

	$id=$_GET['notice'];

	$title=$_POST['title'];
	$notice=$_POST['notice'];
	$date=$_POST['date'];
	

	$sql="update notice set notice_title='$title', notice='$notice',date='$date' where notice_id='$id'";
	$con->query($sql);
	
	header("Location: notice.php?id=3");
	
	
?>