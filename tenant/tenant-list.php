<html>
<title>User Management</title>
<link rel="stylesheet" href="../css/tenanttable-style.css">
</html>

<?php
require("connect.php");
$cmd   = "";
$rec = 1;
if (isset($_GET['cmd'])) {
	$cmd   = $_GET['cmd'];
	$rec   = $_GET['recID'];
}
if (isset($_POST['cmd'])) {
	$cmd   = $_POST['cmd'];
	$rec   = $_POST['recID'];
}
if ( $cmd == "Cancel" or $cmd == "No" or $cmd == "") {
    $sql = "SELECT * FROM tenant_account order by recID asc";
    $result = mysqli_query($link, $sql);
    if ( $result) {
        if(mysqli_num_rows($result) > 0){
			echo "<table class=styled-table width = 90% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;margin-top: 10;'>Tenant Accounts</th>";
			echo "<td colspan = 2 style = 'float: right;'><a href = tenant-list.php?cmd=Insert&recID=Auto><button class='dropbtn'>+ Create New</button></a></th>";
			echo "</table>";
			echo "<table class=styled-table width = 90% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Tenant ID</th>";
			echo "<th>Last Name</th>";
			echo "<th>First Name</th>";
			echo "<th>Department</th>";
			echo "<th>Course</th>";
			echo "<th>Contact Number</th>";
			echo "<th>Address</th>";
			echo "<th>Age</th>";
			echo "<th>Gender</th>";
			echo "<th>Email</th>";
			echo "<th>Status</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			
			while($row = mysqli_fetch_array($result)){
				$id = $row['recID']; 
				
				echo "<tr>";
				echo "<td align = center>" . $row['tenantID'] . "</td>";
				echo "<td align = center>" . $row['lastName'] . "</td>";
				echo "<td align = center>" . $row['firstName'] . "</td>";
				echo "<td align = center>" . $row['department'] . "</td>";
				echo "<td align = center>" . $row['course'] . "</td>";
				echo "<td align = center>" . $row['contactNum'] . "</td>";
				echo "<td align = center>" . $row['address'] . "</td>";
				echo "<td align = center>" . $row['age'] . "</td>";
				echo "<td align = center>" . $row['gender'] . "</td>";
				echo "<td align = center>" . $row['email'] . "</td>";
				echo "<td align = center>" . $row['status'] . "</td>";
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = tenant-list.php?cmd=Edit&recID=$id>Edit</a></li>
          							<li><a href = tenant-list.php?cmd=Delete&recID=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
  } 
  else  {
				echo "<button><a href = tenant-list.php?cmd=Insert&recID=Auto>Add</a></button>";
  }
      } 
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM tenant_account where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
		$tenantID = $row['tenantID'] ;
		$lastName = $row['lastName'] ;
		$firstName = $row['firstName'] ;
		$department = $row['department'] ;
		$course = $row['course'] ;
		$contactNum = $row['contactNum'] ;
		$address = $row['address'] ;
		$age = $row['age'] ;
		$gender = $row['gender'] ;
		$email = $row['email'] ;
		$username = $row['username'] ;
		$password = $row['password'] ;
		$emgName = $row['emgName'] ;
		$emgNum = $row['emgNum'] ;
		$emgAddress = $row['emgAddress'] ;
		$emgRelation = $row['emgRelation'] ;
		     echo "<form action=tenant-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Staff Accounts";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Tenant ID<td><input type = text name = tenantID value = $tenantID>";
			 echo "<tr><td>Last Name<td><input type = text name = lastName value = $lastName>";
			 echo "<tr><td>First Name<td><input type = text name = firstName value = $firstName>";
			 echo "<tr><td>Department<td><input type = text name = department value = $department>";
			 echo "<tr><td>Course<td><input type = text name = course value = $course>";
			 echo "<tr><td>First Name<td><input type = text name = contactNum value = $contactNum>";
			 echo "<tr><td>Address<td><input type = text name = address value = $address>";
			 echo "<tr><td>Age<td><input type = text name = age value = $age>";
			 echo "<tr><td>Gender<td><input type = text name = gender value = $gender>";
			 echo "<tr><td>Email<td><input type = text name = email value = $email>";
			 echo "<tr><td>Username<td><input type = text name = username value = $username>";
		     echo "<tr><td>Password<td><input type = text name = password value = '$password'>";
			 echo "<tr><td>Emergency Name<td><input type = text name = emgName value = $emgName>";
			 echo "<tr><td>Emergency Contact<td><input type = text name = emgNum value = $emgNum>";
			 echo "<tr><td>Emergency Address<td><input type = text name = emgAddress value = $emgAddress>";
			 echo "<tr><td>Emergency Relation<td><input type = text name = emgRelation value = $emgRelation>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE tenant_account AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	
	$rec = $_POST['recID'];
	$tenantID = $_POST['tenantID'];
	$lastName = $_POST['lastName'] ;
	$firstName = $_POST['firstName'] ;
	$department = $_POST['department'] ;
	$course = $_POST['course'] ;
	$contactNum = $_POST['contactNum'] ;
	$address = $_POST['address'] ;
	$age = $_POST['age'] ;
	$gender = $_POST['gender'] ;
	$email = $_POST['email'] ;
	$username = $_POST['username'] ;
	$password = $_POST['password'] ;
	$emgName = $_POST['emgName'] ;
	$emgNum = $_POST['emgNum'] ;
	$emgAddress = $_POST['emgAddress'] ;
	$emgRelation = $_POST['emgRelation'] ;
	$sql = "UPDATE tenant_account
				 Set 
                       tenantID = '$tenantID',
                       lastName = '$lastName',
					   firstName = '$firstName',
					   department = '$department',
					   course = '$course',
					   contactNum = '$contactNum',
					   address = '$address',
					   age = '$age',
					   gender = '$gender',
					   email = '$email',
					   username = '$username',
					   password = '$password',
					   emgName = '$emgName',
					   emgNum = '$emgNum',
					   emgAddress = '$emgAddress',
					   emgRelation = '$emgRelation'
				 where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Tenant account successfully updated !";
	else
		  $mess = "Unable to update account !";
	$cmd = "";
	echo "<form action=tenant-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Insert' ) { 
		echo "<form action=tenant-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create New Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
             echo "<tr><td>Tenant ID<td><input type = text name = tenantID>";
			 echo "<tr><td>Last Name<td><input type = text name = firstName>";
			 echo "<tr><td>First Name<td><input type = text name = lastName>";
			 echo "<tr><td>Department<td><input type = text name = department>";
			 echo "<tr><td>Course<td><input type = text name = course>";
			 echo "<tr><td>Contact Number<td><input type = text name = contactNum>";
			 echo "<tr><td>Address<td><input type = text name = address>";
			 echo "<tr><td>Age<td><input type = text name = age>";
			 echo "<tr><td>Gender<td><input type = text name = gender>";
			 echo "<tr><td>Email<td><input type = text name = email>";
			 echo "<tr><td>Username<td><input type = text name = username>";
			 echo "<tr><td>Password<td><input type = text name = password>";
			 echo "<tr><td>Emergency Name<td><input type = text name = emgName>";
			 echo "<tr><td>Emergency Contact<td><input type = text name = emgNum>";
			 echo "<tr><td>Emergency Address<td><input type = text name = emgAddress>";
			 echo "<tr><td>Emergency Relation<td><input type = text name = emgRelation>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
   if ($cmd == 'Create') { 
		
	$tenantID = $_POST['tenantID'];
	$lastName = $_POST['lastName'] ;
	$firstName = $_POST['firstName'] ;
	$department = $_POST['department'] ;
	$course = $_POST['course'] ;
	$contactNum = $_POST['contactNum'] ;
	$address = $_POST['address'] ;
	$age = $_POST['age'] ;
	$gender = $_POST['gender'] ;
	$email = $_POST['email'] ;
	$username = $_POST['username'] ;
	$password = $_POST['password'] ;
	$emgName = $_POST['emgName'] ;
	$emgNum = $_POST['emgNum'] ;
	$emgAddress = $_POST['emgAddress'] ;
	$emgRelation = $_POST['emgRelation'] ;
       $sql = "INSERT into tenant_account(tenantID,lastName,firstName,department,course,contactNum,address,age,gender,email,username,password,emgName,emgNum,emgAddress,emgRelation) 
	                         values ('$tenantID','$lastName','$firstName','$department','$course','$contactNum','$address','$age','$gender','$email','$username','$password','$emgName','$emgNum','$emgAddress','$emgRelation')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result) 
		   $mess = "New account has been created !";
       else
 		   $mess = "Unable to create record !";
      echo "<form action=tenant-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
      mysqli_close($link);
   }
   
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM tenant_account where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM tenant_account where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
			 
	$tenantID = $row['tenantID'];
	$lastName = $row['lastName'] ;
	$firstName = $row['firstName'] ;
	$department = $row['department'] ;
	$course = $row['course'] ;
	$contactNum = $row['contactNum'] ;
	$address = $row['address'] ;
	$age = $row['age'] ;
	$gender = $row['gender'] ;
	$email = $row['email'] ;
	$username = $row['username'] ;
	$password = $row['password'] ;
	$emgName = $row['emgName'] ;
	$emgNum = $row['emgNum'] ;
	$emgAddress = $row['emgAddress'] ;
	$emgRelation = $row['emgRelation'] ;
		     echo "<form action=tenant-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Staff Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Tenant ID<td><input type = text name = tenantID value = $tenantID readonly>";
			 echo "<tr><td>Last Name<td><input type = text name = lastName value = $lastName>";
			 echo "<tr><td>First Name<td><input type = text name = firstName value = $firstName>";
			 echo "<tr><td>Department<td><input type = text name = department value = $department>";
			 echo "<tr><td>Course<td><input type = text name = course value = $course>";
			 echo "<tr><td>First Name<td><input type = text name = contactNum value = $contactNum>";
			 echo "<tr><td>Address<td><input type = text name = address value = $address>";
			 echo "<tr><td>Age<td><input type = text name = age value = $age>";
			 echo "<tr><td>Gender<td><input type = text name = gender value = $gender>";
			 echo "<tr><td>Email<td><input type = text name = email value = $email>";
			 echo "<tr><td>Username<td><input type = text name = username value = $username>";
		     echo "<tr><td>Password<td><input type = text name = password value = '$password'>";
			 echo "<tr><td>Emergency Name<td><input type = text name = emgName value = $emgName>";
			 echo "<tr><td>Emergency Contact<td><input type = text name = emgNum value = $emgNum>";
			 echo "<tr><td>Emergency Address<td><input type = text name = emgAddress value = $emgAddress>";
			 echo "<tr><td>Emergency Relation<td><input type = text name = emgRelation value = $emgRelation>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM tenant_account where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Account successfully deleted !";
	  else
		   $mess = "Unable to delete account !";

		   $sql = "ALTER TABLE tenant_account AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=tenant-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>