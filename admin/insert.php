<?php 
//error_reporting(0);
//session_start();
include 'connection/db_connect.php';

$server = "localhost";
$username="root";
$password="";
$dbname="qrcodedb";

if(isset($_POST['text'])){

	    // $voice = new com("SAPI.SpVoice");
	    // $message = "Hi".$emp. "Your Time In has been successfully added!. Thank you";

    	date_default_timezone_set("asia/manila");
		$emp = $_POST['text'];
		$date = date('Y-m-d');
		//$time = date('h:i A');
	    $time =  date('h:i:A', strtotime("+0 HOURS"));

		
		$sql = "SELECT * FROM attendance WHERE student_id = '$emp' AND LOGDATE = '$date' AND STATUS = '0'";
		$query = $conn->query($sql);
		
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$emp;
		}
		else{
				$row = $query->fetch_assoc();
				$id = $row['STUDENTID'];
				$sql ="SELECT * FROM attendance WHERE student_id='$emp' AND LOGDATE='$date' AND STATUS='0'";
				$query=$conn->query($sql);
				
				if($query->num_rows>0)
				{
				$sql = "UPDATE attendance SET TIMEOUT='$time', STATUS='1' WHERE student_id='$emp' AND LOGDATE='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Successfuly Time Out: '.$row['FIRSTNAME'].' '.$row['LASTNAME'];
			}
			else
			{
					$sql = "INSERT INTO attendance(STUDENTID,TIMEIN,LOGDATE,STATUS) VALUES('$studentID','$time','$date','0')";
					if($conn->query($sql) ===TRUE)
					{
					 $_SESSION['success'] = 'Successfuly Time In: '.$row['FIRSTNAME'].' '.$row['LASTNAME'];
			 }
			 else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
	//header('Refresh: 1;url=index.php');
	header("location: index.php");
	$conn->close();

?>