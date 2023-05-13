<!DOCTYPE html>
<html>
<link rel="stylesheet" href="services.css" />
<h1>SERVICE PROVIDER</h1>

<div class="main-content">

	<div id="body2">
		<div class="gal">
			<h2></h2>
		</div>
		<h2>ADD A NEW SERVICE :</h2>
		<div class="entry">
			<form method="POST" action="gadd.php">
				<div class="top"><label>Name:</label><input type="text" name="service_id"></div>
				<div class="top"><label>Description:</label><input type="text" name="problem"></div>
				<div class="top"><input type="submit" name="add"></div>
			</form>
		</div>

		<div>
			<table border="1" class="tt">
				<thead>
					<th>Service_id</th>
					<th>Problem</th>

					<th>Actions</th>
				</thead>
				<tbody>
					<?php
					include('connection.php');
					$query = mysqli_query($conn, "select * from `service`");
					while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $row['service_id']; ?></td>
							<td><?php echo $row['problem']; ?></td>


							<td>

								<a href="servicedelete.php?service_id=<?php echo $row['service_id']; ?>">Delete</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<a type="button" href="apage.php">Back</a>



		</div>

	</div>
</div>

</html>