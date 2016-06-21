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
				<a href="receptionist.php">Receptionist</a></li>
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="pharmacistlist.php">Pharmacist List</a></li>
			<li><a href="addpharmacist.php">+ Add Pharmacist</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="addpharmacist.php">
			<fieldset class="account_infor">
			<label>
			<p>Name:</P>
			<input type="text" name="pharmacist_name" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Email: </p>
			<input type="text"name="pharmacist_email" size="20" maxlength="20" value="" required /></label>
			<br />
			<label>
			<p>Password: </P>
			<input type="password" name="pharmacist_password" size="20" maxlength="20" value="" required /></label>
			<br />
			<p>Address: </P>
			<input type="text" name="pharmacist_address" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Phone Number:</p>
			<input type="text" name="pharmacist_phone" size="20" maxlength="40" value="" required /></label>
			<br />
			
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Pharmacist" style="background:grey; color:white;"/></p>
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
				$pharmacist_name=$_POST['pharmacist_name'];
				$pharmacist_email=$_POST['pharmacist_email'];
				$pharmacist_password=$_POST['pharmacist_password'];
				$pharmacist_address=$_POST['pharmacist_address'];
				$pharmacist_phone=$_POST['pharmacist_phone'];
						
						
		$insert_doc= "insert into pharmacist (pharmacist_name, pharmacist_email, pharmacist_password, pharmacist_address, pharmacist_phone) values('$pharmacist_name','$pharmacist_email','$pharmacist_password','$pharmacist_address','$pharmacist_phone')";
			
			echo $insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
			echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('addpharmacist.php')</script>";
				}
				header("location:addpharmacist.php");
			}
?>






