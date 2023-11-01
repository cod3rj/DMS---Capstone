<?php require("../connect.php");?>
<html>
<head>

    <title>Dormitory System | Booking</title>

<style>
 body {
  margin: 0 auto;
}

div.elem-group {
  margin: 20px 0;
}

div.elem-group.inlined {
  width: 49%;
  margin-left: auto;
  margin-right: auto;
}

label {
  display: block;
  color: white;
  font-family: "Trebuchet MS";
  padding-bottom: 10px;
  font-size: 1.25em;
}

input, select, textarea {
  border-radius: 2px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: "Trebuchet MS";
  width: 100%;
  padding: 10px;
}

div.elem-group.inlined input {
  width: 100%;
  display: inline-block;
}

textarea {
  height: 250px;
}

hr {
  border: 1px dotted #ccc;
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

h1{
color: white;
font-family: "Trebuchet MS";
}

table {
    background:#2d343b;
    margin: 10 auto;
    width: 700px;
    padding: 25px;
    }
    
.header {
	padding: 25px;
	margin: -28px -28px -30px;
	background: #1a1f24;
}

</style>

</head>
<body>

<?php
            /*
            if(isset($_POST['submit']))
            {
                $fname=$_POST['fname'];
                $email=$_POST['email'];
                $contactNum=$_POST['contactNum'];
                $address=$_POST['address'];
                $reqRoomType=$_POST['reqRoomType'];
                $reqCreatedDate=date("Y-m-d h:i:sa");
                $reqStatus="Pending";
                $reqNotes=$_POST['reqNotes'];

                $sql="INSERT INTO bookings_list SET
                fname='$fname',
                email='$email',
                contactNum='$contactNum',
                address='$address',
                reqCreatedDate='$reqCreatedDate',
                reqStatus='$reqStatus',
                reqNotes='$reqNotes'
                "; 
                }*/

                $cmd   = "";
                $rec = 1;
                if (isset($_GET['cmd'])) {
                    $cmd   = $_GET['cmd'];
                }
                if (isset($_POST['cmd'])) {
                    $cmd   = $_POST['cmd'];
                }

                if(isset($_POST['submit'])) { 
                $fname=$_POST['fname'];
                $email=$_POST['email'];
                $contactNum=$_POST['contactNum'];
                $address=$_POST['address'];
                $reqRoomType=$_POST['reqRoomType'];
                $reqCreatedDate=date("Y-m-d h:i:sa");
                $reqStatus= 1;
                $reqNotes=$_POST['reqNotes'];

                $sql = "INSERT into bookings_list(fname,email,contactNum,address,reqRoomType,reqCreatedDate,reqStatus,reqNotes) 
	                         values ('$fname','$email','$contactNum','$address','$reqRoomType','$reqCreatedDate','$reqStatus','$reqNotes')";
   	            $result =  mysqli_query($link, $sql);

                 if($result==true)
                 {
                    header('location: confirmbooking.php');
                 }
                 else
                 {
                    header('location: confirmbooking.php');
                 }
    }    
        ?>

<link rel="stylesheet" type="text/css" href="../css/styles.css" />

</head>
<body>
<div id="page1">
  <div id="header">
    <div id="section">
      <div><a href="../index.html"><img src="../images/logo.png" alt="" /></a></div>
      <span><img src="../images/perp.png" style="width:100px;height:130px;position:absolute;right:650px;bottom:50px;"/> </span> </div>
    <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="room.html">Rooms</a></li>
          <li class="current"><a href="booking.php">Book Now!</a></li>
          <li><a href="floor.html">Floor Plan</a></li>
          <li><a href="../student/index.php">Student</a></li>
          <li><a href="../admin/dtr_panel/index.php">Admin</a></li>
    </ul>
  </div>

<form action = booking.php method="POST" class = "booking">
<table align = center style="border:2px solid black;">
<td>

<div class = "header">
<h1 align = center>MAKE YOUR RESERVATION</h1>
</div>

<br>

  <div class="elem-group">
    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="fname" >
  </div>
  <div class="elem-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="example@example.com" >
  </div>
  <div class="elem-group">
    <label for="contactNum">Contact Number</label>
    <input type="tel" id="contactNum" name="contactNum">
  </div>
  <div class="elem-group">
    <label for="address">Address</label>
    <input type="text" id="address" name="address">
  </div>
  <hr>
  <div class="elem-group">
    <label for="reqRoomType">Select Room Type</label>
    <select id="reqRoomType" name="reqRoomType" required>
        <option value="">Choose a Room</option>
        <option value="Twin Sharing">Twin Sharing</option>
        <option value="4 Sharing">4 Sharing</option>
        <option value="6 Sharing">6 Sharing</option>
    </select>
  </div>
  <div class="elem-group inlined">
    <label for="reqCreateDate">Reservation Date</label>
    <input type="date" id="reqCreateDate" name="reqCreateDate" required>
  </div>
  <hr>
  <div class="elem-group">
    <label for="reqNotes">Anything Else?</label>
    <textarea id="reqNotes" name="reqNotes" placeholder="Tell us anything else that might be important." required></textarea>
  </div>

  <button type="submit" name="submit" value = "submit" name = cmd>Book The Rooms</button>
  </form>
</td>
</table>

  <div id="footer">
    <div>
      <div id="connect"> <a href="#"><img src="../images/dlogo.png" style="width:300px;height:70px;position:absolute;bottom:-40px;left:-100px;" /></a>  </div>
      <div class="section">
        <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="room.html">Rooms</a></li>
          <li><a href="booking.php">Book Now!</a></li>
          <li><a href="floor.html">Floor Plan</a></li>
          <li><a href="../student/index.php">Student Portal</a></li>
          <li><a href="admin/dtr_panel/index.php">Admin</a></li>
        </ul>
        <p>Copyright &copy; <a href="#">Perpetual</a> - All Rights Reserved | Created By <a target="_blank" href="#!">Group of Dela Vega</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>