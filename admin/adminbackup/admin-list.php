<html>
<title>Admin Management</title>
<link rel="stylesheet" href="../css/admintable-style.css">
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
    $sql = "SELECT * FROM admin_account order by recID asc";
    $result = mysqli_query($link, $sql);
    if ( $result) {
        if(mysqli_num_rows($result) > 0){
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;margin-top: 10;'>Admin Accounts</th>";
			echo "<td colspan = 2 style = 'float: right;'><a href = admin-list.php?cmd=Insert&recID=Auto><button class='dropbtn'>+ Create New</button></a></th>";
			echo "</table>";
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Rec ID</th>";
			echo "<th>Username</th>";
			echo "<th>Password</th>";
			echo "<th>Last Name</th>";
			echo "<th>First Name</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			
			while($row = mysqli_fetch_array($result)){
				$id = $row['recID']; 
				
				echo "<tr>";
				echo "<td align = center>" . $row['recID'] . "</td>";
				echo "<td align = center>" . $row['username'] . "</td>";
				echo "<td align = center>" . $row['password'] . "</td>";
				echo "<td align = center>" . $row['lastName'] . "</td>";
				echo "<td align = center>" . $row['firstName'] . "</td>";
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = admin-list.php?cmd=Edit&recID=$id>Edit</a></li>
          							<li><a href = admin-list.php?cmd=Delete&recID=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
  } 
  else  {
				echo "<button><a href = admin-list.php?cmd=Insert&recID=Auto>Add</a></button>";
  }
      } 
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM admin_account where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
		$username = $row['username'] ;
		$password = $row['password'] ;
		$lastName = $row['lastName'] ;
		$firstName = $row['firstName'] ;
		     echo "<form action=admin-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Staff Accounts";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Last Name<td><input type = text name = lastName value = $lastName>";
			 echo "<tr><td>First Name<td><input type = text name = firstName value = $firstName>";
			 echo "<tr><td>Username<td><input type = text name = username value = $username>";
		     echo "<tr><td>Password<td><input type = text name = password value = '$password'>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE admin_account AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	
	$rec = $_POST['recID'];
	$username = $_POST['username'] ;
	$password = $_POST['password'] ;
	$lastName = $_POST['lastName'] ;
	$firstName = $_POST['firstName'] ;
	$sql = "UPDATE admin_account
				 Set 
					   username = '$username',
					   password = '$password',
					   lastName = '$lastName',
					   firstName = '$firstName'
				 where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Admin account successfully updated !";
	else
		  $mess = "Unable to update account !";
	$cmd = "";
	echo "<form action=admin-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Insert' ) { 
		echo "<form action=admin-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create New Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>First Name<td><input type = text name = lastName>";
			 echo "<tr><td>Last Name<td><input type = text name = firstName>";
			 echo "<tr><td>Username<td><input type = text name = username>";
			 echo "<tr><td>Password<td><input type = text name = password>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
   if ($cmd == 'Create') { 
		$lastName = $_POST['lastName'] ;
		$firstName = $_POST['firstName'] ;
	    $username = $_POST['username'] ;
	    $password = $_POST['password'];
       $sql = "INSERT into admin_account(lastName,firstName,username,password) 
	                         values ('$lastName','$firstName','$username','$password')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result) 
		   $mess = "New account has been created !";
       else
 		   $mess = "Unable to create record !";
      echo "<form action=admin-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
      mysqli_close($link);
   }
   
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM admin_account where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM admin_account where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
			 $lastName = $row['lastName'];
			 $firstName = $row['firstName'];
             $username = $row['username'];
             $password = $row['password'];
		     echo "<form action=admin-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Staff Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Last Name<td><input type = text name = lastName value = $lastName>";
		     echo "<tr><td>First Name<td><input type = textname = firstName value = '$firstName'>";
			 echo "<tr><td>Username<td><input type = text name = username value = $username>";
			 echo "<tr><td>Password<td><input type = text name = password value = $password>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM admin_account where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Account successfully deleted !";
	  else
		   $mess = "Unable to delete account !";

		   $sql = "ALTER TABLE admin_account AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=admin-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>
