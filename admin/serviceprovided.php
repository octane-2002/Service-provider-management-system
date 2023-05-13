<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="services.css">
</head>
<body>
    <div class="nav">
    <h1>Service Provided</h1>
</div>
<style>
    
</style>
    <?php
include('connection.php');
$sql = "SELECT * FROM provider";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    // Table headers
    echo "<tr>";
    echo "<th >sp_id</th>";
    echo "<th >service_id</th>";
    echo "<th>servicing_date</th>";
    
    echo "</tr>";

    // Table data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["sp_id"]. "</td>";
        echo "<td>" . $row["service_id"]. "</td>";
        echo "<td>" . $row["servicing_date"]. "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<a href="apage.php" class="container"><button>Back</button></a>

<style>
   a.container{
    margin-top: 100px;
    display: flex;
    justify-content: center;
   font-size: 25px;
    
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

