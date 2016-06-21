<?php 
	if (!isset($_GET['from_login'])){
		header("location:logintest.php"); 
		exit();
	}	
?>
<!DOCTYPE html>
<?php
require_once("Functions/functions.php");
?>
<html>
<head>
<title>Register</title>
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
				<a href="../logout.php">LOGOUT</a></li>
				</ul>
		
			</div>
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
			<center>
	<div id="login-form">
	<form name="form1" method="post" action="index.php?from_login=1">
	<fieldset class="account_infor">
	<label>	<p><select name="role">
			  <option value="DOCTOR" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'DOCTOR')){ echo 'selected="'.$_GET['utype'].'"'; }?>>DOCTOR</option>	
			  <option value="NURSE" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'NURSE')){ echo  'selected="'.$_GET['utype'].'"'; }?>>NURSE</option>
			  <option value="SCIENTIST" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'SCIENTIST')){ echo  'selected="'.$_GET['utype'].'"'; }?>>SCIENTIST</option>
			  <option value="RECEPTIONIST" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'RECEPTIONIST')){ echo  'selected="'.$_GET['utype'].'"'; }?>>RECEPTIONIST</option>
			  <option value="ACCOUNTANT" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'ACCOUNTANT')){ echo  'selected="'.$_GET['utype'].'"'; }?>>ACCOUNTANT</option>
				<option value="PHARMACIST" <?php if(isset($_GET['utype']) && ($_GET['utype'] == 'PHARMACIST')){ echo  'selected="'.$_GET['utype'].'"'; }?>>PHARMACIST</option>
		</select></p></label>
<label>			
	<p><input type="text" name="uname" placeholder="User Name" required value="<?php if(isset($_GET['uname'])){ echo $_GET['uname']; } ?>"/>
	</p></label>	
	<p><input type="email" name="email" placeholder="Your Email" required value="<?php if(isset($_GET['email'])){ echo $_GET['email']; } ?>"/></p>
	<p><input type="password" name="pass" placeholder="Your Password" required /></P>
	<p><input type="password" name="cpass" placeholder="Confirm Password" required /></p>
	<p><input type="text" name="address" placeholder="address" required /></p>
	<p><input type="text" name="phone" placeholder="mobile Number" required /></p>	
	<p><select name="department">
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
					</select></p>
	<p><input type="text" name="profile" placeholder="Specialization" required /></p>
	</fieldset>
			<br />
			<fieldset class="account-action">
	<input type="submit" class="btn" name="submit" value="Add Users">
	</fieldset>
<?php if(isset($_GET['utype'])){ echo '<p style="color:red">Passwords dont match!</p>'; } ?>
<!--<a href="logintest.php">Sign In Here</a>-->

</form>
</center>
</div>
</div>
</div>

			
	<?php
		if(isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['uname']) && isset($_POST['role']) && isset($_POST['email'])){
			if($_POST['pass'] != $_POST['cpass']){

				//echo '<script>alert("Passwords dont match")</script>';
				
				$link = 'index.php?from_login=1&uname='.$_POST['uname'].'&email='.$_POST['email'].'&utype='.$_POST['role'];				
				//echo '<script>alert("'.$link.'")</script>';
				header("location:$link");
				exit;
			}else{

				if(signup($_POST['role'],$_POST['uname'],$_POST['email'],$_POST['pass'])){

					echo '<script>alert("Successfully added user")</script>';
				}else{

					echo '<script>alert("Unable to add user, try again")</script>';
				}
			}
		header("Location:index.php");	
		}

			if(isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['uname']) && isset($_POST['role']) && isset($_POST['email'])){
			if($_POST['role'] =='DOCTOR'){
			if($_POST['pass'] != $_POST['cpass']){

				//echo '<script>alert("Passwords dont match")</script>';
				
				$link = 'index.php?from_login=1&uname='.$_POST['uname'].'&email='.$_POST['email'].'&utype='.$_POST['role'];				
				//echo '<script>alert("'.$link.'")</script>';
				header("location:$link");
				exit;
			}else{
			
			session_start();
			$password = md5($_POST['pass']);
			$uname=$_POST['uname'];
			$email= $_POST['email'];
			$address= $_POST['address'];
			$phone= $_POST['phone'];
			$department=$_POST['department'];
			$profile=$_POST['profile'];
	$query = "insert into doctor(doctor_name,doctor_email,doctor_password, doctor_address,doctor_phone, doctor_department, doctor_profile)".
			" values('$uname','$email','$password','$address','$phone','$department','$profile')";
	$result = mysqli_query($con, $query);
	if($result){
		return true;
		
	}
			}
			
			}
			//header("Location:index.php");
			}
				

	?>
<!-- main ends here-->

		
	<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>	
	</div>	
		
</body>

</html>