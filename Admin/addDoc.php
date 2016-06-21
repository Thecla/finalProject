<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<!DOCTYPE html>
<html>
<?php
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
				<a href="receptionist.php">Receptionist</a></li></li>
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
			<li><a href="doctorlist.php">Doctors List</a></li>
			<li><a href="addDoc.php">+ Add Doctor</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="addDoc.php">
			<fieldset class="account_infor">
			<p>Name: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="doctor_name" size="20" maxlength="20" value="" required /></P>
			<br />
			<p>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email"name="doctor_email" size="20" maxlength="20" value="" required /></p>
			<br />
			<p>Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="doctor_password" size="20" maxlength="20" value="" required /></p>
			<br />
			<p>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="doctor_address" size="20" maxlength="40" value="" required /></p>
			<br />
			<p>Phone Number: <input type="text" name="doctor_phone" size="10" maxlength="10" value=""required /></p>
			<br />
					
			<p>Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="doctor_department">
					<option>Select Department</option>
					<?php
					$get_dept= "select * from department";
					$run_dept= mysqli_query($con, $get_dept);
	
					while($row_dept=mysqli_fetch_array($run_dept)){
					$Department_id =$row_dept['Department_id'];
					$Department_Name= $row_dept['Department_Name'];
					echo"<option value='$Department_Name'>$Department_Name</option>";
						}
					
					?>
					</select>
						</p>
			<br />
			<p>Profile:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="doctor_profile" size="20" maxlength="20" value="" required /></p>
			</fieldset>
			<br />
			<fieldset class="account-action">
			<p><input class="btn" type="submit" name="submit" value="Add Doctor" /></p>
				</fieldset>		
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
				$doctor_name=$_POST['doctor_name'];
				$doctor_email=$_POST['doctor_email'];
				$doctor_password=$_POST['doctor_password'];
				$doctor_address=$_POST['doctor_address'];
				$doctor_phone=$_POST['doctor_phone'];
				$doctor_department=$_POST['doctor_department'];
				$doctor_profile=$_POST['doctor_profile'];
				
						
		 $insert_doc= "insert into doctor (doctor_name, doctor_email, doctor_password, doctor_address,doctor_phone,doctor_department, doctor_profile) values('$doctor_name','$doctor_email','$doctor_password','$doctor_address','$doctor_phone','$doctor_department','$doctor_profile')";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert('data has been inserted successfully')</script>";
				echo "<script>window.open('addDoc.php')</script>";
				}
			}
?>






