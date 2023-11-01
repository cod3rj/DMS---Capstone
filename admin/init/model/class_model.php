
<?php

	require 'config/connection.php';

	class class_model{

		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $dbname = db_name;
		public $conn;
		public $error;
 
		public function __construct(){
			$this->connect();
		}
 
		private function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->conn){
				$this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;
				return false;
			}
		}

		public function login_admin($username, $password){
			$stmt = $this->conn->prepare("SELECT * FROM `tbl_admin` WHERE `username` = ? AND `password` = ?") or die($this->conn->error);
			$stmt->bind_param("ss", $username, $password);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$valid = $result->num_rows;
				$fetch = $result->fetch_array();
				return array(
					'admin_id'=> htmlentities($fetch['admin_id']),
					'count'=>$valid
				);
			}
		}
 
		public function admin_account($admin_id){
			$stmt = $this->conn->prepare("SELECT * FROM `tbl_admin` WHERE `admin_id` = ?") or die($this->conn->error);
		    $stmt->bind_param("i", $admin_id);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				return array(
					'full_name'=> $fetch['full_name']

				);
			}	
		}


		public function add_student($student_idno, $codeContents){
	       $stmt = $this->conn->prepare("INSERT INTO `tbl_students` (`student_idno`, `qr_code`) VALUES(?, ?)") or die($this->conn->error);
			$stmt->bind_param("ss", $student_idno, $codeContents);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

	    public function fetchAll_students(){ 
            $sql = "SELECT * FROM  tbl_students";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

        public function edit_student($student_idno, $student_id){

			$sql = "UPDATE `tbl_students` SET  `student_idno` = ?, where student_id = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ii", $student_idno, $student_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_student($student_id){
           error_reporting(0);
		   $sql="SELECT student_idno FROM tbl_students WHERE student_id = ?";
			$stmt2=$this->conn->prepare($sql);
			$stmt2->bind_param("i", $student_id);
			$stmt2->execute();
			$result2=$stmt2->get_result();
			$row=$result2->fetch_assoc();
			$imagepath = $_SERVER['DOCUMENT_ROOT']."../qrcode_images/".$row['student_idno'].'.png';//delete the image inside a folder path
			unlink($imagepath);

				$sql = "DELETE FROM tbl_students WHERE student_id = ?";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			public function fetchAll_attendance(){ 
				$sql = "SELECT * FROM attendance a INNER JOIN tbl_students b ON a.student_qrcode = b.qr_code  WHERE DATE(a.LOGDATE) = CURDATE() ORDER BY a.attendance_id DESC";
					$stmt = $this->conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->get_result();
					$data = array();
					 while ($row = $result->fetch_assoc()) {
							   $data[] = $row;
						}
					 return $data;
			
			  }

		 public function fetchAll_studAttendance(){ 
            $sql = "SELECT * FROM attendance a INNER JOIN tbl_students b INNER JOIN student c ON a.student_qrcode = b.qr_code ORDER BY a.attendance_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

	
	    public function fetchindividual_student($student_id){ 
	            $sql = "SELECT * FROM  tbl_students WHERE `student_id` = ?";
					$stmt = $this->conn->prepare($sql);
					$stmt->bind_param("i", $student_id);
					$stmt->execute();
					$result = $stmt->get_result();
			        $data = array();
			         while ($row = $result->fetch_assoc()) {
			                   $data[] = $row;
			            }
			         return $data;

			  }

         public function fetchindividual_studAttendance($student_id){ 
            $sql = "SELECT * FROM attendance a INNER JOIN tbl_students b ON a.student_qrcode = b.qr_code WHERE b.student_id = ? ORDER BY a.attendance_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }


		  public function count_numberofstudents(){ 
            $sql = "SELECT COUNT(student_id) as student_id FROM tbl_students ORDER BY student_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		  public function count_numberofattendance(){ 
            $sql = "SELECT COUNT(attendance_id) as attendance_id FROM attendance ORDER BY attendance_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		    public function count_numberoftimeInOutToday(){ 
            $sql = "SELECT COUNT(attendance_id) as attendance_id FROM attendance  WHERE DATE(LOGDATE) = CURDATE() ORDER BY attendance_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		   public function count_numberofattendanceIndividualStud($student_id){ 
            $sql = "SELECT COUNT(a.attendance_id) as attendance_id FROM attendance a INNER JOIN tbl_students b ON a.student_qrcode = b.qr_code WHERE b.student_id = ? ORDER BY a.attendance_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		  public function count_numberofemployeesIndividualStud($student_id){ 
            $sql = "SELECT COUNT(student_id) as student_id FROM tbl_students WHERE student_id = ? ORDER BY student_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }
	
	}	

?>