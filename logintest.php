<!DOCTYPE html>
<?php
require_once('includes/db_connect.php');
require_once("Functions/functions.php");
?>
<html>
<head>
<title>log in</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body style="background: linear-gradient(#49708f, #293f50);">
<div class="main_wrapper" style="border:2px solid black; margin-top:50px; width:800px">
		<div class="header" style="width:800px;padding-top:30px;">
		
		<center>
		<img id="cuealogo" src="images/cuealogo.jpg" style="height:100px; width:600px float:center" />
		<h2 style="color:#293f50; padding-top:20px">Infirmary System Login Section</h2>
		</center>
		</div>
<div class="content_wrapper" style="background-image:url('images/nurse.jpg');background-repeat:no-repeat;margin-top:0px; padding-top:100px;width:800px;height:300px;">
<!-- main starts here-->
		<center>
		<form  name="form1" action ="logintest.php" method="POST">
		<fieldset class="account_infor">
		<label><h2 align="center">Email:</h2><input type="email" name="email"><br></label>
		<label ><h2 align="center">Password:</h2><input type="password" name="upassword"></label><br>
		</fieldset>
		<fieldset style="width:200px" class="account-action">
		<input style="padding:0px"class="btn" type="submit" name="login" value="Login">
		</fieldset>
		</form>
		<center>
		</div>
		</div>
</body>

</html>
   
<?php

if(isset($_POST['login'])){
$email=$_POST['email'];
$upassword=md5($_POST['upassword']);

  $mysqli = new mysqli("localhost", "root", "", "finalproject");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM users where email='$email' and upassword='$upassword'");
  $row = $res->fetch_assoc();
  $username = $row['username'];
  $upassword = $row['upassword'];
  $email = $row['email'];
  $urole = $row['urole'];
  if($email==$email && $upassword=$upassword){
    session_start();
    if($urole=="ADMIN"){
      $_SESSION['mysesi']=$username;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('Admin/Adminpage.php')</script>";
    } else if($urole=="DOCTOR"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('confirmDoctor.php')</script>";
    }
	else if($urole=="NURSE"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('confirmNurse.php')</script>";
    }
	else if($urole=="RECEPTIONIST"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('receptionistpage.php')</script>";
    }
	else if($urole=="ACCOUNTANT"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('accountantpage.php')</script>";
    }
	else if($urole=="SCIENTIST"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('scientistpage.php')</script>";
    }
	else if($urole=="PHARMACIST"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$urole;
      echo "<script>window.location.assign('pharmacistpage.php')</script>";
    }
	else{
		echo "<script>alert('Wrong email/password')</script>";
				echo "<script>window.open('logintest.php')</script>";
		}
		//header("Location:logintest.php");
		}
		
		}
?>