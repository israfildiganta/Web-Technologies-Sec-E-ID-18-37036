

<?php

include 'db_connect.php';
function validLogin($customer_user_name,$current_password)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM customer;';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $deep['got']=0;;
    foreach($rows as $row)
    {
        if($row['customer_user_name']==$customer_user_name && $row['current_password']==$current_password)
        {
            $conn = null;
            $deep=$row;
            $deep['got']=1;
            return $deep;
        }
    }
    


    $conn = null;
    return $deep;

}
function insertQuestion($id,$id2)
{
    $conn = db_conn();
    $data['customer_id']=$id2;
    $data['comments']=$id;
    $selectQuery = "INSERT into question (customer_id,comments ) VALUES (:customer_id,:comments )";
    try {
        $stmt = $conn->prepare($selectQuery);    
    $stmt->execute([
        ':customer_id' => $data['customer_id'],
        ':comments' => $data['comments']    
        
    ]);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;

}

function showProfile($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `customer` where customer_id = ?";
    

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
    $conn = null;
    return $row;
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

function  getTheProduct($id)
{
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

function existEmailUser($data,$id)
{
    $conn=db_conn();
    $data['customer_id']=$id;
    
    $selectQuery = 'SELECT * FROM customer';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($rows as $row)
    {
        if($data['customer_email']== $row['customer_email'] && $data['customer_id']=!$row['customer_id'])
        {
            
            $conn = null;
            return false;

        }
        if($data['customer_user_name']== $row['customer_user_name'] && $data['customer_id']=!$row['customer_id'])
        {
            
            $conn = null;
            return false;

        }
      
    }
    $conn = null;
    return true;
}

function updateCustomer($data,$id)
{
    

    $conn=db_conn();
    $data['customer_id']=$id;
    $customer_name=$data['customer_name'];
    $customer_email=$data['customer_email'];
    $customer_phone=$data['customer_phone'];
    $customer_user_name=$data['customer_user_name'];
    $customer_DOB=$data['customer_DOB'];
    $current_password=$data['current_password'];
    $customer_bg=$data['customer_bg'];
    $customer_gender=$data['customer_gender'];
    $customer_id=$id;


  
    $selectQuery ="UPDATE customer
    SET  customer_name=? ,
         customer_email=?,
         customer_phone=?,
         customer_user_name=?,
         customer_DOB=?,
         current_password=?,
         customer_bg=?,
         customer_gender=?

    WHERE customer_id =?  ";
   
    try{
       
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	 $data['customer_name'],
        	 $data['customer_email'],
        	 $data['customer_phone'],
             $data['customer_user_name'],
             $data['customer_DOB'],
             $data['current_password'],
             $data['customer_bg'],
             $data['customer_gender'],
             $data['customer_id']
        	
        ]);
       
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    setcookie('customer_name',$data['customer_name'],time()+60);
        setcookie('customer_email',$data['customer_email'],time()+60);
        setcookie('customer_phone',$data['customer_phone'],time()+60);
        setcookie('customer_user_name',$data['customer_user_name'],time()+60);
        setcookie('current_password',$data['current_password'],time()+60);
        setcookie('customer_gender',$data['customer_gender'],time()+60);
        setcookie('customer_bg',$data['customer_bg'],time()+60);
        setcookie('customer_DOB',$data['customer_DOB'],time()+60);
        setcookie('customer_id',$data['customer_id'],time()+60);
        $_SESSION['customer_name']=$data['customer_name'];
        $_SESSION['customer_email'] = $data["customer_email"];
        $_SESSION['customer_phone'] = $data["customer_phone"];
        $_SESSION['customer_user_name'] =$data["customer_user_name"];
        $_SESSION['current_password'] = $data["current_password"];
        $_SESSION['customer_gender'] = $data["customer_gender"];
        $_SESSION['customer_bg'] = $data["customer_bg"];
        $_SESSION['customer_DOB'] = $data["customer_DOB"];
        $_SESSION['customer_id'] = $data["customer_id"];
    
    $conn = null;
    return true;


}
function showtransactions($id)
{
    
    $con = mysqli_connect('localhost','root','','project');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    
    mysqli_select_db($con,"project");
    
    $sql="SELECT * FROM transaction WHERE customer_id= '".$id."'";
    
    $result = mysqli_query($con,$sql);
   

    
    mysqli_close($con);
    return $result;
     
    
  
    

}



function addtras($data)
{
    $conn=db_conn();
    $selectQuery = "INSERT into transaction (customer_name, customer_phone, customer_address,quantity,product_cost,total_cost,time,product_name,customer_id ) VALUES (:customer_name, :customer_phone, :customer_address,:quantity,:product_cost,:total_cost,:time,:product_name,:customer_id )";
     try{
       
        
       $stmt = $conn->prepare($selectQuery);
       
      

       $stmt->execute([
           ':customer_name' => $data['customer_name'],
           ':customer_phone' => $data['customer_phone'],
           ':customer_address' => $data['customer_address'],
           ':quantity' => $data['quantity'],
           ':product_cost' => $data['product_cost'],
           ':total_cost' => $data['total_cost'],
           ':time' => $data['time'],
           ':product_name'=> $data['product_name'],
           ':customer_id'=> $data['customer_id']
           
       ]);
   }catch(PDOException $e){
       echo $e->getMessage();
   }
   
   $conn = null;
   return true;

}



function addCustomer($data){
	$conn = db_conn();

    $selectQuery = "SELECT * FROM customer ORDER BY customer_id ASC ";
    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row['customer_id']=0;
    foreach($rows as $row)
    {
        $data['customer_id']=$row['customer_id'];
        if($row['customer_email']==$data['customer_email']|| $row['customer_user_name']==$data['customer_user_name'])
        {
            $conn = null;
            return false;
        }
    }
    $row['customer_id']++;
    $data['customer_id']=$row['customer_id'];
    $selectQuery = "INSERT into customer (customer_id,customer_name,customer_email, customer_phone, customer_user_name,current_password,customer_DOB,customer_bg,customer_gender) VALUES (:customer_id,:customer_name,:customer_email,:customer_phone, :customer_user_name,:current_password,:customer_DOB,:customer_bg,:customer_gender);";
   
    try{
       
        
        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
        	':customer_id' => $data['customer_id'],
        	':customer_name' => $data['customer_name'],
        	':customer_email' => $data['customer_email'],
        	':customer_phone' => $data['customer_phone'],
            ':customer_user_name' => $data['customer_user_name'],
            ':customer_DOB' => $data['customer_DOB'],
            'current_password' => $data['current_password'],
            'customer_bg' => $data['customer_bg'],
            'customer_gender' => $data['customer_gender']
        	
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}




?>