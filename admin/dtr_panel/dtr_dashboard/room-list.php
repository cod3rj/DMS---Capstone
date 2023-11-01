<html>
<title>Room Management</title>
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenanttable-style.css">
    <link rel="stylesheet" href="css/general-design-table.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="css/admintable-style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <style>
        div#roomTypeTable_length {
			margin-bottom: 1%;
            margin-left: 9.5%;
        }
        div#roomTypeTable_filter {
            margin-right: 10.5%;
        }
        div#roomTypeTable_paginate {
			margin-top: 1%;
            margin-right: 9.5%;
        }
        table#roomTypeTable {
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
	$rec   = $_GET['rec_ID'];
}
if (isset($_POST['cmd'])) {
	$cmd   = $_POST['cmd'];
	$rec   = $_POST['rec_ID'];
}
if ( $cmd == "Cancel" or $cmd == "No" or $cmd == "") {
    $sql = "SELECT * FROM room_list order by rec_ID asc";
    $result = mysqli_query($link, $sql);
   
			echo "<table class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<th style = 'float: left;margin-top: 10;'>List of Rooms</th>";
			echo "<td colspan = 2 style = 'float: right;'><a href = room-list.php?cmd=Insert&rec_ID=Auto><button class='dropbtn'>+ Create New</button></a></th>";
			echo "</table>";
			echo "<table id ='roomTypeTable' class=styled-table width = 80% cellspacing = 5 cellpadding = 5>";
			echo "<thead>";
			echo "<tr>"; 
            echo "<th>Room Number</th>";
            echo "<th>Building</th>";
            echo "<th>Room Name</th>";
            echo "<th>Room Type</th>";
            echo "<th>Images</th>";
            echo "<th>Slots</th>";
            echo "<th>Available</th>";
            echo "<th>Date Created</th>";
            echo "<th>Status</th>";
            echo "<th>Actions</th>";
			echo "</tr>";
			echo "</thead>";
            
            //$var_roomType = [0 => '', 1 => 'Twin Sharing', 2 => 'Four Sharing', 3 => 'Six Sharing'];
            //$var_buildingName = [0 => '', 1 => 'Ocampo Building', 2 => 'CITHM Building', 3 => 'Tamayo Building'];
            $var_status = [0 => '', 1 => 'Free', 2 => 'On Maintenance', 3 => 'Occupied'];

            
			while($row = mysqli_fetch_array($result)){
                $id = $row['rec_ID']; 
				$buildingName = $row['buildingName']; 
				$roomName = $row['roomName']; 
				$roomType = $row['roomType']; 
				$image = $row['image']; 
				$slots = $row['slots']; 
				$available = $row['available']; 
				$dateCreated = $row['dateCreated']; 
				$status = $row['status']; 
				echo "<tr>";
				echo "<td align = center>" . $row['rec_ID'] . "</td>";
				//echo "<td align = center>" . $var_buildingName[$row['buildingName']] . "</td>";
                echo "<td align = center>" . $row['buildingName'] . "</td>";
                echo "<td align = center>" . $row['roomName'] . "</td>";
				//echo "<td align = center>" . $var_roomType[$row['roomType']] . "</td>";
                echo "<td align = center>" . $row['roomType'] . "</td>";
                ?>
				<td align = center><img src="../../room_images/<?= $row['image']; ?>" width="50px" height="50px"></td>
				<?php
                echo "<td align = center>" . $row['slots'] . "</td>";
                echo "<td align = center>" . $row['available'] . "</td>";
                echo "<td align = center>" . $row['dateCreated'] . "</td>";
                if($status=='1')
                {
                    echo "<td align = center><span class='approved'>" . $var_status[$row['status']] . "</span></td>";
                }
                else if ($status=='2')
                {
                    echo "<td align = center><span class='pending'>" . $var_status[$row['status']] . "</span></td>";
                }
                else
                {
                    echo "<td align = center><span class='inactive'>" . $var_status[$row['status']] . "</span></td>";
                }
				echo "<td style='width:10%'>
						<ul>
    			  			<li><a>Action +</a>
       							 <ul>
									<li><a href = ''>View</a></li>
          							<li><a href = room-list.php?cmd=Edit&rec_ID=$id>Edit</a></li>
          							<li><a href = room-list.php?cmd=Delete&rec_ID=$id>Delete</a></li>
        						</ul>
     						</li>
    					</ul>";
				
				echo "</tr>";
		}

				 mysqli_free_result($result);
 
}

if ($cmd == 'Edit' ) { 
	$sql = "SELECT *  FROM room_list where rec_ID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_array($result);
        $buildingName = $row['buildingName'] ;
        $roomName = $row['roomName'] ;
        $roomType = $row['roomType'] ;
        $slots = $row['slots'] ;
        $dateUpdated = $row['dateUpdated'] ;
        $status = $row['status'] ;
		     echo "<form action=room-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Room Details";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = rec_ID value = $rec readonly>";
             echo "<tr><td>Dorm Building<td>";
             echo "<select name='buildingName'>
             <option value='Ocampo Building'> Ocampo Building </option>
             <option value='CITHM Building'> CITHM Building </option>
             <option value='Tamayo Building'> Tamayo Building </option></select>";
             echo "</select><br>";
			 echo "<tr><td>Room Name<td><input type = text name = roomName value = '$roomName'>";
             echo "<tr><td>Room Type<td>";
             echo "<select name='roomType'>
             <option value='Twin Sharing'> Twin Sharing </option>
             <option value='Four Sharing'> Four Sharing </option>
             <option value='Six Sharing'> Six Sharing </option></select>";
             echo "</select><br>";
             echo "<tr><td>Slots<td><input type = text name = slots value = $slots>";
             echo "<tr><td>Date Updated<td><input type = datetime-local name = dateUpdated value = $dateUpdated>";
             echo "<tr><td>Status<td><select name = status>";
             echo "<option value='1'"; echo (($status == 1) ? 'selected' : ''); echo "> Free </option>";
             echo "<option value='2'"; echo (($status == 2) ? 'selected' : ''); echo "> On Maintenance </option>";
             echo "<option value='3'"; echo (($status == 3) ? 'selected' : ''); echo "> Occupied </option></select>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }   
    }	

