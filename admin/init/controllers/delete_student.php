<?php
  require_once "../model/class_model.php";

	if(ISSET($_POST)){
		$conn = new class_model();

	    $student_id = trim($_POST['student_id']);

		$del = $conn->delete_student($student_id);
		if($del == TRUE){
		      echo '<div class="alert alert-success">Delete Student Successfully!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';
		    

		  }else{
		    echo '<div class="alert alert-danger">Delete Student Failed!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';

	
		}
	}

?>

