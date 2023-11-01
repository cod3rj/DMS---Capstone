<?php include 'header.php'; ?>
<style>
	.button {
  background: #white;
  color: black;
  border-radius: 12px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button:hover {
  background: #f45a17;
  color: white;
}
</style>
<body>
<tr>
    <td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top">
        <?php
	@$opt = $_GET['option'];
	if($opt=="")
	{
	?>
        <center>
            <h2><b>
                    <font size="+3"><?php echo $colgdisp;?>
                    </font>
                </b></h2>
        </center>
        <center><img src="images/logo.png" width="350" height="488"></center>
        <p>
            <center>
                <p>&nbsp;</p>
                <p><strong>
                        <font size="+2"><?php echo $colgdisp;?></font>
                    </strong> <b>-</b>
                    <font size="+1"> The University of Perpetual Help System DALTA is a Catholic-oriented, co-educational, private university, with campuses at Las Piñas, Bacoor, Cavite, and Calamba City, Laguna in the Philippines.</font>
                </p>
				<a href = "./../index.html"><input type = "button" class="button" value = "HOMEPAGE"></button></a>
            </center>
        </p><br>
        <?php
    error_reporting(1);
	}
	else{
	switch($opt)
	{
		case 'regs':
		include('registration.php')	;
		break;
		case 'login':
		include('login.php');
		break;
        case 'about':
		include('about.php');
		break;
		case 'contact':
		include('contact.php');
		break;
        case 'agent':
		include('agent.php');
		break;
		case 'gallery':
		include('gallery.php');
		break;
		case 'course':
		include ('course.php');
		break;
		
	}}

	?>


    </td>
    

<!--footer-->
<?php include 'footer.php'; ?>

</tbody>
</table>

</body>
</html>