if ($cmd == 'Save') { 
	$sql = "ALTER TABLE room_list AUTO_INCREMENT=1";
	$result =  mysqli_query($link, $sql);
	$rec = $_POST['rec_ID'];
    $buildingName = $_POST['buildingName'] ;
    $roomName = $_POST['roomName'] ;
    $roomType = $_POST['roomType'] ;
    $slots = $_POST['slots'] ;
    $dateUpdated = $_POST['dateUpdated'] ;
    $status = $_POST['status'] ;

	$sql = "UPDATE room_list
				 Set 
                 buildingName = '$buildingName',
                 roomName = '$roomName',
                 roomType = '$roomType',
                 slots = '$slots',
                 dateUpdated = '$dateUpdated',
                 status = '$status'
				 where rec_ID = '$rec'";
	$result =  mysqli_query($link, $sql);
	if ($result) 
		  $mess = "Room successfully updated !";
	else
		  $mess = "Unable to update room!";
	$cmd = "";
	echo "<form action=room-list.php method = post>";
	echo "<br><table align = center>";
	echo "<tr><td align = center>$mess";
	echo "<tr><th><input type = submit value = 'Go Back'></form>";
	mysqli_close($link);
}
   if ($cmd == 'Insert' ) { 
		echo "<form action=room-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create Room";
             echo "<tr><td colspan = 2><hr>"; 
		     echo "<tr><td>Record ID <td><input type = text name = rec_ID value = $rec readonly>";
             echo "<tr><td>Dorm Building<td>";
             echo "<select name='buildingName'>
             <option value='Ocampo Building'> Ocampo Building </option>
             <option value='CITHM Building'> CITHM Building </option>
             <option value='Tamayo Building'> Tamayo Building </option></select>";
             echo "</select><br>";
             echo "<tr><td>Room Name:<td>";
             echo "<input type='text' name='roomName'>";
             echo "<tr><td>Room Type<td>";
             echo "<select name='roomType'>
             <option value='Twin Sharing'> Twin Sharing </option>
             <option value='Four Sharing'> Four Sharing </option>
             <option value='Six Sharing'> Six Sharing </option></select>";
             echo "</select><br>";
             echo "<tr><td>Slots:<td>";
             echo "<input type='number' name='slots'>";
             echo "<tr><td>Available:<td>";
             echo "<input type='number' name='available'>";
             echo "<tr><td>Date Created<td><input type = datetime-local name = dateCreated>";
			 echo "<tr><td>Status<td><select name = status>
             <option value='1'> Free </option>
             <option value='2'> On Maintenance </option>
             <option value='3'> Occupied </option></select>";
             echo "<tr><td>Image:<td>";
             echo "<input type='file' name='image'>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
   if ($cmd == 'Create') { 
        $buildingName = $_POST['buildingName'] ;
	    $roomName = $_POST['roomName'] ;
	    $roomType = $_POST['roomType'] ;
	    $slots = $_POST['slots'] ;
	    $available = $_POST['available'] ;
        $dateCreated = $_POST['dateCreated'] ;
		$status = $_POST['status'] ;
        $image = $_POST['image'] ;
        $sql = "INSERT INTO `room_list`(`buildingName`,`roomName`, `roomType`, `slots`, `available`, `dateCreated`, `status`, `image`) 
        VALUES ('$buildingName', '$roomName','$roomType', '$slots', '$available', '$dateCreated', '$status', `image`)";
   	   $result =  mysqli_query($link, $sql);
	   if ($result) 
		   $mess = "New room has been created !";
       else
 		   $mess = "Unable to create room !";
            
      echo "<form action=room-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
      mysqli_close($link);
   }
   
   if ($cmd == 'Delete') { 
      $sql = "SELECT *  FROM room_list where rec_ID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "SELECT *  FROM room_list where rec_ID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);

             $roomName = $row['roomName'] ;
             $buildingName = $row['buildingName'] ;
             $roomType = $row['roomType'] ;
             $status = $row['status'] ;
		     echo "<form action=room-list.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Room";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID<td><input type = text name = rec_ID value = $rec readonly>";
			 echo "<tr><td>Room Name<td><input type = 'text' name = 'roomName' value = '$roomName' readonly>";
             echo "<tr><td>Building Name<td><input type = text name = buildingName value = $buildingName readonly>";
			 echo "<tr><td>Room Type<td><input type = text name = roomType value = $roomType readonly>";
			 echo "<tr><td>Status<td><input type = text name = status value = $status readonly>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }  
  if ($cmd == 'Confirm') { 
      $sql = "DELETE  FROM room_list where rec_ID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) 
		   $mess = "Room successfully deleted !";
	  else
		   $mess = "Unable to delete room!";

		   $sql = "ALTER TABLE room_list AUTO_INCREMENT=1";
		   $result =  mysqli_query($link, $sql);

	  echo "<form action=room-list.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Go Back'></form>";
	  mysqli_close($link); 
  }
?>

<script>
    $(document).ready(function() {
        $('#roomTypeTable').DataTable({
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
                    targets: [1]
                }
            ],
        });
    });
</script>