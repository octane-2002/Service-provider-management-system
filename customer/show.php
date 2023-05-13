 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "spms";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db_name);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$username = $_GET['customer_id'];

	?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="UTF-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Gallery</title>
 	<link rel="stylesheet" href="show2.css">
 </head>

 <body>
 	<div>
 		<table border="1" class="tt">
 			<thead>
 				<th>customer id</th>
 				<th>Service id</th>
 				<th>Phone Number</th>
 				<th>Address</th>
 				<th>Date</th>
 				<th>Actions</th>
 			</thead>
 			<tbody>
 				<?php

					$query = mysqli_query($conn, "SELECT * FROM request where customer_id='$username'");
					while ($row = mysqli_fetch_array($query)) {
					?>
 					<tr>
 						<td><?php echo $row['customer_id']; ?></td>
 						<td><?php echo $row['service_id']; ?></td>
 						<td><?php echo $row['phone_num']; ?></td>
 						<td><?php echo $row['address']; ?></td>
 						<td><?php echo $row['date']; ?></td>
 						<td>
 							<a href="gedit.php?service_id=<?php echo $row['service_id']; ?>&customer_id=<?php echo $row['customer_id']; ?>">Edit</a>
 							<a href="gdelete.php?service_id=<?php echo $row['service_id']; ?>&customer_id=<?php echo $row['customer_id']; ?>">Delete</a>

 						</td>
 					</tr>
 				<?php
					}
					?>
 				<a type="back-button" href="home.php">Back</a>
 			</tbody>
 		</table>
 	</div>

 	</div>

 	<br>


 	</div>
 </body>

 </html>