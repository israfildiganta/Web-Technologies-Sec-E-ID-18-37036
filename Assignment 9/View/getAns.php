<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
<body>
    <?php
        include '../Controller/getProductSearch.php';
        $id=$_GET["product_name"];
       
        $data=getProduct($id);
        echo "<table border='1px solid'>
	        <thead>
	            <tr>
		            <th>Product Name</th>
                    <th>Product Cost</th>
		           
			    </tr>
	        </thead>
            <tbody>";
            foreach($data as $i =>$product):
			        echo "<tr>
		            	<td>"; echo $product["product_name"];echo "</td>
                        <td>"; echo $product["product_cost"];echo "</td>";
                        echo "<td><a href=ShowDetails.php?product_id=".$product['product_id'].">Details</a></td>";
                        echo "<td><a href=BuyNow.php?product_id=".$product['product_id'].">Buy Now</a></td>";
				        
                    echo "</tr>";
		        endforeach;
            echo "</tbody>"
    ?>
</body>
</html>