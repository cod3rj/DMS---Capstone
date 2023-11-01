<html>
<title>Bookings</title>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/booking-style.css">
    <link rel="stylesheet" href="css/general-design-table.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="css/admintable-style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <style>
        div#bookingTable_length {
			margin-bottom: 1%;
            margin-left: 9.5%;
        }
        div#bookingTable_filter {
            margin-right: 10.5%;
        }
        div#bookingTable_paginate {
			margin-top: 1%;
            margin-right: 9.5%;
        }
        table#bookingTable {
            width: 80%;
            margin-left: 9.5%;
        }
    </style>

	</head>
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
    $sql = "SELECT * FROM bookings_list order by recID asc";
    $result = mysqli_query($link, $sql);
    if ( $result) {
        if(mysqli_num_rows($result) > 0){
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;margin-top: 20;'>Booking Management</th>";
			echo "<td colspan = 2 style = 'float: right;'><a href = hostelbooking.php><button class='dropbtn'>+ Confirm Booking</button></a></th>";
			echo "</table>";
			echo "<table id ='bookingTable' class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Full Name</th>";
			echo "<th>Email</th>";
			echo "<th>Contact Number</th>";
			echo "<th>Address</th>";
			echo "<th>Request Room Type</th>";
			echo "<th>Request Date Created</th>";
			echo "<th>Request Date Update</th>";
			echo "<th>Request Status</th>";
			echo "<th>Request Notes</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			
			$var_reqStatus = [0 => '', 1 => 'Pending', 2 => 'Approved'];
			while($row = mysqli_fetch_array($result)){
				$id = $row['recID']; 
				
				echo "<tr>";
				echo "<td align = center>" . $row['fname'] . "</td>";
				echo "<td align = center>" . $row['email'] . "</td>";
				echo "<td align = center>" . $row['contactNum'] . "</td>";
				echo "<td align = center>" . $row['address'] . "</td>";
				echo "<td align = center>" . $row['reqRoomType'] . "</td>";
				echo "<td align = center>" . $row['reqCreatedDate'] . "</td>";
				echo "<td align = center>" . $row['reqUpdatedDate'] . "</td>";
				echo "<td align = center>" . $var_reqStatus[$row['reqStatus']] . "</td>";
				echo "<td align = center>" . $row['reqNotes'] . "</td>";
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = bookings-list.php?cmd=Edit&recID=$id>Edit</a></li>
          							<li><a href = bookings-list.php?cmd=Delete&recID=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
  } 
  else  {
				echo "<button><a href = bookings-list.php?cmd=Insert&recID=Auto>Add</a></button>";
  }
      } 
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM bookings_list where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
		$fname = $row['fname'] ;
		$email = $row['email'] ;
		$contactNum = $row['contactNum'] ;
		$address = $row['address'] ;
		$reqRoomType = $row['reqRoomType'] ;
		$reqCreatedDate = $row['reqCreatedDate'] ;
		$reqUpdatedDate = $row['reqUpdatedDate'] ;
		$reqStatus = $row['reqStatus'] ;
		$reqNotes = $row['reqNotes'] ;
		     echo "<form action=bookings-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Booking";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Full Name<td><input type = text name = fname value = $fname>";
			 echo "<tr><td>Email<td><input type = text name = email value = $email>";
			 echo "<tr><td>Contact Number<td><input type = text name = contactNum value = $contactNum>";
			 echo "<tr><td>Address<td><input type = text name = address value = $address>";
			 echo "<tr><td>Request Room Type<td><input type = text name = reqRoomType value = $reqRoomType>";
			 echo "<tr><td>Request Created Date<td><input type = text name = reqCreatedDate value = $reqCreatedDate>";
			 echo "<tr><td>Request Updated Date<td><input type = text name = reqUpdatedDate value = $reqUpdatedDate>";
			 //echo "<tr><td>Request Status<td><input type = text name = reqStatus value = $reqStatus>";
			 echo "<tr><td>Request Status<td><select name = reqStatus>";
             echo "<option value='1'"; echo (($reqStatus == 1) ? 'selected' : ''); echo "> Pending </option>";
             echo "<option value='2'"; echo (($reqStatus == 2) ? 'selected' : ''); echo "> Approved </option>";
			 echo "<tr><td>Request Notes<td><input type = text name = reqNotes value = $reqNotes>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE bookings_list AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	
	$rec = $_POST['recID'];
	$fname = $_POST['fname'] ;
	$email = $_POST['email'] ;
	$contactNum = $_POST['contactNum'] ;
	$address = $_POST['address'] ;
	$reqRoomType = $_POST['reqRoomType'] ;
	$reqCreatedDate = $_POST['reqCreatedDate'] ;
	$reqUpdatedDate = $_POST['reqUpdatedDate'] ;
	$reqStatus = $_POST['reqStatus'] ;
	$reqNotes = $_POST['reqNotes'] ;
	$sql = "UPDATE bookings_list
				 Set 
                       fname = '$fname',
					   email = '$email',
					   contactNum = '$contactNum',
					   address = '$address',
					   reqRoomType = '$reqRoomType',
					   reqCreatedDate = '$reqCreatedDate',
					   reqUpdatedDate = '$reqUpdatedDate',
					   reqStatus = '$reqStatus',
					   reqNotes = '$reqNotes'
				 where recID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Booking successfully updated !";
	else
		  $mess = "Unable to update booking !";
	$cmd = "";
	echo "<form action=bookings-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM bookings_list where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM bookings_list where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
			 
	$fname = $row['fname'] ;
	$email = $row['email'] ;
	$contactNum = $row['contactNum'] ;
	$address = $row['address'] ;
	$reqRoomType = $row['reqRoomType'] ;
	$reqCreatedDate = $row['reqCreatedDate'] ;
	$reqUpdatedDate = $row['reqUpdatedDate'] ;
	$reqStatus = $row['reqStatus'] ;
	$reqNotes = $row['reqNotes'] ;
		     echo "<form action=bookings-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Booking";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
			 echo "<tr><td>Full Name<td><input type = text name = fname value = $fname>";
			 echo "<tr><td>Email<td><input type = text name = email value = $email>";
			 echo "<tr><td>Contact Number<td><input type = text name = contactNum value = $contactNum>";
			 echo "<tr><td>Address<td><input type = text name = address value = $address>";
			 echo "<tr><td>Request Room Type<td><input type = text name = reqRoomType value = $reqRoomType>";
			 echo "<tr><td>Request Created Date<td><input type = text name = reqCreatedDate value = $reqCreatedDate>";
			 echo "<tr><td>Request Updated Date<td><input type = text name = reqUpdatedDate value = $reqUpdatedDate>";
			 //echo "<tr><td>Request Status<td><input type = text name = reqStatus value = $reqStatus>";
			 echo "<tr><td>Request Status<td><select name = reqStatus>";
             echo "<option value='1'"; echo (($reqStatus == 1) ? 'selected' : ''); echo "> Pending </option>";
             echo "<option value='2'"; echo (($reqStatus == 2) ? 'selected' : ''); echo "> Approved </option>";
			 echo "<tr><td>Request Notes<td><input type = text name = reqNotes value = $reqNotes>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM bookings_list where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Booking successfully deleted !";
	  else
		   $mess = "Unable to delete booking !";

		   $sql = "ALTER TABLE bookings_list AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=bookings-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>

<script>
    $(document).ready(function() {
        $('#bookingTable').DataTable({
            "searching": true,
            "bPaginate": true,
            "lengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true,
            lengthMenu: [5, 10, 25, 50, 100, 200],
            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },
                {
                    orderable: false,
                    targets: [6]
                }
            ],
        });
    });
</script>