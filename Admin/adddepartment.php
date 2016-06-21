<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<!DOCTYPE>
<html>
<?php
require_once("includes/db_connect.php");

require_once("Functions/function.php");
?>

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
			<li><a href="depatmentlist.php">Department List</a></li>
			<li><a href="adddepartment.php">+ Add Depatment</a></li>
			</ul>
			</div>
	<form name="form1" action="adddepartment.php" method="post" >
	        <fieldset class="account_infor">
			<p>Department Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Department_Name" placeholder="department name" required /></p>
			<br />
			<br />
			
			<p>Department Description <textarea name="Description" cols="25" rows="2" > </textarea></p>
			<br />
			<br />
			</fieldset>
			<fieldset class="account-action">
			<p><input class="btn" type="submit" name="insert" value="Add Department" /></p>
			</fieldset>
	</form>
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
			if(isset($_POST['insert'])){
				//getting the text data from the fields
		//		$Department_Name=$_POST['Department_Name'];
				//$Description=$_POST['Description'];
				
				
						
		 $insert_department="insert into department (Department_Name,Description) values('$_POST[Department_Name]','$_POST[Description]')";
			
			$insert_dept=mysqli_query($con, $insert_department);
				if($insert_dept){
				echo "<script>alert('department has been inserted successfully')</script>";
				echo "<script>window.open('adddepartment.php')</script>";
				
				
				}
			}
?>