<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Admin Area</title>
<link rel="stylesheet" href="style/style.css" media="all" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
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
				<li><a href="#">Home</a></li><li>
				<a href="../logout.php">LOGOUT</a></li>
				</ul>
			<div id="form1">
		<form method="get" action="results.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="search a product"/>
	<input type="submit" name="search" value="search" />
				</form>
			</div>
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboard</div>
				<ul id="cats">
					
				<li><a href="depatmentlist.php">Department</a></li><li>
				<a href="doctorlist.php">Doctors</a></li><li>
				<a href="patientlist.php">Patients</a></li><li>
				<a href="nurselist.php">Nurses</a></li><li>
				<a href="pharmacistlist.php">Pharmacist</a></li><li>
				<a href="scientistlist.php">Scientist</a></li><li>
				<a href="accountantlist.php">Accountant</a></li><li>
				<a href="receptionist.php">Receptionist</a></li><li>
				<a href="product.php">Product</a></li>
				</ul>
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="accountantlist.php">Accountant List</a></li>
			<li><a href="addAccountant.php">+ Add Accountant</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="addAccountant.php">
			<fieldset class="account_infor">
			<label>
			<p>Name:</P>
			<input type="text" name="accountant_name" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Email: </p>
			<input type="email"name="accountant_email" size="20" maxlength="20" value="" required /></label>
			<label><p>Password: </p>
			<input type="password"name="accountant_password" size="20" maxlength="20" value="" required /></label>
			<br />
			<label>
			<p>Address: </P>
			<input type="text" name="accountant_address" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Phone Number:</p>
			<input type="text" name="accountant_mobile" size="20" maxlength="10" value="" required /></label>
			<br />
			
			<p>Date of Enrollment:</p>
			<input id="datepicker" type="date" name="accountant_doe" size="20" maxlength="10" value=""required /></label>
			<br />
		
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Accountant" style="background:grey; color:white;"/></p>
			<fieldset>
			</form>
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

<?php
			if(isset($_POST['submit'])){
				//getting the text data from the fields
				$accountant_name=$_POST['accountant_name'];
				$accountant_email=$_POST['accountant_email'];
				$accountant_password=$_POST['accountant_password'];
				$accountant_address=$_POST['accountant_address'];
				$accountant_mobile=$_POST['accountant_mobile'];			
				$accountant_doe=$_POST['accountant_doe'];
			
				
						
		 $insert_doc= "insert into accountant (accountant_name, accountant_email,accountant_password, accountant_address,accountant_mobile,accountant_doe) values('$accountant_name','$accountant_email','$accountant_password','$accountant_address','$accountant_mobile','$accountant_doe')";
			
			$insert_da=mysqli_query($con, $insert_doc);
				if($insert_da){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('addAccountant.php')</script>";
				}
			}
?>






