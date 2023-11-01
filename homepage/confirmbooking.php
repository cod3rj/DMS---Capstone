<?php require("../connect.php");?>
<html lang="en">
<head>

    <title>Dormitory System | Booking Confirmation</title>

    <link rel="stylesheet" type="text/css" href="../css/styles.css" />

<style>
h1{
font-family: "Trebuchet MS";
}

table {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align:center;
  background:#2d343b;
  font-family: "Trebuchet MS";
  color: white;
  margin: 0 auto;
  padding: 10px;
  width: 500px;
}

button {
  height: 50px;
  background: #f45a17;
  border: none;
  color: white;
  font-size: 1.25em;
  font-family: "Trebuchet MS";
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  border: 2px solid black;
}

.header {
	padding: 25px;
	margin: -15px -15px -15px;
	background: #1a1f24;
}

</style>

</head>
<body>
    
<div id="page1">
  <div id="header">
    <div id="section">
      <div><a href="../index.html"><img src="../images/logo.png" alt="" /></a></div>
      <span><img src="../images/perp.png" style="width:100px;height:130px;position:absolute;right:650px;bottom:50px;"/> </span> </div>
    <ul>
          <li><a href="../index.html" disabled>Home</a></li>
          <li><a href="room.html" disabled>Rooms</a></li>
          <li class="current"><a href="confirmbooking.php" disabled>Book Now!</a></li>
          <li><a href="floor.html" disabled>Floor Plan</a></li>
          <li><a href="../admin/dtr_panel/index.php" disabled>Log-In</a></li>
    </ul>
  </div>

    <?php
    require("../connect.php");
    $sql="SELECT * FROM bookings_list ORDER BY recID DESC LIMIT 1 ";
	$result =  mysqli_query($link, $sql);
    $count=mysqli_num_rows($result);

    if($count>0)
    {
        
       while($row=mysqli_fetch_assoc($result))
       {
           $fname=$row['fname'];
           $email=$row['email'];
           $contactNum=$row['contactNum'];
           $address=$row['address'];
           $reqRoomType=$row['reqRoomType'];
           $reqCreatedDate=$row['reqCreatedDate'];
           $reqNotes=$row['reqNotes'];
           ?>

<table align = center style="border:2px solid black;">
<td>

        <div class = "header">
          <h1>CONFIRMATION</h1>
        </div>

        <br>

            <h3>Full Name <?php echo $fname;?></h3>
            <h3>Email: <?php echo $email;?></h3>
            <h3>Contact Number: <?php echo $contactNum;?></h3>
            <h3>Address: <?php echo $address;?></h3>
            <h3>Room Type: <?php echo $reqRoomType;?></h3>
            <h3>Date of Reservation: <?php echo $reqCreatedDate;?></h3>
            <h3>Request Notes: <?php echo $reqNotes;?></h3>
     
<br>

<a href="booking.php"> <button>Confirm</button> </a>

</td>
</table>

           <?php
       }
    }
   ?>


<div id="footer">
    <div>
      <div id="connect"> <a href="#"><img src="../images/dlogo.png" style="width:300px;height:70px;position:absolute;bottom:-40px;left:-100px;" /></a>  </div>
      <div class="section">
        <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="room.html">Rooms</a></li>
          <li><a href="booking.php">Book Now!</a></li>
          <li><a href="floor.html">Floor Plan</a></li>
          <li><a href="admin/dtr_panel/index.php">Log-In</a></li>
        </ul>
        <p>Copyright &copy; <a href="#">Perpetual</a> - All Rights Reserved | Created By <a target="_blank" href="#!">Group of Dela Vega</a></p>
      </div>
    </div>
  </div>
</div>


</body> 
</html>