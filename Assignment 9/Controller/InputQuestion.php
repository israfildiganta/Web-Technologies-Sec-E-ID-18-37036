<?php
 include '../Model/Model.php';

   
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
   // echo var_dump($_POST['comments']);
    insertQuestion($_POST['comments'],$_GET['customer_id']);
    header('Location: ../view/FAQ.php');
}

?>