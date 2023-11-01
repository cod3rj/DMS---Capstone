<?php
session_start();
//connectivity
require('config.php');
if(isset($_SESSION["student_id"])){
    
    $student_id = $_SESSION["student_id"];
    $query = "SELECT * FROM student WHERE student_id = '$student_id' ";
    $query_result = mysqli_query($con,$query);
    if (!$query_result) {
		die("view_add_query_result failed ".mysqli_error($con));
    }
    $row=mysqli_fetch_assoc($query_result);
        
    $id=$row['student_id'];
    $name=$row['name'];
	$dept=$row['dept'];
	$gender=$row['gender'];
	$mobile=$row['cnumber'];
	$address=$row['address'];
	$is_hall=$row['is_hall'];
	$image=$row['image'];

	if($is_hall == 1){
		$query2 = "SELECT * FROM room_list join student_account WHERE student_account.student_id = room_list.rec_ID";
		$query_result2 = mysqli_query($con,$query2);
		if (!$query_result2) {
			die("view_add_query_result failed ".mysqli_error($con));
		}
		$row2 =mysqli_fetch_assoc($query_result2);
		
		$roomName = $row2['roomName'];
		$buildingName = $row2['buildingName'];
		$roomType = $row2['roomType'];
	}
  
}

include "header.php";
?>


<tr>
	<td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top;padding:10px">

		<script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
			id="bootstrap-css">
		<!------ Include the above in your HEAD tag ---------->
		<center>
			<h3>Welcome <?php echo $name; ?></h3>
		</center>
		<br>
		<div class="well well-sm" style="margin:0px 120px;padding:10px">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<img id="profileimg" src="<?php echo $image; ?>" alt="" class="img-rounded img-responsive" />
					<center>
						<button Type="button" id="profile_btn"><a href="edit_profile.php?id=<?php echo $id;?>"><i class="fas fa-user-edit"></i> Edit Profile </a></button>
					</center>
				</div>
				<div class="col-sm-6 col-md-8">
					<h3 style="color:#B8860B"><b>Profile Information</b></h3>

					<h4>Name: <b style="color:#2E8B57"><?php echo $name; ?></b></h4>
					<p><cite title="<?php echo $address; ?>"><i class="fas fa-map-marker-alt"></i>
							<?php echo $address; ?></p>
					<p><i class="fas fa-phone"></i> <?php echo $mobile; ?></p>
					<p><i class="far fa-address-card"></i> ID: <?php echo $id; ?></p>
					<p><i class="fa fa-graduation-cap"></i> Department: <?php echo $dept; ?></p>
					<?php
				    if($is_hall==0){
						echo '<p><i class="fas fa-hotel"></i> Room Name/No.:<b style="color:red"> No Room Yet</b></p>';
					}
					else{
						/*echo '<p><i class="fas fa-hotel"></i> Room Name/No.: '.$roomName.' </p>';
						echo '<p><i class="fas fa-hotel"></i> Building Name/No.: '.$buildingName.' </p>';
						echo '<p><i class="fas fa-hotel"></i> Room Type/No.: '.$roomType.'  </p>';*/
						?>
					<p><i class="fas fa-hotel"></i> Room Name/No.: <?php echo $roomName; ?></p>
					<p><i class="fas fa-hotel"></i> Building Name: <?php echo $buildingName; ?></p>
					<p><i class="fas fa-hotel"></i> Room Type: <?php echo $roomType; ?></p>
					<?php
					}
					?>


				</div>
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
		border: none;
		outline: none;
		margin: 10px;
		background-color: #D8BFD8;
	}

	#profile_btn a {
		text-decoration: none;
		color: #000000;
	}
</style>
</tbody>
</table>

</html>