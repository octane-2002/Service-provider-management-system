<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="clogin.css">
</head>

<body>
 
  <div class="container">
    <h1>customer Login</h1>
    <form action="" method="post">
      <p>Username</p>
      <input type="text" id="username" name="username" placeholder="enter the username">
      <p>password</p>
      <input type="password" name="password" id="password" placeholder="Enter the password">

      <input type="submit" value="login">
      <a href="index.php">Forgot password?</a>
      <a href="register.php">create new account?</a>
    </form>


  </div>
</body>

</html>

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

if (isset($_POST['password'])) {
  // Get data from form
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM customer WHERE customer_id='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION["logged_in"] = true;
    $_SESSION["username"] = $username;
    header("Location: home.php");
  } else {
    echo
    "
             <script>
               alert('Invalid Username or Password');
             </script>
             ";
  }
}
?>
</body>

</html>