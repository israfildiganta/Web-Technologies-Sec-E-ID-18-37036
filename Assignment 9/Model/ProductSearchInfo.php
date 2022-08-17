
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {text-align: left;}
tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>

<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'project';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die('Could not connect to the database: ' . $conn->connect_error);
    }

    $word = $_GET['q'];
    $sql= "SELECT * FROM product WHERE product_name LIKE '$word' ORDER BY product_name ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><p>".$row[prodNam]."</p></div>";
        }
    }
    $conn->close();
?>

<?php
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
	echo "<td>".$row['product_name']."</td>";
     echo "<td>".$row['product_cost']."</td>";
     echo "<td><a href=ShowDetails.php?product_id=".$row['product_id'].">Details</a></td>";
     echo "<td><a href=BuyNow.php?product_id=".$row['product_id'].">Buy Now</a></td>";
      echo "</tr>";

}
echo "</table>";

mysqli_close($con);

 

?>
</body>
</html>