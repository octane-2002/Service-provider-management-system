<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home2.css">
  <title>home</title>
  
</head>

  <body>
    <?php
    session_start();
    $username = $_SESSION['username'];
    ?>
    <div class="container2">   <ul>
      
      <li><a href="#home"><strong>Home</strong></a></li>
      <li><a href="show.php?customer_id=<?php echo $username; ?>"><strong>Requests</strong></a>
      <li><a href="index.php"><strong>Logout</strong></a>

    </ul></div>
   
    <div class="hedding">
      <h1><strong>Services Available</strong></h1>
    </div>
    <?php
   include('connection.php');

    $sql = "SELECT * FROM service";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th >service_id</th>";
      echo "<th>problem</th>";
      echo "</tr>";

     
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["service_id"] . "</td>";
        echo "<td>" . $row["problem"] . "</td>";

        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
 
    <div class="container">
      <h1><strong>Request for service</strong></h1>
      <form action="" method="post">
        <!-- <p>customer_id</p>
        <input type="text" name="customer_id" id="id" placeholder="enter your email id">  -->
        <p>Service_id:</p>
        <?php
        include('connection.php');
        $query = "SELECT service_id FROM service";
        $result = mysqli_query($conn, $query);
        $names = array();
         while ($row = mysqli_fetch_array($result)) {
            $names[] = $row['service_id'];}
        ?>
        <select name="service_id">
        <?php foreach ($names as $name): ?>
            <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
        <?php endforeach; ?>
        </select>
        
        <!-- <input class="text-box" type="text" name="service_id" id="name" placeholder="Enter your username"> -->
        <p>Phone number:</p>
        <input type="text" name="phone_num" id="password" placeholder="Enter the phone number">
        <p>Address:</p>
        <input type="text" name="address" id="address" placeholder="Enter the address ">
        <p>Date:</p>
        <input type="date" name="date" id="date">

        <input type="submit" name="button" value="Submit">
          
      </form>



    </div>
    <?php
    include('connection.php');
    if (isset($_REQUEST['address'])) {

      if ($_REQUEST['service_id'] != "" || $_REQUEST['phone_num'] != "") {
        // session_start();
        $username = $_SESSION['username'];
        // $username = $_REQUEST['customer_id'];
        $service_id = $_REQUEST['service_id'];
        $phone = $_REQUEST['phone_num'];
        $address = $_REQUEST['address'];
        $date = $_REQUEST['date'];
        $sql = "INSERT INTO `request` (`customer_id`, `service_id`, `phone_num`,`address`,`date`) VALUES  ('$username','$service_id','$phone',' $address','$date')";
        try{
        $conn->query($sql);
        

        header("Location: show.php?customer_id=" . $username);
        }
        catch( mysqli_sql_exception){
          
          echo
          "
                   <script>
                     alert(' Invalid phone number: phone number must be 10 digits');
                   </script>
                   ";
        }
      } 
    } 
    else 
    {
      "
                   <script>
                     alert('Fill!');
                   </script>
                   ";
    }

    ?>

  </body>

</html>