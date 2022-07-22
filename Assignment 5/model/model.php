<?php 

require_once 'db_connect.php';


function showAllProducts(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `product` where product_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchProduct($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product` WHERE product_name LIKE '%$id%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addProduct($data){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data['row']=sizeof($rows)+1;

    $selectQuery = "INSERT into product (product_id,product_name,buying_price, selling_price, profit) VALUES (:row, :name, :buying_price, :selling_price, :profit)";
    echo var_dump($data['name']);
    try{
       // $stmt = $conn->prepare($selectQuery);
        
        $stmt = $conn->prepare($selectQuery);
        $pic=$data['profit'];
        $stmt->execute([
        	':row' => $data['row'],
        	':name' => $data['name'],
        	':buying_price' => $data['buying_price'],
        	':selling_price' => $data['selling_price'],
        	':profit' => $pic
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateProduct($id, $data){
    $conn = db_conn();
    
    $selectQuery = "UPDATE product set product_name = ?, buying_price = ?, selling_price = ?, profit = ? where product_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['buying_price'],$data['selling_price'],$data['profit'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `product` WHERE `product_id` = ?";
    
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}