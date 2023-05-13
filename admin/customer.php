<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="customer.css">
</head>

<body>
	<h1>SERVICE PROVIDER</h1>
	<h2>Customer Details :</h2>
</body>

</html>

<table border="1" class="tt">
	<thead>
		<th>customer_id</th>
		<th>customer name</th>
		



	</thead>
	<tbody>
		<?php
		include('connection.php');
		$query = mysqli_query($conn, "select * from `customer`");
		while ($row = mysqli_fetch_array($query)) {
		?>
			<tr>
				<td><?php echo $row['customer_id']; ?></td>
				<td><?php echo $row['customer_name']; ?></td>
				



			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<a href="apage.php" id="back-button">Back</a>