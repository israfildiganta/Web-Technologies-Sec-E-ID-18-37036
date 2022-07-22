<?php 

require_once '../controller/productInfo.php';
$product = fetchProduct($_GET['product_id']);


 include "nav.php";

echo var_dump($_GET['product_id']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action='../controller/updateProduct.php?product_id=<?php echo $_GET['product_id'];?>' method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $product['product_name'] ?>" type="text" id="name" name="name"><br>

  <label for="buying_price">Buying Price:</label><br>
  <input value="<?php echo $product['buying_price'] ?>" type="text" id="buying_price" name="buying_price"><br>

  <label for="selling_price">Selling Price:</label><br>
  <input value="<?php echo $product['selling_price'] ?>" type="text" id="selling_price" name="selling_price"><br>
 
  <input type="submit" name = "updateProduct" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

