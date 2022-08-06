
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


<?php include '../Controller/CustomerInfo.php'?>

<?php
    
    $present = fetchCustomer($_SESSION['customer_id']);
   // echo var_dump($_SESSION['customer_id']);

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
  height: 300px; /* Should be removed. Only for demonstration */
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

	<legend>Change Password</legend>

<form method="POST" action='../Controller/UpdatePassword.php?customer_id=<?php echo $present['customer_id'];?>'  enctype="multipart/form-data">
<table align="left">
  <tr>
  <td> Current Password: </td>
  <td><input value="" type="password" id="current_password" name="current_password"></td>
  </tr>

  <tr>
  <td>New Password:</td>
  <td><input value="" type="password" id="new_password" name="new_password"></td>
  </tr>

  <tr>
  <td>Retype Password:</td>
  <td><input value="" type="password" id="repeat_password" name="repeat_password"></td>
  </tr>
  
  <tr>
  <td></td>

  <td><input type="submit" name = "updatePassword" value="Update"></td>
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

 <html>

 <?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>