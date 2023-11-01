<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php 
$link = mysqli_connect("sql306.epizy.com","epiz_33104467","6kH08GZxCQ6tMp","epiz_33104467_dormitory_db");

//Student count
$sql = "SELECT * FROM tbl_students";
if ($result = mysqli_query($link, $sql)) {
    // Return the number of rows in result set
    $studcount = mysqli_num_rows( $result );
 }

//Room count
 $sql = "SELECT * FROM room_list";
 if ($result = mysqli_query($link, $sql)) {
     // Return the number of rows in result set
     $roomcount = mysqli_num_rows( $result );
  }

//TimeINOUT count
 $sql = "SELECT * FROM attendance WHERE DATE(LOGDATE) = CURDATE() ORDER BY attendance_id DESC";
 if ($result = mysqli_query($link, $sql)) {
     // Return the number of rows in result set
     $timeinout = mysqli_num_rows( $result );
  }
  
//Attendance count
 $sql = "SELECT * FROM attendance";
 if ($result = mysqli_query($link, $sql)) {
     // Return the number of rows in result set
     $attendancecount = mysqli_num_rows( $result );
  }

//Complaint count
$sql = "SELECT * FROM complaint";
if ($result = mysqli_query($link, $sql)) {
    // Return the number of rows in result set
    $complaintcount = mysqli_num_rows( $result );
 }

//Notice count
$sql = "SELECT * FROM notice";
if ($result = mysqli_query($link, $sql)) {
    // Return the number of rows in result set
    $noticecount = mysqli_num_rows( $result );
 }

?>

<hr>
<hr>
    <!-- cards -->
    <div class = "cardBox">
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($roomcount);?></div>
                <div class = "cardName">Number of Room</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="bed-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($studcount);?></div>
                <div class = "cardName">Registered Students</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="body-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($complaintcount);?></div>
                <div class = "cardName">Complaint/s</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="body-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($noticecount);?></div>
                <div class = "cardName">Notice/s</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="body-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($timeinout);?></div>
                <div class = "cardName">Number of In/Out Today</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="key-outline"></ion-icon>
            </div>
        </div>
        <div class = "card">
            <div>
                <div class = "numbers"><?php echo($attendancecount);?></div>
                <div class = "cardName">Number of Attendance</div>
            </div>
            <div class = "iconBx">
            <ion-icon name="bulb-outline"></ion-icon>
            </div>
        </div>
    </div>

    <div class = "details">
    <!--recent bookings-->
        <div class = "recentBookings">
            <div class = "cardHeader">
                <h2>Recent Accounts</h2>
                <a href="#" class = "btn">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td align = center>Student ID</td>
                        <td align = center>Name</td>
                        <td align = center>Room Name</td>
                        <td align = center>Room Type</td>
                        <td align = center>Building Name</td>
                        <td align = center>Status</td>
                        <td align = center>Date Created</td>
                    </tr>
                </thead>

                <tbody>
                 
    <?php 
//Recent Bookings
  $sql="SELECT * FROM student_account ORDER BY student_id DESC LIMIT 5 ";
  $result =  mysqli_query($link, $sql);
  $count=mysqli_num_rows($result);

  if($count>0)
  {
    
	 $var_status = [0 => '', 1 => 'Active', 2 => 'Inactive'];
     while($row=mysqli_fetch_assoc($result))
     {
         $student_id=$row['student_id'];
         $name=$row['name'];
         $roomName=$row['roomName'];
         $roomType=$row['roomType'];
         $buildingName=$row['buildingName'];
         $status=$row['status'];
         $dateCreated=$row['dateCreated'];

                    echo "<tr>";
                    echo "<td align = center>" . $row['student_id'] . "</td>";
                    echo "<td align = center>" . $row['name'] . "</td>";
                    echo "<td align = center>" . $row['roomName'] . "</td>";
                    echo "<td align = center>" . $row['roomType'] . "</td>";
                    echo "<td align = center>" . $row['buildingName'] . "</td>";
                    if($status=='1')
                            {
                                echo "<td align = center><span class='approved'>" . $var_status[$row['status']] . "</span></td>";
                            }
                            else
                            {
                                echo "<td align = center><span class='pending'>" . $var_status[$row['status']] . "</span></td>";
                            }
                    //echo "<td>" . $var_reqStatus[$row['reqStatus']] . "</td>";
                    echo "<td>" . $row['dateCreated'] . "</td>";
                    echo "</tr>";
       }
    }
    ?>
    
        </tbody>
    </table>
</div>

        <!-- recent tenant -->
        <div class = "recentTenant">
            <div class = "cardHeader">
                <h2>Recent Tenant</h2>
            </div>

<?php 
//Recent Tenants
  $sql="SELECT * FROM student ORDER BY student_id DESC LIMIT 5 ";
  $result =  mysqli_query($link, $sql);
  $count=mysqli_num_rows($result);

  if($count>0)
  {
     while($row=mysqli_fetch_assoc($result))
     {
         $first_name=$row['name'];
         $last_name=$row['dept'];
    
?>
            <table>

                <?php 
         echo "<tr>";
         echo "<td width = '60px'><div class = 'imgBx'><img src = 'images/user.png'></div></td>";
         echo "<td><h4>" . $row['name'] . "<br><span>" . $row['dept'] . "</span></h4></td>";
         echo "</tr>";
    }
    }
    ?>

               
            </table>
        </div>
    </div>
</div>
</div>    

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>