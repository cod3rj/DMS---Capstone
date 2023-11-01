<html>
<title>Payment History</title>
<link rel="stylesheet" href="../css/payment-style.css">
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
    $sql = "SELECT * FROM payment_list order by recID asc";
    $result = mysqli_query($link, $sql);
    if ( $result) {
        if(mysqli_num_rows($result) > 0){
			echo "<table class=styled-table width = 90% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;'>Payment History</th>";
			echo "</table>";
			echo "<table class=styled-table width = 90% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Tenant ID</th>";
			echo "<th>Month of</th>";
			echo "<th>Amount</th>";
			echo "<th>Payment Date Created</th>";
			echo "<th>Payment Date Update</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			
			while($row = mysqli_fetch_array($result)){
				$id = $row['recID']; 
				
				echo "<tr>";
				echo "<td align = center>" . $row['tenantID'] . "</td>";
				echo "<td align = center>" . $row['month'] . "</td>";
				echo "<td align = center>" . $row['amount'] . "</td>";
				echo "<td align = center>" . $row['dateCreated'] . "</td>";
				echo "<td align = center>" . $row['dateUpdated'] . "</td>";
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = payment-list.php?cmd=Edit&recID=$id>Edit</a></li>
          							<li><a href = payment-list.php?cmd=Delete&recID=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
  } 
  else  {
				echo "<button><a href = payment-list.php?cmd=Insert&recID=Auto>Add</a></button>";
  }
      } 
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM payment_list where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
		$tenantID = $row['tenantID'] ;
		$month = $row['month'] ;
		$amount = $row['amount'] ;
		$dateCreated = $row['dateCreated'] ;
		$dateUpdated = $row['dateUpdated'] ;
		     echo "<form action=payment-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Staff Accounts";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID<td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Tenant ID<td><input type = text name = tenantID value = $tenantID>";
			 echo "<tr><td>Month of<td><input type = text name = month value = $month>";
			 echo "<tr><td>Amount<td><input type = text name = amount value = $amount>";
			 echo "<tr><td>Date Created<td><input type = text name = dateCreated value = $dateCreated>";
			 echo "<tr><td>Date Updated<td><input type = text name = dateUpdated value = $dateUpdated>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE payment_list AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	
	$rec = $_POST['recID'];
	$tenantID = $_POST['tenantID'] ;
	$month = $_POST['month'] ;
	$amount = $_POST['amount'] ;
	$dateCreated = $_POST['dateCreated'] ;
	$dateUpdated = $_POST['dateUpdated'] ;
	$sql = "UPDATE payment_list
				 Set 
                       tenantID = '$tenantID',
					   month = '$month',
					   amount = '$amount',
					   dateCreated = '$dateCreated',
					   dateUpdated = '$dateUpdated'
				 where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Payment successfully updated !";
	else
		  $mess = "Unable to update payment !";
	$cmd = "";
	echo "<form action=payment-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Insert' ) { 
		echo "<form action=payment-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create New Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Tenant ID<td><input type = text name = tenantID>";
			 echo "<tr><td>Month of<td><input type = text name = month>";
			 echo "<tr><td>Amount<td><input type = text name = amount>";
			 echo "<tr><td>Date Created<td><input type = text name = dateCreated>";
			 echo "<tr><td>Date Updated<td><input type = text name = dateUpdated>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
   if ($cmd == 'Create') { 
		
	$tenantID = $_POST['tenantID'] ;
	$month = $_POST['month'] ;
	$amount = $_POST['amount'] ;
	$dateCreated = $_POST['dateCreated'] ;
	$dateUpdated = $_POST['dateUpdated'] ;
       $sql = "INSERT into payment_list(tenantID,month,amount,dateCreated,dateUpdated) 
	                         values ('$tenantID','$month','$amount','$dateCreated','$dateUpdated')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result) 
		   $mess = "New account has been created !";
       else
 		   $mess = "Unable to create record !";
      echo "<form action=payment-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
      mysqli_close($link);
   }
   
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM payment_list where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM payment_list where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
			 
	$tenantID = $row['tenantID'] ;
	$month = $row['month'] ;
	$amount = $row['amount'] ;
	$dateCreated = $row['dateCreated'] ;
	$dateUpdated = $row['dateUpdated'] ;
		     echo "<form action=payment-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Staff Account";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Tenant ID<td><input type = text name = lastName value = $tenantID>";
			 echo "<tr><td>Month of<td><input type = text name = firstName value = $month>";
			 echo "<tr><td>Amount<td><input type = text name = contactNum value = $amount>";
			 echo "<tr><td>Date Created<td><input type = text name = address value = $dateCreated>";
			 echo "<tr><td>Date Updated<td><input type = text name = requestID value = $dateUpdated>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM payment_list where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Account successfully deleted !";
	  else
		   $mess = "Unable to delete account !";

		   $sql = "ALTER TABLE payment_list AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=payment-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>