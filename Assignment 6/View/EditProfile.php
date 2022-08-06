<?php
	session_start();

	if(isset($_COOKIE['customer_user_name']))
	{
        $_SESSION['customer_name']=$_COOKIE['customer_name'];
        $_SESSION['customer_email'] = $_COOKIE["customer_email"];
        $_SESSION['customer_phone'] = $_COOKIE["customer_phone"];
        $_SESSION['customer_user_name'] =$_COOKIE["customer_user_name"];
        $_SESSION['current_password'] = $_COOKIE["current_password"];
        $_SESSION['customer_gender'] = $_COOKIE["customer_gender"];
        $_SESSION['customer_bg'] = $_COOKIE["customer_bg"];
        $_SESSION['customer_DOB'] = $_COOKIE["customer_DOB"];
        $_SESSION['customer_id'] = $_COOKIE["customer_id"];
       // echo var_dump($_SESSION['current_password']) ;


?>

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


<?php include '../Controller/CustomerInfo.php'?>

<?php

    $present = fetchCustomer($_SESSION['customer_id']);
    echo var_dump($_SESSION['customer_id']);

?>



<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  grid-area: header;
  background-color: #85C1E9;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left middle middle middle middle middle'
    'footer footer footer footer footer footer';
  /* grid-column-gap: 10px; - if you want gap between the columns */
}

.left,
.middle,
.right {
  padding: 10px;
  height: 400px; /* Should be removed. Only for demonstration */
}

/* Style the left column */
.left {
  grid-area: left;
}

/* Style the middle column */
.middle {
  grid-area: middle;
}

/* Style the right column */
.right {
  grid-area: right;
}

/* Style the footer */
.footer {
  grid-area: footer;
  background-color: #85C1E9;
  padding: 10px;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

</style>

</head>
<body>
<div class="grid-container">

<div class="header">
    <h1 style="color: #2E4053"; align="left">Customer Dashboard </h1>
</div>

<div class="left" style="background-color:#aaa;">
  <ul>
        <li><a href="ViewProfile.php"> View Profile</a></li>
        <li><a href="EditProfile.php"> Edit Profile</a></li>
        <li><a href="ChangePassword.php"> Change Password</a></li>
        <li><a href="Logout.php"> Log out</a></li>


</ul>
</div>

<div class="middle" style="background-color:#bbb;">

<fieldset align="center">

		<legend>Edit Profile</legend>

<form method="POST" action='../Controller/UpdateProfile.php?customer_id=<?php echo $present['customer_id'];?>'  enctype="multipart/form-data">

<table align="left">

<tr>
<td>Customer Name:</td>
<td><input value="<?php echo $present['customer_name'] ?>" type="text" id="customer_name" name="customer_name"></td>
</tr>

<tr>
  <td>Customer Email:</td>
  <td><input value="<?php echo $present['customer_email'] ?>" type="email" id="customer_email" name="customer_email"></td>
</tr>

<tr>
  <td>Customer Phone:</td>
  <td><input value="<?php echo $present['customer_phone'] ?>" type="text" id="customer_phone" name="customer_phone"></td>
</tr>

<tr>
<td>Customer User Name:</td>
<td><input value="<?php echo $present['customer_user_name'] ?>" type="text" id="customer_user_name" name="customer_user_name"></td>
</tr>

  <tr>
       <td>Gender</td>
        <td>
       <input name="customer_gender" id="male" type="radio" value="male"<?php if($present['customer_gender']=='male'){echo('checked="checked"');}?>>
        <label for="male">Male</label>

        <input name="customer_gender" id="female" type="radio" value="female"<?php if($present['customer_gender']=='female'){echo('checked="checked"');}?>>
        <label for="female">Female</label>

        <input name="customer_gender" id="other" type="radio" value="other"<?php if($present['customer_gender']=='other'){echo('checked="checked"');}?>>
        <label for="other">Other</label>

      </td>
</tr>

  <tr>
       <td>Blood Group</td>
       <td>
       <select id="customer_bg" name ="customer_bg">

            <option value=""<?php if($present['customer_bg']== ''){echo('selected="selected"');}?>></option>
            <option value="AB+"<?php if($present['customer_bg']== 'AB+'){echo('selected="selected"');}?>>AB+</option>
            <option value="B+"<?php if($present['customer_bg']== 'B+'){echo('selected="selected"');}?>>B+</option>
            <option value="O+"<?php if($present['customer_bg']== 'O+'){echo('selected="selected"');}?>>O+</option>
            <option value="O-"<?php if($present['customer_bg']== 'O-'){echo('selected="selected"');}?>>O-</option>
            <option value="AB-"<?php if($present['customer_bg']== 'AB-'){echo('selected="selected"');}?>>AB-</option>
            <option value="B-"<?php if($present['customer_bg']== 'B-'){echo('selected="selected"');}?>>B-</option>
            <option value="A+"<?php if($present['customer_bg']== 'A+'){echo('selected="selected"');}?>>A+</option>
            <option value="A-"<?php if($present['customer_bg']== 'A-'){echo('selected="selected"');}?>>A-</option>
        </select>
      </td>
  </tr>

  <tr>
       <td>Date of Birth</td>
       <td><input type="date" name="customer_DOB" id="customer_DOB" value="<?php echo $present['customer_DOB']?>"></td>

  </tr>


<tr>
<td></td>

<td><input type="submit" name = "updateCustomer" value="Update"></td>
</tr>


</table>

</form>

</fieldset>

</div>

<div class="footer">
	<p>Copyright © Israfil Diganta</p>
</div>

</div>

</body>

</html>

 <?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>
