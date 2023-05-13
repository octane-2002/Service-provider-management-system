<?php
	include('connection.php');
	$customer_id = $_GET['customer_id'];
	$service_id = $_GET['service_id'];

	$gname=$_POST['phone_num'];
	$glocation=$_POST['address'];
    $opening_time=$_POST['date'];
    // $closing_time=$_POST['ClosingTime'];
 
	mysqli_query($conn,"update `request` set `phone_num`='$gname', `address`='$glocation',`date`='$opening_time'
     where `customer_id`='$customer_id' and service_id='$service_id'");
	 header("Location: show.php?customer_id=" . $customer_id);
?>