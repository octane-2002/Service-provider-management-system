<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
<!-- <form action="login.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username">
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password">
  <br><br>
  <input type="submit" value="Login">
</form>  -->
<div class="container">
        <h1>admin Login</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" id="username" name="username" placeholder="enter the username">
            <p>password</p>
            <input type="password" name="password" id="password" placeholder="Enter the password">

            <input type="submit" value="login">
            
            
        </form>

        
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="spms";
// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['password'])){
// Get data from form
$username = $_POST["username"];
$password = $_POST["password"];

// Check if username and password match a record in the database
$sql = "SELECT * FROM admin WHERE admin_id='$username' AND admin_pass='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    session_start();
    $_SESSION["logged_in"] = true;
    $_SESSION["username"] = $username;
    header("Location: apage.php");
} else {
    // Login failed
    echo
             "
             <script>
               alert('Invalid Username or Password');
             </script>
             ";
}


$conn->close();
}
?>
</body>
</html>