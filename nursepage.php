<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='NURSE')
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
<title>Nurse Area</title>
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
				<a href="#">All Services</a></li><li>
				<a href="logout.php">LOGOUT</a></li><li>
				
				</ul>
			<div id="form">
				<form method="get" action="Admin/patientresult.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a patient"/>
				<input type="submit" name="search" value="search" />
				</form>
			</div>
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboad</div>
				<ul id="cats">
					
				<li><a href="patientlist2.php">Patients</a></li><li>
				<a href="prescription2.php">Manage Prescription</a></li><li>				
				<a href="labreportlist2.php">Laboratory Reports</a></li>
				</ul>
			
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			
			<div id="single_product">
				<div id="admin"><h2 style="text-align:center"> Nurse Area </h2>
				<h1>Welcome <?php 
				$query="select * from nurse where nurse_name='$_SESSION[user_name]'";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)){
				$name=$row['nurse_name'];
				
				echo "$name";
				 }
				?>
				
				</h1>
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
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->
	</div>
</body>

</html>