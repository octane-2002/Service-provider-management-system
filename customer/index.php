<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-image: url("front.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
    }
  </style>
  <title>SERVICE PROVIDER</title>
  <link rel="stylesheet" href="index.css" />
  <style>
    body {
      background-image: url("front.jpg");
    }
  </style>
</head>

<body>
  <?php
  include('connection.php');
  ?>
  <header>
    <div class="main">
      <h1>SERVICE PROVIDER</h1>
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="#">ABOUT</a></li>
      </ul>
      <ul1>
        <li><a href="/spms/admin/adminlogin.php">ADMIN LOGIN</a></li>
        <li>
          <a href="clogin.php">CUSTOMER LOGIN</a>
        </li>
        <li><a href="register.php">CREATE ACCOUNT</a></li>
      </ul1>
    </div>
  </header>
</body>

</html>