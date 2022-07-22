<?php  
require_once '../model/model.php';
// include "../view/nav.php";

if (isset($_POST['createProduct'])) {
	$data['name'] = $_POST['name'];
	$data['buying_price'] = $_POST['buying_price'];
	$data['selling_price'] = $_POST['selling_price'];
    $data['profit']=$data['selling_price']-$data['buying_price'];
    echo var_dump($data['profit']);
	

  if (addProduct($data)) {
  	echo 'Successfully added!!';
	
  }
} 
else {
	echo 'You are not allowed to access this page.';
}

?>