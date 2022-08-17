<?php include '../Model/Model.php'?>


<?php
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
       $customer_user_name=$_POST['customer_user_name'];
       $current_password=$_POST['current_password'];
       if(empty($customer_user_name) || empty($current_password))
       {
           if(empty($customer_user_name))
           {
               $userNameEmpty="Must fill up user name.";
           }
           if(empty($current_password))
           {
               $passwordEmpty="Must fill up password.";
           }
       }
       else 
       {
          $res=validLogin($customer_user_name,$current_password);
          if($res['got']==1)
          {
            $_SESSION['login']=1;
            setcookie('customer_name',$res['customer_name'],time()+660);
            $_SESSION['customer_name']=$res['customer_name'];

            setcookie('customer_email',$res['customer_email'],time()+660);
            $_SESSION['customer_email'] = $res["customer_email"];


            setcookie('customer_phone',$res['customer_phone'],time()+660);
            $_SESSION['customer_phone'] = $res["customer_phone"];

            setcookie('customer_user_name',$res['customer_user_name'],time()+660);
            $_SESSION['customer_user_name'] =$res["customer_user_name"];

            setcookie('current_password',$res['current_password'],time()+660);
            $_SESSION['current_password'] = $res["current_password"];

            setcookie('customer_gender',$res['customer_gender'],time()+660);
            $_SESSION['customer_gender'] = $res["customer_gender"];

            setcookie('customer_bg',$res['customer_bg'],time()+660);
            $_SESSION['customer_bg'] = $res["customer_bg"];

            setcookie('customer_DOB',$res['customer_DOB'],time()+660);
            $_SESSION['customer_DOB'] = $res["customer_DOB"];

            setcookie('customer_id',$res['customer_id'],time()+660);
            $_SESSION['customer_id'] = $res["customer_id"];
            header("location:Profile.php");
          }
          else 
          {
            $invalid="Invalid user name or password.";
          }
       }
       
   
   }
?>