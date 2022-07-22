<?php  
//require_once '../controller/productInfo.php';




    include "nav.php";


    require_once '../Controller/productInfo.php';
    $products = fetchAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table  border="1px solid">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($products as $i => $products): ?>
			<tr>
				<td><a href="../View/showProduct.php?product_id=<?php echo $products['product_id'] ?>"><?php echo $products['product_name'] ?></a></td>
				
				
                <td><?php echo $products['profit'] ?></td>
				<td><a href="../View/editProduct.php?product_id=<?php echo $products['product_id'] ?>">Edit</a>&nbsp<a href="../Controller/deleteProduct.php?product_id=<?php echo $products['product_id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>