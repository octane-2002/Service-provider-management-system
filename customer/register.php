<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register1.css">
</head>

<body>
    <?php

    include('connection.php');
    if (isset($_REQUEST['Password'])) {
        $sql = "SELECT customer_id FROM customer where customer_id='" . $_REQUEST['username'] . "'";
        $res = $conn->query($sql);

        if ($res->num_rows == 1) {
            echo
            "
                     <script>
                       alert('email already existed');
                     </script>
                     ";
        } else {

            if ($_REQUEST['username'] != "" || $_REQUEST['Password'] != "") {
                $email = $_REQUEST['email'];
                $username = $_REQUEST['username'];
                $pass = $_REQUEST['Password'];
                $sql = "INSERT INTO `customer` (`customer_id`, `customer_name`, `password`) VALUES  ('$email','$username','$pass')";
                
                if($conn->query($sql)==true)
                {
                    echo
                "
                         <script>
                           alert('Account created');
                         </script>
                         ";
                }
            } else {
                echo
                "
                         <script>
                           alert(' Fill!');
                         </script>
                         ";
            }
        }
    }
    ?>
    <div class="container">
        <h1>Create account</h1>
        <form action="" method="post">
            <p>Email address</p>
            <input type="email" name="email" id="id" placeholder="enter your email id">
            <p>Username</p>
            <input class="text-box" type="text" name="username" id="name" placeholder="Enter your username">
            <p>Password: <i>(should contain atleast 8 charaters with a special charaters)</i></p>
            <input type="password" name="Password" id="password" placeholder="Enter the password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" required>

            <input type="submit" name="button" value="Create account">
            <a href="index.php" class="button">back</a>
        </form>



    </div>

</body>

</html>