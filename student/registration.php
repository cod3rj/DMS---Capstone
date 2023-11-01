<?php
//connectivity
require('config.php');

//captcha
$num1 = range(9,0);
$num2 = range(9,0);
$rnum1 = array_rand($num1);
$rnum2 = array_rand($num2);
$n1 = $num1[$rnum1];
$n2 = $num2[$rnum2];
$sum = $n1 + $n2;
$res = $n1." + ".$n2;

if(isset($_POST['submit']))
{
    if($_POST['c1']==$_POST['c2'])
    {
        $StudentID = $_POST["student_id"];
        $Name = $_POST["name"];
        $Dept = $_POST["dept"];
  	    $Password = md5($_POST["password"]);
  	    $gender = $_POST["gender"];
        $MobileNo = $_POST["cnumber"];
        $Address = $_POST["address"];
        $image = $_POST["image"];
  	   
	
       //check user if already exists
        $q = "SELECT * FROM student WHERE student_id='$StudentID'";
        $cq = mysqli_query($con,$q);
        $ret = mysqli_num_rows($cq);
        if($ret == true)
        {
            echo "<center><h2 style='color:red'>User already exists</h2></center>";
        }//insert into database
        else
        {
            $fileinfo=PATHINFO($_FILES["image"]["name"]);  //photo upload
            if(empty($fileinfo['filename'])){
                $location="";
            }
            else{
            $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $newFilename);
            $location="images/" . $newFilename;
            }

	        $query = "INSERT INTO student(student_id,name,dept,password,gender,cnumber,address,is_hall,image) VALUES ('$StudentID','$Name','$Dept','$Password','$gender','$MobileNo','$Address',0,'$location')";
	        mysqli_query($con,$query);
            echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
        }
    }
    else
    {
	    echo '<script>alert("Wrong Verification Code, try again!")</script>';
    }
}


?>
<html>

<head>
    <script>
        function go() {
            document.location = './login.php';
        }

        function refresh() {
            document.location = './index.php?option=regs';
        }
    </script>
</head>

<body style="background-color:#E5E5E5">
    <div style="margin:30px;font-size:20px">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset style="display:block; padding:30px; background-color: #D8D8D8;">
                <legend>
                    <font size="+2"><strong>Registration</strong></font>
                </legend>
                <p><b>Student ID : </b>
                    <input id="inputBOX" type="text" name="student_id" required placeholder="Enter Your Student ID" />*
                </p>
                <p><b>Name : </b>
                    <input id="inputBOX" type="text" name="name" required placeholder="Enter Your name" />*
                </p>
                <p><b>Department : </b>
                    <input id="inputBOX" type="text" name="dept" required placeholder="Enter Your Dept" />*
                </p>
                <p><b>Password : </b>
                    <input id="inputBOX" type="password" name="password" required placeholder="Password Here..." />*
                </p>

                <p><b>Mobile No. : </b>
                    <input id="inputBOX" type="text" name="cnumber" required placeholder="Enter Your Mobile" />*
                </p>
                <b>Address : </b>
                <input id="inputBOX" name="address" placeholder="Enter Your Address" required><br><br>
                <p><b>Gender : </b>
                    <input type="radio" name="gender" value="Male">Male &nbsp;
                    <input type="radio" name="gender" value="Female">Female

                </p>
                <p><b>Image : </b>
                    <input type="file" name="image">
                </p>

                <fieldset style="display: inline-flex; background-color: #D8D8D8;">
                    <legend><strong>Verification</strong></legend>
                    <p><?php
                      error_reporting(1);
                      echo $res." = ";
                    ?>
                        <input type="hidden" name="c1" value="<?php echo $sum; ?>">
                        <input id="inputBOXdf" type="text" name="c2" autofocus placeholder="Enter Sum">*
                    </p>
                </fieldset><br>
                <p>
                    <input id="btn" type="submit" name="submit" value="Register">&nbsp;
                    <input style="margin-left:20px;" id="btn" type="reset" onClick="refresh()">
                </p>
            </fieldset>

        </form>
    </div>


    <style>
        #inputBOXdf {
            border-radius: 10px;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 7px;
        }

        #inputBOX {
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            border: none;
            padding: 8px;
            float: right;
            margin-right: 320px;

        }

        #btn {
            font-size: 18px;
            padding: 8px 40px;
            border-radius: 20px;
            border: none;
            margin-top: 10px;
            background-color: #4E4E4E;
            color: white;
            outline: none;
        }

        #btn:hover {
            background-color: #785DF9;
            transform: scale(1.06);
            cursor: pointer;
        }
    </style>
</body>

</html>