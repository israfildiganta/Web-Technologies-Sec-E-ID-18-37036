<?php

require_once '../model/model.php';

if (isset($_POST['findProduct'])) {
	
		echo $_POST['name'];

    try {
    	
    	$allSearchedProducts = searchProduct($_POST['name']);
    	require_once '../view/showSearchProduct.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

?>