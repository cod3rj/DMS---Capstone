<?php
session_start();
//connectivity
require('config.php');
include "header.php";

if(isset($_SESSION["student_id"]) && isset($_GET['id'])){
    
    $student_id = $_GET["id"];
    $query = "SELECT * FROM student WHERE student_id = '$student_id' ";
    $query_result = mysqli_query($con,$query);
    if (!$query_result) {
		die("view_add_query_result failed ".mysqli_error($con));
    }
    $row=mysqli_fetch_assoc($query_result);
        
    $id=$row['student_id'];
    $name=$row['name'];
	$dept=$row['dept'];
	$mobile=$row['cnumber'];
	$address=$row['address'];
	$image=$row['image'];

	if(isset($_POST['update']))
    {
		$s_name = $_POST["s_name"];
        $s_dept = $_POST["s_dept"];
		$s_mobile = $_POST["s_mobile"];
		$s_address = $_POST["s_address"];
		$s_image = $_POST["s_image"];

		$fileinfo=PATHINFO($_FILES["s_image"]["name"]);
	    if (empty($fileinfo['filename'])){
		    $location = $image;
	    }
	    else{
		    unlink($image);  //delete previus image from device
		
		    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		    move_uploaded_file($_FILES["s_image"]["tmp_name"],"images/" . $newFilename);
		    $location="images/" . $newFilename;
	    }

		$sql2="update student set name='$s_name', dept='$s_dept', cnumber='$s_mobile', address='$s_address', image='$location' where student_id='$student_id'";
	    $con->query($sql2);
		?> <script type="text/javascript">
            window.alert("Profile Updated Successfully!");
            window.location.href = 'profile.php';

        </script>
        <?php	

	}
}



?>


<tr>
	<td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top;padding:10px">

		<div class="payBdy">
			
			<div class="frm">

				<form method="post" action="" enctype="multipart/form-data">
					<fieldset style="display:block; padding:30px; background-color: #D8D8D8;">
						<legend>
							<font size="+2"><strong>Update profile</strong></font>
						</legend>
						<p?><b>Student ID : </b>
							<input id="inputBOX" type="text" name="s_id" value="<?php echo $student_id; ?>" required readonly/>
							</p>
							<p><b>Name : </b>
								<input id="inputBOX" type="text" name="s_name" value="<?php echo $name; ?>" required />*
							</p>
							<p><b>Dept : </b>
								<input id="inputBOX" type="text" name="s_dept" value="<?php echo $dept; ?>" required />*
							</p>
							<p><b>Mobile : </b>
								<input id="inputBOX" type="text" name="s_mobile" value="<?php echo $mobile; ?>"
									required />*
							</p>
							<p><b>Address : </b>
								<input id="inputBOX" type="text" name="s_address" value="<?php echo $address; ?>"
									required />*
							</p>
							<p><b>Image:
									<input style="display:inline;margin-top:10px;" type="file" name="s_image" /></b>
							</p>


							<p>
								<input id="btn" type="submit" name="update" value="Update">
							</p>
					</fieldset>

				</form>
			</div>
		</div>


	</td>

</tr>
<?php include "footer.php"; ?>
<style>
	.glyphicon {
		margin-bottom: 10px;
		margin-right: 10px;
	}

	small {
		display: block;
		line-height: 1.428571429;
		color: #999;
	}

	#profileimg {
		height: 280px;
		border-radius: 10%;
		padding: 10px;
	}

	.well-sm {
		border-radius: 10px;
		-webkit-box-shadow: 2px 2px 40px .5px rgba(0, 0, 0, 0.30);
		box-shadow: 2px 2px 40px .5px rgba(0, 0, 0, 0.30);

	}

	#profile_btn {
		padding: 10px 20px;
		border-radius: 20px;
		float: right;
		margin-right: 10px;
		border: none;
		outline: none;
		background-color: #D8BFD8;
	}

	#profile_btn a {
		text-decoration: none;
		color: #000000;
	}

	.payBdy {
		padding: 10px;
		background-color: #D8D8D8;
		font-size: 18px;
	}

	.frm {
		width: 400px;
		margin: auto;

	}

	#inputBOX {
		border-radius: 10px;
		font-size: 14px;
		outline: none;
		border: none;
		padding: 7px;
		float: right;
	}

	#btn {
		font-size: 18px;
		padding: 8px 40px;
		border-radius: 20px;
		border: none;
		margin-top: 30px;
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
</tbody>
</table>

</html>