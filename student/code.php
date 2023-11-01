<?php
session_start();
require 'config.php';

if(isset($_POST['addcomplaint']))
{
    $n_type =$_POST['n_type'];
    $room_building =$_POST['room_building'];
    $notice =$_POST['notice'];
    $date = $_POST['date'];

    $query = "INSERT INTO complaint(n_type,room_building,notice,date) VALUES ('$n_type','$room_building','$notice','$date')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Complaint Created Successfully";
        header("Location: complaint.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Complaint Not Created";
        header("Location: complaint.php");
        exit(0);
    }
}

?>