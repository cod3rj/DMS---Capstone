<?php
session_start();

//connectivity
require('config.php');

//change colg name
$colgdisp = "University of Perpetual Help System Dalta - Las Piñas | Dormitory Management System"  


?>

<html>

<head>
    <title>Dormitory System | Student Portal</title>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .slideshow a#vlb {
            display: none
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="engine/style.css" />
    <script type="text/javascript" src="engine/jquery.js"></script>

</head>

<style type="text/css" media="screen">
    table,th,td {
        border: 2px solid;
        border-collapse: 0px;
        text-align: center;
    }
    #list {
        text-decoration: none;
        color: #FFFFFF;
    }

    #list:hover {
        color: red;
    }

    #horizontalmenu ul {
        padding: 1;
        margin: 1;
        list-style: none;
    }

    #horizontalmenu li {
        float: left;
        position: relative;
        padding-right: 50px;
        padding-left: 10px;
        display: block;
        border: 0px solid #CC55FF;
        border-style: inset;
    }

    #horizontalmenu li ul {
        display: none;
        position: absolute;
       
    }

    #horizontalmenu li:hover ul {
        display: block;
        background: red;
        height: auto;
        width: 8em;
    }

    #horizontalmenu li ul li {
        clear: both;
        border-style: none;
    }
</style>
<table width="950px" align="center" border="1">
    <tbody>
        <tr>
            <th height="39" colspan="2" style="background-color:#0F1E2D">
                <div style="text-align:left;color:#FFFFFF"><b>
                        <font size="+3"><a href="index.php"
                                style="text-decoration:none ; color:#FFFFFF"><?php echo $colgdisp?></a></font>
                    </b>
                    <marquee direction="left" height="100%">
                        <?php echo $disp; ?></marquee>
                </div>
            </th>
        </tr>

        <tr>
            <td height="38" style="background-color:#0F1E2D;">
                <div id="horizontalmenu">
                    <ul>
                        <li><a href="index.php" id="list"><b>HOME</b></a></li>
                        <li><a href="index.php?option=contact" id="list"><b>CONTACT</b></a></li>
                        <li><a href="notice.php" id="list"><b>NOTICE</b></a></li>
                        
                        
                        <?php 
                            if(!isset($_SESSION["student_id"])){
                                echo '<li><a href="index.php?option=agent" id="list"><b>AGENTS</b></a></li>';
                                echo '<li><a href="index.php?option=regs" id="list"><b>REGISTRATION</b></a></li>';
                                echo '<li><a href="index.php?option=login" id="list"><b>LOGIN</b></a> </li>';
                     
                            }
                            else{
                                echo '<li><a href="complaint.php" id="list"><b>COMPLAINTS</b></a> </li>';
                                echo '<li><a href="profile.php" id="list"><b>PROFILE</b></a> </li>';
                                echo '<li><a href="logout.php" id="list"><b>LOGOUT</b></a> </li>';
                            }
                        ?>
                    </ul>
                </div>
            </td>
        </tr>