

<html>
<head>
    <title>Customer Registration Page</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<div class="topnav">
  <a href="First.php">Home</a>
  <a href="Login.php">Login</a>
  <a href="Registration.php">Registration</a>
</div>

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


?>

<?php include '../Controller/RegistrationValid.php'?>




<body style="background-color:#FFFFFF">


<div class>
<h1 style="text-align: center">Registration</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table align="center">
      <tr>
      <td>Customer Name</td>
      <td> <input type="text" name="customer_name" id="customer_name"></td>
      <td> <span style="color:red">*<?php echo $name_empty ?> <?php echo $name_word_cnt ?> <?php echo $name_must_contain ?> <?php echo $name_start?></span></td>
     </tr>

      <tr>
       <td>Email</td>
      <td><input type="email" name="customer_email" id="customer_email"></td>
      <td><span style="color:red">*<?php echo $email_validation ?> <?php echo $email_empty?> </span></td>
    </tr>
      <tr>
       <td>Phone</td>
      <td> <input type="text" name="customer_phone" id="customer_phone"></td>
       <td><span style="color:red">* <?php echo $phone_empty?> </span></td>
     </tr>

      <tr>
       <td>User Name</td>
       <td><input type="text" name="customer_user_name" id="customer_user_name"></td>
       <td><span style="color:red">* <?php echo $user_name_empty ?> </span></td>
     </tr>

       <tr>
      <td>Password</td>
     <td><input type="password" name="current_password" id="current_password"></td>
     <td><span style="color:red">* <?php echo $current_password_empty ?>  <?php echo $password_must_contain ?>  <?php echo $password_len_error ?> </span></td>
     </tr>

     <tr>
       <td>Confirm Password</td>
       <td><input type="password" name="confirm_password" id="confirm_password"></td>
       <td><span style="color:red">* <?php echo $password_match ?> </span></td>
     </tr>



       <tr>
       <td>Gender</td>
       <td>
       <input name="customer_gender" id="male" type="radio" value="male">Male

        <input name="customer_gender" id="female" type="radio" value="female">Female


        <input name="customer_gender" id="other" type="radio" value="other">Other

        <span style="color:red">* <?php echo $gender_empty ?> </span>
      </td>
      </tr>


      <tr>
       <td>Blood Group</td>
       <td>
       <select id="customer_bg" name ="customer_bg">
            <option value=""></option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB-">AB-</option>
            <option value="B-">B-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
        </select>
      </td>
      <td><span style="color:red">* <?php echo $blood_empty ?> </span></td>
   </tr>

   <tr>
       <td>Date of Birth</td>
       <td><input type="date" name="customer_DOB" id="customer_DOB"></td>
       <td><span style="color:red">* <?php echo $DOB_empty ?><?php echo $dateErr ?> </span></td>
   </tr>
   <tr>
     <td></td>
     
   <td><input type="submit" name="Submit"></td>
 </tr>
</table>
</form>
</div>

<div class="footer">
  <p>Copyright © Israfil Diganta</p>
</div>
 <?php echo $person_exist ?>
 <?php echo $file_exits ?>
 <?php echo $message ?>
 <?php echo $iot ?>




</body>


</html>
