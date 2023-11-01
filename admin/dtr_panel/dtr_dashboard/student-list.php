<html>
<title>Student Management</title>
<link rel="stylesheet" href="css/admintable-style.css">
</html>

<?php
require("connect.php");
$cmd   = "";
$rec = 1;
if (isset($_GET['cmd'])) {
	$cmd   = $_GET['cmd'];
	$rec   = $_GET['student_id'];
}
if (isset($_POST['cmd'])) {
	$cmd   = $_POST['cmd'];
	$rec   = $_POST['student_id'];
}
if ( $cmd == "Cancel" or $cmd == "No" or $cmd == "") {
    $sql = "SELECT * FROM student order by student_id asc";
    $result = mysqli_query($link, $sql);
    if ( $result) {
        if(mysqli_num_rows($result) > 0){
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;margin-top: 10;'>Student Accounts</th>";
			echo "</table>";
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Student ID</th>";
			echo "<th>Full Name</th>";
			echo "<th>Department</th>";
			echo "<th>Password</th>";
			echo "<th>Gender</th>";
			echo "<th>Contact No.</th>";
			echo "<th>Address</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			
			while($row = mysqli_fetch_array($result)){
				$id = $row['student_id']; 
				
				echo "<tr>";
				echo "<td align = center>" . $row['student_id'] . "</td>";
				echo "<td align = center>" . $row['name'] . "</td>";
				echo "<td align = center>" . $row['dept'] . "</td>";
				echo "<td align = center>" . $row['password'] . "</td>";
				echo "<td align = center>" . $row['gender'] . "</td>";
				echo "<td align = center>" . $row['cnumber'] . "</td>";
				echo "<td align = center>" . $row['address'] . "</td>";
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = student-list.php?cmd=Edit&student_id=$id>Edit</a></li>
          							<li><a href = student-list.php?cmd=Delete&student_id=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
  } 
  else  {
				echo "<button><a href = student-list.php?cmd=Insert&student_id=Auto>Add</a></button>";
  }
      } 
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM student where student_id = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
		$name = $row['name'] ;
		$dept = $row['dept'] ;
		$password = $row['password'] ;
		$gender = $row['gender'] ;
		$cnumber = $row['cnumber'] ;
		$address = $row['address'] ;
		     echo "<form action=student-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Student Accounts";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Student ID <td><input type = text name = student_id value = $rec readonly>";
			 echo "<tr><td>Full Name<td><input type = text name = name value = $name>";
			 echo "<tr><td>Department<td><input type = text name = dept value = $dept>";
		     echo "<tr><td>Password<td><input type = text name = password value = '$password'>";
		     echo "<tr><td>Gender<td><input type = text name = gender value = '$gender'>";
		     echo "<tr><td>Contact Number<td><input type = text name = cnumber value = '$cnumber'>";
		     echo "<tr><td>Address<td><input type = text name = address value = '$address'>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE student AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	
	$rec = $_POST['student_id'];
	$name = $_POST['name'] ;
	$dept = $_POST['dept'] ;
	$password = $_POST['password'] ;
	$gender = $_POST['gender'] ;
	$cnumber = $_POST['cnumber'] ;
	$address = $_POST['address'] ;
	$sql = "UPDATE student
				 Set 
				 	   name = '$name',
					   dept = '$username',
					   password = '$password'
				 where student_id = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Admin account successfully updated !";
	else
		  $mess = "Unable to update account !";
	$cmd = "";
	echo "<form action=student-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Insert' ) { 
		echo "<form action=student-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create New Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Student ID <td><input type = text name = student_id value = $rec readonly>";
			 echo "<tr><td>Name<td><input type = text name = name>";
			 echo "<tr><td>Department<td><input type = text name = dept>";
			 echo "<tr><td>Password<td><input type = text name = password>";
			 echo "<tr><td>Gender<td><input type = text name = gender>";
			 echo "<tr><td>Contact No.<td><input type = text name = cnumber>";
			 echo "<tr><td>Address<td><input type = text name = address>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
   if ($cmd == 'Create') { 
		$name = $_POST['name'] ;
	    $dept = $_POST['dept'] ;
	    $password = $_POST['password'];
	    $gender = $_POST['gender'];
	    $cnumber = $_POST['cnumber'];
	    $address = $_POST['address'];
       $sql = "INSERT into student(name,,dept,password,gender,cnumber,address) 
	                         values ('$name','$dept','$password','$gender','$cnumber','$address')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result) 
		   $mess = "New account has been created !";
       else
 		   $mess = "Unable to create record !";
      echo "<form action=student-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
      mysqli_close($link);
   }
   
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM student where student_id = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM student where student_id = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
			 $name = $row['name'];
             $dept = $row['dept'];
             $password = $row['password'];
             $gender = $row['gender'];
             $cnumber = $row['cnumber'];
             $address = $row['address'];
		     echo "<form action=student-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Student Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Student ID <td><input type = text name = student_id value = $rec readonly>";
			 echo "<tr><td>Name<td><input type = text name = name value = $name>";
			 echo "<tr><td>Department<td><input type = text name = dept value = $dept>";
			 echo "<tr><td>Password<td><input type = text name = password value = $password>";
			 echo "<tr><td>Gender<td><input type = text name = gender value = $gender>";
			 echo "<tr><td>Contact No.<td><input type = text name = cnumber value = $cnumber>";
			 echo "<tr><td>Address<td><input type = text name = address value = $address>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM student where student_id = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Account successfully deleted !";
	  else
		   $mess = "Unable to delete account !";

		   $sql = "ALTER TABLE student AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=student-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>
