<?php

session_start();
 
if (!isset($_SESSION['mysesi'])=='$name' && !isset($_SESSION['mytype'])=='NURSE')
{
  echo "<script>window.location.assign('logintest.php')</script>";
 
}
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
require_once("includes/db_connect.php");
?>
<html>
<head>
<title>Doctor Area</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body>
<!-- main starts here-->
<div class="main_wrapper">
		<div class="header">
		<div id="menubar">
		<img id="logo" src="images/logo.jpg" style="height:100px; width:200px" />
		<img id="cuealogo" src="images/cuealogo.jpg" style="height:100px; width:200px float:right" />
		
		</div>
		</div>
		<!-- Nav bar starts here-->
		<div class="menubar">
			<ul id="menu">
				<li>
				<a href="logout.php">LOGOUT</a></li>
				
				</ul>
			
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				
				
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			
			<div id="single_product" style="height:150px">
				<div id="admin"><h2 style="text-align:center; color:#293f50;"> Nurse Area </h2>
				<h1 style="color:#293f50; padding-left:100px; padding-top:10px;">Welcome, Kindly confirm that this is you.				
				
				</h1>
				<?php
 //session_start();
 include('includes/db_connect.php');
 if(isset($_POST['submit']))
 {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $query = "SELECT * FROM nurse WHERE nurse_email='$email' AND nurse_password='$password'";
  $result = mysqli_query($con,$query)or die(mysqli_error());
  $num_row = mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  if( $num_row ==1 )
         {
   $_SESSION['user_name']=$row['nurse_name'];
   header("Location: nursepage.php");
   exit;
  }
  else
         {
   echo 'false';
  }
 }
?>
<div class="login_form">
<form name="form1" action="confirmNurse.php" method="post" style="padding-top:20px" >
 <span>
 <fieldset class="account_infor">
  <label for="email">E-mail:</label>
  <input name="email" type="email" id="email" size="30"/>
 
 
  <label for="password">Password:</label>
  <input name="password" type="password" id="password" size="30"/>
  </fieldset>
 </span>
 <p>
  <input name="submit" type="submit" value="Submit"/>
 </p>
</form>
				</div>				
			
			<section id="products_box">
			<ul>
			
			<li><img src="images/doc.jpg" height="40" width="30" />Doctors</li>
			<li><img src="images/patient.jpg" height="40" width="30" />Patients</li>
			<li><img src="images/nurse.jpg" height="40" width="30" />Nurses</li>
			<li><img src="images/nurse2.jpg" height="40" width="30" />Pharmacist</li>
		</ul>
			
			</section>
			<section id="section_two">
			<ul>
			
			<li><img src="images/medicine.jpg" height="40" width="30" />Medicine</li>
			<li><img src="images/lab.jpg" height="40" width="30" />Scientist</li>
			</ul>
			</section>
			</div>
		</div>
		</div>
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->
	</div>
</body>

</html>