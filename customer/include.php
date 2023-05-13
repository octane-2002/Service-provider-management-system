<?php
include('connection.php');
  if (isset($_REQUEST['address'])) {
      
          if ($_REQUEST['service_id'] != "" || $_REQUEST['phone_num'] != "") {
              $username = $_REQUEST['customer_id'];
              $service_id = $_REQUEST['service_id'];
              $phone = $_REQUEST['phone_num'];
              $address = $_REQUEST['address'];
              $date = $_REQUEST['date'];





              
              $sql = "INSERT INTO `request` (`customer_id`, `service_id`, `phone_num`,`address`,`date`) VALUES  ('$username','$service_id','$phone',' $address','$date')";
              $conn->query($sql);
          } else {
              echo "fill";
          }
      }
?>