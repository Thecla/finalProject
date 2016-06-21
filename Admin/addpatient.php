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
				<li><a href="#">Home</a></li>				
				<a href="../logout.php">LOGOUT</a><li>
				</ul>
			<div id="form1">
		<form method="get" action="patientresult.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="search a patient"/>
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
				<a href="receptionist.php">Receptionist</a><li>
				<a href="Adminpage.php">Admin</a></li></li>
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
			<li><a href="patientlist.php">Pateint List</a></li>
			<li><a href="addpatient.php">+ Add PAtient</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="addpatient.php">
			<fieldset class="account_infor">
			<label>
			<p>National Id:</P>
			<input type="text" name="national_name" size="20" maxlength="20" value="" required /></label>
			<label>
			<p>Name:</P>
			<input type="text" name="patient_name" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Email: </p>
			<input type="email"name="patient_email" size="20" maxlength="20" value="" required /></label>
			<br />
			<label>
			<p>Address: </P>
			<input type="text" name="patient_address" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Phone Number:</p>
			<input type="text" name="patient_mobile" size="20" maxlength="10" value="" required /></label>
			<br />
			<label><p>Gender:</P> 
			<select name="patient_sex">
							<option>Select Gender</option>
								<option value="female">Female</option>
								<option value="male">male</option>
				</select>
			</label>
			<br />
			<label>
			<p>Date of Birth:</p>
			<input id="datepicker" type="date" name="patient_dob" size="20" maxlength="10" value="" /></label>
			<br />
			
			<p>Blood Group: </P>
			
			<select name="patient_blood_group">
			                    <option> Select Blood Group</option>
								<option value="A">A+</option>
								<option value="A-">A-</option>
								<option value="B">B+</option>
								<option value="B-">B-</option>
								<option value="O">O+</option>
								<option value="O-">O-</option>
				</select>
			
			</label>
			<br />
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Pateint" style="background:grey; color:white;"/></p>
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
require_once("includes/db_connect.php");
			if(isset($_POST['submit'])){
				//getting the text data from the fields
				$national_id=$_POST['national_id'];
				$patient_name=$_POST['patient_name'];
				$patient_email=$_POST['patient_email'];
				$patient_address=$_POST['patient_address'];
				$patient_mobile=$_POST['patient_mobile'];
				$patient_sex=$_POST['patient_sex'];
				$patient_dob=$_POST['patient_dob'];
				$patient_blood_group=$_POST['patient_blood_group'];
				
						
		 $insert_doc= "insert into patient (national_id,patient_name, patient_email, patient_address,patient_mobile,patient_sex,patient_dob,patient_blood_group) values('$national_id','$patient_name','$patient_email','$patient_address','$patient_mobile','$patient_sex','$patient_dob','$patient_blood_group')";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('addpatient.php')</script>";
				}
			}
?>






