<?php
	
//connect to the database
include('connection.php');

//get the customer_id and service_id from the query string
$customer_id = $_GET['customer_id'];
$service_id = $_GET['service_id'];

//prepared statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM request WHERE customer_id = ? AND service_id = ?");
$stmt->bind_param("ss", $customer_id, $service_id);

//execute the prepared statement
$stmt->execute();

//redirect to the previous page
header("Location: show.php?customer_id=" . $customer_id);
