<?php  
require_once '../model/model.php';


if (isset($_POST['updateProduct'])) {
	$data['name'] = $_POST['name'];
	$data['buying_price'] = $_POST['buying_price'];
	$data['selling_price'] = $_POST['selling_price'];
    $data['profit']=$data['selling_price']-$data['buying_price'];
	$data['product_id']=$_GET['product_id'];
  //  echo var_dump($data['profit']);
	


  if (updateProduct($_GET['product_id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../view/showProduct.php?product_id=' . $_GET["product_id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>