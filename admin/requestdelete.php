<?php
	$id=$_GET['service_id'];
    $cus=$_GET['customer_id'];
	include('connection.php');
	mysqli_query($conn,"delete from `request` where customer_id='$cus'and service_id='$id'");
	 header('location:apage.php');
?>