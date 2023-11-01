<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "dormitory_db";
	$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if ($link) {
	}
	else {	
    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}
?>