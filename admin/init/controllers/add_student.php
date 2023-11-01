
<?php
	require_once "../model/class_model.php";
	require_once (__DIR__."/libs/phpqrcode/qrlib.php"); 
	require_once (__DIR__."/libs/phpqrcode/qrconfig.php");
	if(ISSET($_POST)){
		$conn = new class_model();

		$student_idno = trim($_POST['student_idno']);
	    //$qr_code = trim($_POST['qr_code']);
	     function rand_string( $length ) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		    return substr(str_shuffle($chars),0,$length);
	    }

		$targetPath = 'qrcode_images/';
		$file = $targetPath.$student_idno.'.png';
        $codeContents = ''.rand_string(8); 
        QRcode::png($codeContents, $file, QR_ECLEVEL_L, 5);
		
		$add = $conn->add_student($student_idno, $codeContents);
		if($add == TRUE){
		      echo '<div class="alert alert-success">Add Student Successfully!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';
		    

		  }else{
		    echo '<div class="alert alert-danger">Add Student Failed!</div><script> setTimeout(function() {  location.replace("manage_student.php"); }, 1000); </script>';

	
		}
	}

?>

