<?php 
    include('../../../student/config.php');
    if (isset($_POST['submit'])) {
		
        $studentid = $_POST["studentid"];
        $name = $_POST["name"];
        $recID = $_POST["recID"];
        $roomName = $_POST["roomName"];
        $roomType = $_POST["roomType"];
        $buildingName = $_POST["buildingName"];
  	   
		$sql1="INSERT INTO student_account (student_id,name,roomName,buildingName,roomType) values ('$studentid','$name','$roomName','$roomType','$buildingName')";
        if (mysqli_query($con, $sql1)) {
            $sql2 = "update student set is_hall='1' where student_id='$studentid' ";

            $con->query($sql2);   
            
			$_SESSION['message'] = "Room assigned succesfully!";
            $style="color:green";
        }
		else {
            $_SESSION['message'] = "Error!";
            $style="color:red";
        }
        
    }
	 
    
?>
    <link type="text/css" rel="stylesheet" href="../../../student/admin/Bootstrap/css/bootstrap.min.css">
    <script src="../../../student/admin/Bootstrap/js/jquery.min.js"></script>
    <script src="../../../student/admin/Bootstrap/js/bootstrap.js"></script>
<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
</head>

<body>

    <h3 style="<?php echo $style;?>" class='text-center mt-3'><b><?php echo $_SESSION['message']; ?></b>
    </h3>
    <div class="container">
        <h1 class="page-header text-center"> Assign Room for Student </h1>

        <div class="container-fluid">
            <form action="create-account.php" id="myForm" method="post">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="margin-top:7px;">
                            <label class="control-label">Student ID:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="studentid" onchange="showUser(this.value);" required>
                                <option value="">Select Student ID</option>
                                <?php
                                $sql="SELECT * FROM student where is_hall='0' ORDER BY student_id ASC ";
                                $query=$con->query($sql);
                                while($row=$query->fetch_array()){
                                    $student_id =$row['student_id'];
                                    ?>
                                <option value="<?php echo $student_id; ?>"><?php echo $student_id; ?> </option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="studentInfo"><b></b></div>
                
                <hr>

              <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" style="margin-top:7px;">
                            <label for="roomName" class="control-label">Room:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="roomName" id="roomName" onchange="showRoom(this.value);" required>
                                <option value="" >Select Room</option>
                                <?php

                                // Connect to the database

                                // Query the database to retrieve the room names
                                $result = mysqli_query($con, 'SELECT roomName FROM room_list');
                                $buildingName = $row['buildingName'];
                                $roomType = $row['roomType'];
      
                                // Generate the options for the dropdown menu
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['roomName'].'">'.$row['roomName'].'</option>';
                            }
                           
                            ?>
                            </select>
                         
                        </div>
                    </div>
                </div>
 
                <hr>

                <div id="roomInfo"><b></b></div>

                <center>
                    <button id="btn" type="submit" name="submit" class="btn btn-success"><i
                            class="fas fa-check-circle"></i>
                        Submit</button>
                </center>

            </form>
        </div>
    </div>

</body>
<style>
    .container-fluid {
        margin-top: 50px;
        padding: 0 250px;
    }

    #btn {
        font-size: 17px;
        margin-top: 30px;
        padding: 20 30;
        outline: none;

    }

    #btn:hover {
        transform: scale(1.03);
    }

    .form-control {
        width: 350px;
    }
</style>

<script type="text/javascript">

    //the function that takes care of the updating
    function showUser(str) {
  if (str == "") {
    document.getElementById("studentInfo").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("studentInfo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get-student-info.php?student_id="+str,true);
    xmlhttp.send();
  }
}

    function showRoom(str) {
  if (str == "") {
    document.getElementById("roomInfo").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("roomInfo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get-room-info.php?roomName="+str,true);
    xmlhttp.send();
  }
}

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>