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
		<form method="get" action="result.php" enctype="multipart/form-data">
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
			<li><a href="receptionist.php">Receptionist List</a></li>
			<li><a href="addreceptionist.php">+ Add Receptionist</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="addreceptionist.php">
			<fieldset class="account_infor">
			<label>
			<p>Name:</P>
			<input type="text" name="receptionist_name" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Email: </p>
			<input type="email"name="receptionist_email" size="20" maxlength="20" value="" required /></label>
			<label><p>Password: </p>
			<input type="password"name="receptionist_password" size="20" maxlength="15" value="" required /></label>
			
			<label>
			<p>Address: </P>
			<input type="text" name="receptionist_address" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Phone Number:</p>
			<input type="text" name="receptionist_phone" size="20" maxlength="10" value="" required /></label>
			<br />
			
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Receptionist" style="background:grey; color:white;"/></p>
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
				$receptionist_name=$_POST['receptionist_name'];
				$receptionist_email=$_POST['receptionist_email'];
				$receptionist_password=$_POST['receptionist_password'];
				$receptionist_address=$_POST['receptionist_address'];
				$receptionist_phone=$_POST['receptionist_phone'];
													
		$insert_doc= "insert into receptionist (receptionist_name, receptionist_email,receptionist_password, receptionist_address,receptionist_phone) values('$receptionist_name','$receptionist_email','$receptionist_password','$receptionist_address','$receptionist_phone')";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('addreceptionist.php')</script>";
				}
			}
?>






