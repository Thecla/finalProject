<?php
require_once 'includes/db_connect.php';
session_start();
$Email= $_POST['email'];
$password=$_POST['upassword'];
$res=mysqli_query("SELECT * FROM users WHERE email='$Email' AND upassword='$password'");
$run_user = mysqli_query($con,$sql);
$check_user=mysqli_num_rows($run_user);
if($check_user==1){
	
	$result=mysqli_fetch_array($result);
	$role=$result['urole'];
	if($role=="ADMIN"){
	
		header('location:nurserpage.php');
	}
	
	else if($role=="DOCTOR"){
	header('location:doctorpage.php');
	}
	$_SESSION['email']=$Email;
	$_SESSION['upassword']=$password;
	$_SESSION['role']=$role;
	}
	else{
	header('location:logintest.php');
	}


?>