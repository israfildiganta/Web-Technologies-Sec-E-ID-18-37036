

<?php include '../Model/Model.php';?>

<?php
 

  $wrongPass="";
  $samePass="";
  $dontMatch="";
  $tooShort="";
  $password_must_contain="";
  $present=showProfile($_GET['customer_id']);
  //echo var_dump($present['customer_id']);

   

   if(isset($_POST['updatePassword'])) 
   {
     
      $customer_name=$present['customer_name'];
      $customer_email=$present['customer_email'];
      $customer_phone=$present['customer_phone'];
      $customer_user_name=$present['customer_user_name'];
      $current_password=$_POST['current_password'];
      $new_password=$_POST['new_password'];
      $repeat_password=$_POST['repeat_password'];
      $customer_DOB=$present['customer_DOB'];
      $customer_gender=$present['customer_gender'];
      $oldPassword=$present['current_password'];



      $data['customer_name']=$present['customer_name'];
      $data['customer_email']=$present['customer_email'];
      $data['customer_phone']=$present['customer_phone'];
      $data['customer_user_name']=$present['customer_user_name'];
      $data['customer_DOB']=$present['customer_DOB'];
      $data['customer_bg']=$present['customer_bg'];
      $data['customer_gender']=$present['customer_gender'];
     // $data['customer_id']=$present['customer_id'];

      if($oldPassword!=$current_password)
      {
        $wrongPass="Wrong Password.";
      }
      else if($new_password==$oldPassword)
      {
        $samePass="You type the same password.";
      }
      else if($new_password!=$repeat_password)
      {
         $dontMatch="New and retype password don't match.";
      }
      else if(strlen($new_password)<8)
      {
        $tooShort="The password leghth is too short.";
      }
      $pass=0;
      $pass=$new_password;
      for($i=0;$i<strlen($new_password);$i++)
      {
      if($new_password[$i]=='&'|| $new_password[$i]=='#' || $new_password[$i]=='%' || $new_password[$i]=='@' || $new_password[$i]=='$')
        {
        $pass=1;
      }
     }
    if($pass==0)
    {
         $password_must_contain="Password must contain &/#/%/@/$(any of them).";
    }
    if(empty($wrongPass) && empty($samePass) && empty($dontMatch) && empty($tooShort) && empty($password_must_contain))
    {
        $data['current_password']=$new_password;
        echo var_dump("ami");
        $tar=updateCustomer($data,$present['customer_id']);
        if($tar==true)
        { 
          echo 'Successfully updated!!';
        }
  	
    }



      


    header('Location: ../view/ChangePassword.php');
}

?>