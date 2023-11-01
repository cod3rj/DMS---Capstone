<?php
	include('config.php');

    if(isset($_POST['submit'])) {

		$title=$_POST['title'];
	    $notice=$_POST['notice'];
	    $date=$_POST['date'];
		
   
	    $sql="insert into notice (notice_title, notice,date) values ('$title', '$notice', '$date')";
	    $con->query($sql);
	    header("Location: notice.php?id=2");

	}

	
    
?>