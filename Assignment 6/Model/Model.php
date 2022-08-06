

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

function existEmailUser($data,$id)
{
    $conn=db_conn();
    $data['customer_id']=$id;
    echo var_dump($data['customer_id']);
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
            echo var_dump("this is me");
            $conn = null;
            return false;

        }
        if($data['customer_user_name']== $row['customer_user_name'] && $data['customer_id']=!$row['customer_id'])
        {
            echo var_dump("this is me");
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