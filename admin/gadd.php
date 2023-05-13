<?php
	include('connection.php');
 
	$gid=$_POST['service_id'];
	$gname=$_POST['problem'];
	
	mysqli_query($conn,"insert into `service` (`service_id`,`problem`) VALUES 
    ('$gid','$gname')");
	header('location:services.php');
 
?>
