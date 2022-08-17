

<?php include '../Model/Model.php';?>

<?php
 

 $reg="/^[a-zA-Z\s\.-]+$/";
 $name_empty=$name_word_cnt=$name_must_contain=$name_start="";
 $email_validation=$email_empty="";
 $phone_empty="";
 $user_name_empty="";
 $DOB_empty="";
 $current_password_empty=$password_len_error=$password_must_contain="";
 $password_match="";
 $gender_empty="";
 $blood_empty="";
 $file_exits="";
 $person_exist="";
 $message="";
 $dateErr="";
 $DateBegin = date('Y-m-d', strtotime("01/01/1900"));
 $DateEnd = date('Y-m-d', strtotime("01/01/2010")); 
 $iot="";
 $already="";
  echo var_dump("ami");
  $present=showProfile($_GET['customer_id']);
  echo var_dump($present['customer_id']);

   

   if(isset($_POST['updateCustomer'])) 
   {
     
      $customer_name=$_POST['customer_name'];
      $customer_email=$_POST['customer_email'];
      $customer_phone=$_POST['customer_phone'];
      $customer_user_name=$_POST['customer_user_name'];
      $current_password=$present['current_password'];
      $confirm_password=$present['current_password'];
      $customer_DOB=$_POST['customer_DOB'];
      $customer_gender=$_POST['customer_gender'];
   // echo var_dump($_POST['customer_name']);

      $data['customer_name']=$_POST['customer_name'];
      $data['customer_email']=$_POST['customer_email'];
      $data['customer_phone']=$_POST['customer_phone'];
      $data['customer_user_name']=$_POST['customer_user_name'];
      $data['current_password']=$present['current_password'];
      
      $data['customer_DOB']=$_POST['customer_DOB'];
      $data['customer_bg']=$_POST['customer_bg'];
      $data['customer_gender']=$_POST['customer_gender'];



      if(empty($customer_name))
      {
        $name_empty="Name is empty.";
      }
      else if(!($customer_name[0]>='a' && $customer_name[0]<='z') && !($customer_name[0]>='A' && $customer_name[0]<='Z'))
      {
        $name_start="Must start with letter .";
      }
      if(str_word_count($customer_name)<2)
      {
        $name_word_cnt="Name must have atlesat 2 words.";
      }
      if(preg_match($reg,$customer_name)==false)
      {
        $name_must_contain="Name can contain a-z, A-Z, period, dash only .";
      }

      if(!filter_var($customer_email, FILTER_VALIDATE_EMAIL))
      {
          $email_validation="Email format is not correct.";
      }
      if (empty($customer_email)) 
      { 
          $email_empty ="Must fillup  the email .";
      } 

      if (empty($customer_phone)) 
      { 
          $phone_empty ="Must fillup  the phone number .";
      } 

      if(empty($customer_DOB)){
         $DOB_empty="Date of Birth can't be empty";
      }
      if(empty($customer_user_name)){
        $user_name_empty ="Fill up the user name.";
      }
      if(empty($current_password)){
        $current_password_empty ="Fill up the Password.";
      }
      if(strcmp($current_password,$confirm_password)!=0)
      {
        $password_match="Password dont match.";
      }
      if(strlen($current_password)<8)
      {
        $password_len_error="Password must contain 8 letter.";
        
      }
      else 
      {
        $pass=0;
        for($i=0;$i<strlen($current_password);$i++)
        {
          if($current_password[$i]=='&'|| $current_password[$i]=='#' || $current_password[$i]=='%' || $current_password[$i]=='@' || $current_password[$i]=='$')
          {
            $pass=1;
          }
        }
        if($pass==0)
        {
          $password_must_contain="Password must contain &/#/%/@/$(any of them).";
        }
      }
      if(!isset($_POST['customer_gender'])){
        $gender_empty="Must select Gender.";
      }
      if(!isset($_POST['customer_bg']) || $_POST['customer_bg']==""){
        $blood_empty="Must Select A Blood Group";
      }
      if($customer_DOB<$DateBegin || $customer_DOB>$DateEnd)
      {
        $dateErr="Your date must be in 1900 to 2010 ";
       
      }
     
      $cnt=0;
      if(empty($dataErr)&& empty($name_empty) && empty($name_must_contain) &&empty($name_start) &&empty($name_word_cnt ) && empty($email_empty) &&empty($email_validation))
      {
        echo("eikhnae 1");
        $cnt++;
      }
      if(empty($phone_empty) && empty($user_name_empty) && empty($DOB_empty) && empty($current_password_empty) && empty($password_match) && empty($gender_empty) && empty($blood_empty) )
      {
        echo("eikhnae 2");
        $cnt++;
      }
      if(empty($password_len_error) && empty($password_must_contain))
      {
        echo("eikhnae 3");
        $cnt++;
      }
      echo var_dump("ei lo");
      echo var_dump($cnt);
      
      if($cnt==3 )
      {
        
        $tar=updateCustomer($data,$present['customer_id']);
        if($tar==true)
        { 
          echo 'Successfully updated!!';
        }
  	
  	  
        
       
      }
      else 
      {
        echo 'This email or user name already used!!';
      }
      header('Location: ../view/EditProfile.php');



    }

?>