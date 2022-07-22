<?php  
require_once '../Controller/productInfo.php';
include "nav.php";
$product = fetchProduct($_GET['product_id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border="1px">
	<tr>
		<th>Product Name</th>
		<th>Product Id</th>
		<th>Buying Price</th>
		<th>Selling Price</th>
		<th>Profit</th>
	</tr>
	<tr>
		<td><?php echo $product['product_name'] ?></a></td>
		<td><?php echo $product['product_id'] ?></td>
		<td><?php echo $product['buying_price'] ?></td>
		<td><?php echo $product['selling_price'] ?></td>
        <td><?php echo $product['profit'] ?></td>
	</tr>
</table>
</body>
</html>