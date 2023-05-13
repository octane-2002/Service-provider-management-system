<!DOCTYPE html>
<html>
<link rel="stylesheet" href="apage.css" />
<div class="dashboard-container">
  <div class="sidebar">
    <nav>
      <ul>

        <li><a href="services.php">Services</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="serviceprovided.php">Service Provided</a></li>
      </ul>
    </nav>
  </div>
  <div class="main-content">
    <header>
      <h1>SERVICE PROVIDER</h1>
      <h2>Dashboard</h2>
    </header>
    <a href="services.php" class="big-button">Add Services</a>
    <a href="customer.php" class="big-button">Customers Details</a>
    <div class=container1>
      <p><strong>list of Requests</strong></p>

    </div>
    <table border="1" class="tt">
      <thead>
        <th>Customer_id</th>
        <th>Service_id</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>status</th>

        <th>Actions</th>
      </thead>
      <tbody>
        <?php
        include('connection.php');
        $query = mysqli_query($conn, "select * from `request`");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['service_id']; ?></td>
            <td><?php echo $row['phone_num']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['date']; ?></td>


            <td>
              <a href="assign.php?service_id=<?php echo $row['service_id']; ?>&customer_id=<?php echo $row['customer_id'];?>">Assign</a>
              <a href="requestdelete.php?service_id=<?php echo $row['service_id']; ?>&customer_id=<?php echo $row['customer_id']; ?>">Delete</a>
            </td>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>



  </div>
</div>

</html>