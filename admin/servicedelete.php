<?php
	$id=$_GET['service_id'];
	include('connection.php');
	mysqli_query($conn,"delete from `service` where service_id='$id'");
	 header('location:services.php');
?>