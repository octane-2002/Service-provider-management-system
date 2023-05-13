<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="services.css" />

</head>

<body>
<div class="nav">
    <h1>Assign service</h1>
</div>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <h3 class="yoyo">Service providers available</h1>
    <style>
        h3{
            display: flex;
            justify-content: center;
        }
    </style>
    <?php
    include('connection.php');
   
	$id=$_GET['service_id'];
    $cus=$_GET['customer_id'];
	mysqli_query($conn,"update `request` set `date`='Approved'
     where `customer_id`='$cus' and service_id='$id'")?>
     <?php
     include('connection.php');

    $sql = "SELECT A.*,B.dept_name FROM service_provider A ,department B where A.dept_id=B.dept_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        // Table headers
        echo "<tr>";
        echo "<th >sp_id</th>";
        echo "<th>sp_name</th>";
        echo "<th >sp_phone</th>";
        echo "<th >dept_id</th>";
        echo "<th >dept_name</th>";

        echo "</tr>";

        // Table data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["sp_id"] . "</td>";
            echo "<td>" . $row["sp_name"] . "</td>";
            echo "<td>" . $row["sp_phone"] . "</td>";
            echo "<td>" . $row["dept_id"] . "</td>";
            echo "<td>" . $row["dept_name"] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
    <div class="main-content1">

        <div id="body2">
            <div class="gal">
                <h2></h2>
            </div>
            <div class="entry">
                <form method="POST" action="">
                    <div class="top"><label>sp_id:</label><input type="text" name="sp_id"></div>
                    <div class="top"><label>Assigning date:</label><input type="date" name="date"></div>



                    <div class="top"><input type="submit" name="add"></div>
                </form>
            </div>
            <?php
            if (isset($_POST['date'])) {
                include('connection.php');
                $service_id = $_GET['service_id'];

                $sp_id = $_POST['sp_id'];
                $date = $_POST['date'];

                $result = mysqli_query($conn, "insert into `provider` (`sp_id`,`service_id`,`servicing_date`) VALUES ('$sp_id','$service_id','$date')");
                if ($result) {
                    echo "worker assigned succesfully";
                } else {
                    echo "Error inserting record: " . mysqli_error($conn);
                }
            }



            ?>
            <a href="apage.php" class="container"><button>Back</button></a>

<style>
   a.container{
    margin-top: 50px;
    display: flex;
    justify-content: center;
    outline: none;
    
   }
button{
    padding: 10px;
    text-align:center;
    background-color: aquamarine;
    color:blue;
    font-weight: bold;
    
}
</style>
</body>

</html>