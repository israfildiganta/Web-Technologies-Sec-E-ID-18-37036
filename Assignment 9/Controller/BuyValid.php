<?php include '../Model/Model.php'?>

<?php
 
   $productt=showProduct($_GET['product_id']);

   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      echo var_dump($_GET['product_id']);
      echo var_dump($_GET['customer_id']);
      $data['customer_name']=$_POST['customer_name'];
      $data['customer_phone']=$_POST['customer_phone'];
      $data['customer_address']=$_POST['customer_address'];
      $data['quantity']=$_POST['quantity'];
      $data['product_cost']=$productt['product_cost'];
      $data['total_cost']=$data['quantity']*$productt['product_cost'];
      $data['time']=date('d-m-y h:i:s');
      $data['customer_id']=$_GET['customer_id'];
      $data['product_name']=$productt['product_name'];
      if($data['quantity']>=1 && $data['quantity']<=5)
      {
         addtras($data);
         header('Location: ../view/ViewProduct.php');

      }
      else 
      {
         $quanErr="Invalid Quantity";
         header('Location: ../view/ViewProduct.php');
      }
      

      
      
      
      
     
   }
  
?>