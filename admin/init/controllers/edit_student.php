<?php
  require_once "../model/class_model.php";

	if(ISSET($_POST)){
		$conn = new class_model();

		$student_idno = trim($_POST['student_idno']);
	    $student_id = trim($_POST['student_id']);

		$edit = $conn->edit_student($student_idno,  $student_id);
		if($edit == TRUE){
		      echo '<div class="alert alert-success">Update Student Successfully!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';
		    

		  }else{
		    echo '<div class="alert alert-danger">Update Student Failed!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';

	
		}
	}

?>

