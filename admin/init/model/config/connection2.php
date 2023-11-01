<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = new mysqli("sql306.epizy.com", "epiz_33104467", "6kH08GZxCQ6tMp", "epiz_33104467_dormitory_db");
	if($conn->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}

?>