<?php
require_once("includes/db_connect.php");
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<?php
			if(isset($_POST['update'])){
				//getting the text data from the fields
				$patient_id=$_POST['patient_id'];
				$patient_name=$_POST['patient_name'];
				$patient_email=$_POST['patient_email'];
				$patient_address=$_POST['patient_address'];
				$patient_mobile=$_POST['patient_mobile'];
				$patient_sex=$_POST['patient_sex'];
				$patient_dob=$_POST['patient_dob'];
				$patient_blood_group=$_POST['patient_blood_group'];
				
						
		 $update= "update patient SET patient_name='$patient_name', patient_email='$patient_email', patient_address='$patient_address',patient_mobile='$patient_mobile',patient_sex='$patient_sex',patient_dob='$patient_dob',patient_blood_group='$patient_blood_group' WHERE patient_id='$patient_id'";
 		 
			$result=mysqli_query($con, $update);
				if($result){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('updatepatient.php')</script>";
				}
				if($patient_id==""){
					echo "<script> alert('patient not in the database')</script>";
					echo "<script>window.open('updatepatient.php')</script>";
				}
				header("location:patientlist.php");
			}
?>
<?php 
if(isset($_GET['patient_id'])){
	$patient_id=$_GET['patient_id'];
	$sql= "SELECT * FROM patient WHERE patient_id='$patient_id' LIMIT 1";
	$count=mysqli_query($con,$sql);
			$productCount=mysqli_num_rows($count);
			if($productCount>0){			
			while($row=mysqli_fetch_array($count)){
			$patient_id=$row['patient_id'];
			$patient_name=$row['patient_name'];
			$pateint_email=$row['patient_email'];
			$patient_address=$row['patient_address'];
			$patient_mobile=$row['patient_mobile'];
			$patient_sex=$row['patient_sex'];
			$patient_dob=$row['patient_dob'];
			$patient_blood_group =$row['patient_blood_group'];		
			}
			if($count){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('patientlist.php')</script>";
				}
}
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
				<a href="product.php">Product</a></li><li>
				<a href="Adminpage.php">Admin</a></li>
				</ul>
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			
			</div>
			<form name="form1" method="post" action="updatepatient.php">
			<fieldset class="account_infor">
			<label>
			<p>Id To Update:</P>
			<input type="text" name="patient_id" size="20" maxlength="20" value="<?php echo $patient_id;?>" /></label>
			<label>
			<p>Name:</P>
			<input type="text" name="patient_name" size="20" maxlength="20" value="" /></label>
			<br />
			<label><p>Email: </p>
			<input type="email"name="patient_email" size="20" maxlength="20" value="" /></label>
			<br />
			<label>
			<p>Address: </P>
			<input type="text" name="patient_address" size="20" maxlength="20" value="" /></label>
			<br />
			<label><p>Phone Number:</p>
			<input type="text" name="patient_mobile" size="20" maxlength="10" value="" /></label>
			<br />
			<label><p>Gender:</P> 
			<select name="patient_sex">
							<option>select Gender</option>
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
			                    <option> select blood group</option>
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
			<input class="btn" type="submit" name="update" value="Update Pateint" style="background:grey; color:white;"/></p>
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









