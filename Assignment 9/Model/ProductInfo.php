
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
$con = mysqli_connect('localhost','root','','project');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"project");

$sql="SELECT * FROM product WHERE product_name= '".$_GET['product_name']."'";

$result = mysqli_query($con,$sql);
//echo var_dump($_GET['product_name']);
$id=$_GET['product_name'];
echo "<table border='1' cellpadding='8'>
<tr>
 		<th>Product Name</th>
         <th>Product Cost</th>
         <th>Action</th>
         <th>Buy</th>
       
</tr>";
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