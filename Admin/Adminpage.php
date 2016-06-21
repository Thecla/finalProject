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
<title>Infirmary Admin Area</title>
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
				<li><a href="../logout.php">LOGOUT</a></li>
				<li><a href="reportspage.php">REPORTS</a></li>
				</ul>
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a product"/>
				<input type="submit" name="search" value="search" />
				</form>
			</div>
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboad</div>
				<ul id="cats">
					<li><a href="depatmentlist.php">Department</a></li><li>
				<a href="doctorlist.php">Doctors</a></li><li>
				<a href="patientlist.php">Patients</a></li><li>
				<a href="nurselist.php">Nurses</a></li><li>
				<a href="pharmacistlist.php">Pharmacist</a></li><li>
				<a href="scientistlist.php">Scientist</a></li><li>
				<a href="accountantlist.php">Accountant</a></li><li>
				<a href="receptionist.php">Receptionist</a><li>
				<a href="product.php">Product</a></li><li>
				<a href="index.php?from_login=1">Register Users</a>				
				</ul>
			
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			
			<div id="single_product">
				<div id="admin"><h2 style="text-align:center"> Admin Area </h2>
				</div>				
			<!--http://www.inmotionhosting.com/support/edu/website-design/using-php-and-mysql/php-insert-database-->
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
			<li><img src="images/accountant.jpg" height="40" width="30" />Accountant</li>
			<li><img src="images/payment.jpg" height="40" width="30" />Payments</li>
		</ul>
			</section>
			</div>
		</div>
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->
	</div>
</body>

</html>