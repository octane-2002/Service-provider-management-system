<?php
include('connection.php');

//get the customer_id and service_id from the query string
$customer_id = $_GET['customer_id'];
$service_id = $_GET['service_id'];

$query = mysqli_query($conn, "select * from `request` where customer_id='$customer_id' and service_id='$service_id'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Gallery</title>
	<link rel="stylesheet" href="gedit.css">
</head>

<body>
	<div id="body1">
		<div class="title">
			<h1> Service Provider</h1>
		</div>



	</div>

	</div>
	<div class="gal">
		<h3> <u>Update</u> </h3>
	</div>
	<div class="entry">
		<form method="POST" action="gupdate.php?customer_id=<?php echo $customer_id; ?>&service_id=<?php echo $service_id; ?>">



			<div class="top"><label>Phone Number:</label><input type="text" <?php echo $row['phone_num']; ?> name="phone_num"></div>
			<div class="top"><label>Address:</label><input type="text" <?php echo $row['address']; ?> name="address"></div>
			<div class="top"><label>Date:</label><input type="date" <?php echo $row['date']; ?> name="date"></div>

			<div class="top"><input type="submit" name="add"></div>
			<div class="top"><a href="home.php">Back</a></div>
			<br><br><br>

		</form>
	</div>

</body>

</html>