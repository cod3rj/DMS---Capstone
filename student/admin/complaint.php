<?php 

    include('header.php'); 
    $_SESSION['message'] = '';

if(isset($_GET['id'])){  // message color code
    $idd=$_GET['id'];
   
    if($idd==2){
	    $_SESSION['message'] = "Notice Added successfully !!";
		$style="color:green";
    }
	if($idd==3){
		$_SESSION['message'] = "Update successfully !!";
		$style="color:green";
	}
    if($idd==4){
	    $_SESSION['message'] = "Delete successfully!!";
		$style="color:red";
    }
}
else{
	 
    $_SESSION['message'] = '';
	$style="color:red";
}	

 
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
</head>

<body>
    <h3 style="<?php echo $style;?>" class='text-center mt-3'><b><?php echo $_SESSION['message']; ?></b>
    </h3>
    <div class="container">
        <h1 class="page-header text-center">STUDENT COMPLAINTS</h1>
        <div class="row">
        </div>
        <div style="margin-top:10px;">
            <style>
                th {
                    background: #FAEBD7;
                    position: sticky;
                    top: 0;
                    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);

                }
            </style>
            <table class="table table-striped table-bordered">

                <?php
                $sql="select * from complaint";
                $query=$con->query($sql);
                if(mysqli_num_rows($query)==0){
                    echo "<h3 class='text-center mt-3' style='color:red'>No notice available</h3>";
            
                }
                else{?>
                
                <thead>
                    <th style="font-size:17px;width:150px">Complaint Title</th>
                    <th style="font-size:17px;width:200px">Building and Room #</th>
                    <th style="font-size:17px;max-width:500px">Complaint</th>
                    <th style="font-size:17px">Date</th>
                    <th class="text-center" style="font-size:17px">Action</th>
                </thead>

                <?php
                    while($row=$query->fetch_array()){
                        
                        $notice_id = $row['notice_id']; 
                        $notice_title = $row['n_type'];  
                        $room_building = $row['room_building']; 
                        $notice = $row['notice'];
                        $date = $row['date'];
           
                    ?>

                <tbody>
                    <tr>
                        <td style="font-size:17px"><?php echo $notice_title; ?></td>
                        <td style="font-size:17px"><?php echo $room_building; ?></td>
                        <td style="font-size:17px;max-width:400px"><?php echo $notice; ?></td>
                        <td style="font-size:17px"><?php echo $date; ?></td>
                        <td class="text-center">
                            <a href="#editnotice<?php echo $row['notice_id']; ?>" data-toggle="modal"
                                class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            ||
                            <a href="#deletenotice<?php echo $row['notice_id']; ?>" data-toggle="modal"
                                class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            <?php include('complaint_modal.php'); ?>
                        </td>
                    </tr>
                </tbody>

                <?php
                    }
                }
              ?>

            </table>
        </div>
    </div>
    <?php include('modal.php'); ?>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>