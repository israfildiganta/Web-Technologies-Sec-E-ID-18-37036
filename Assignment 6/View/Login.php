<html>

<head>
    <title>Customer</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="registration.php">Registration</a>
  </div>

<?php

$userNameEmpty="";
$passwordEmpty="";
$invalid="";
session_start();
include '../Controller/LoginValid.php';




?>

<div>

<h1 style="text-align: center">Login</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table align="center">
    <tr>
    <td>User Name</td>
    <td><input type="text" name="customer_user_name" id="customer_user_name"></td>
    <td><span style="color:red">* <?php echo $userNameEmpty ?> </span></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="current_password" id="current_password"></td>
    <td><span style="color:red">* <?php echo $passwordEmpty ?> </span></td>
  </tr>
  <tr>
  <td>  </td>
  <td><input type="submit"  value="Log in"></td>
  </tr>

</table>
</form>
<span style="color:red">* <?php echo $invalid ?> </span>
</div>

<div class="footer">
  <p>Copyright © Israfil Diganta</p>
</div>
</body>


</html>
