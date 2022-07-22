<?php 
require_once '../Model/model.php';


if(deleteProduct($_GET['product_id'])) {
    header('Location: ../View/showAllProduct.php');
}
 ?>