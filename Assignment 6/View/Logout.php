<?php 
	session_start();
	unset($_SESSION['login']);
	setcookie('customer_name',$_COOKIE['customer_name'],time()-60);
	setcookie('customer_email',$_COOKIE['customer_email'],time()-60);
	setcookie('customer_phone',$_COOKIE['customer_phone'],time()-60);
	setcookie('customer_user_name',$_COOKIE['customer_user_name'],time()-60);
	setcookie('current_password',$_COOKIE['current_password'],time()-60);
	setcookie('customer_gender',$_COOKIE['customer_gender'],time()-60);
	setcookie('customer_bg',$_COOKIE['customer_bg'],time()-60);
	setcookie('customer_DOB',$_COOKIE['customer_DOB'],time()-60);
	setcookie('customer_id',$_COOKIE['customer_id'],time()-60);
	unset($_SESSION['customer_name']);
	unset($_SESSION['customer_email']);
	unset(  $_SESSION['customer_phone']);

	unset($_SESSION['customer_user_name']);
	unset( $_SESSION['current_password'] );
	unset( $_SESSION['customer_gender']);
	unset(   $_SESSION['customer_bg']);
	unset(  $_SESSION['customer_DOB']);
	unset(  $_SESSION['customer_id']);

	header('location: Login.php');
?>