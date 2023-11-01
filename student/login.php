<?php

//connectivity
session_start();
require('config.php');


if(isset($_POST['login']))
{
	$Student_id = $_POST['id'];
	$pass = $_POST['upass'];
	$password = md5($pass);
	
    //user check
    $q = "SELECT * FROM student WHERE student_id = '$Student_id' and password='$password'";
    $cq = mysqli_query($con,$q);
    $ret = mysqli_num_rows($cq);
    if($ret>0)
    {
        $_SESSION["student_id"] = $Student_id;
        echo "<script>document.location='profile.php'</script>";
    }
    else
    {
	   echo "<center><h2 style='color:red'>ACCESS DENIED</h2></center>";
    }
}

?>
<html>

<body style="background-color:#E5E5E5">
    <div align="center">
        <form method="post" action="">
            <fieldset style="margin:30px 150px; display:block; background-color: #D8D8D8;">
                <legend>
                    <font size="+2"><strong>Login Panel</strong></font>
                </legend>
                <p><b style="font-size:20px;">Student ID &nbsp;: </b>
                    <input id="inputBX" type="text" name="id" required />*
                </p>
                <p><b style="font-size:20px;">Password &nbsp;&nbsp;&nbsp;: </b>
                    <input id="inputBX" type="password" name="upass" required />*
                </p>
                <p>
                    <input id="btn" type="submit" value="Login" name="login" />
                </p>
            </fieldset>
        </form>
    </div>
    <style>
        #inputBX {
            border-radius: 10px;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 7px;

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
