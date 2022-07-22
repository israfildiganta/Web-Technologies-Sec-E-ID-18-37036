
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Product Id</th>
			<th>Buying Price</th>
			<th>Selling Price</th>
			<th>Profit</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($allSearchedProducts as $i => $Product): ?>
			<tr>
				<td><?php echo $Product['product_name']?></td>
				<td><?php echo $Product['product_id']?></td>
				<td><?php echo $Product['buying_price']?></td>
				<td><?php echo $Product['selling_price']?></td>
				<td><?php echo $Product['profit']?></td>
				<td><a href="../View/editProduct.php?product_id=<?php echo $Product['product_id'] ?>">Edit</a>&nbsp<a href="../Controller/deleteProduct.php?product_id=<?php echo $Product['product_id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
	

</table>


</body>
</html>