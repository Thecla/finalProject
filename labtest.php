<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='DOCTOR')
{
  echo "<script>window.location.assign('logintest.php')</script>";
}
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Doctor Area</title>
<link rel="stylesheet" href="style/style.css" media="all" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  <script>
  tinymce.init({ selector:'textarea' });
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
				<li><a href="logout">LOGOUT</a></li>
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
					
				<li><a href="patientlist.php">Patients</a></li><li>
				<a href="appointment.php">Manage Appointment</a></li><li>
				<a href="prescription.php">Manage Prescription</a></li><li>
				<a href="labtest.php">Laboratory Test</a></li><li>
				<a href="labreportlist1.php">Laboratory Reports</a></li>
				</ul>
			
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			
		
				<div id="admin"><h2 style="text-align:center; padding-top:30px"> Doctor Area </h2>
				</div>				
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="labresult.php"> Lab Request List</a></li>
			<li><a href="labtest.php">+ Add Lab Order</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="labtest.php">
			<fieldset class="account_infor">
			<label>
				<p>Doctor:</P>			
							
							<?php
						$get_ps= "select * from doctor where doctor_name='$_SESSION[user_name]'";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['doctor_id'];
						$doc_title= $row_cats['doctor_name'];
						echo"$doc_title";	
	
	}
							?>
								
			<br />
			</label>
			<label>
			<p>Patient: </P>			
			<select name="national_id">
							<option>-------</option>
							<?php
						$get_ps= "select * from patient";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['patient_id'];
						$id= $row_cats['national_id'];
						echo"<option value='$id'>$id</option>";
	}
							?>
						</select>
			</label>
			<br />
			<label>
			<p>Test Details</p>
			<textarea name="test" cols="20" rows="5"></textarea>
			</label>			
			<br />			
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Test" style="background:grey; color:white;"/></p>
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
				$lab_dname=$_POST['lab_dname'];
				$lab_pname=$_POST['national_id'];
				$test=$_POST['test'];
				
				
				
						
		 $insert_doc= "insert into laboratory (lab_dname, national_id,test,date) values('$doc_title','$id','$test',now())";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('labtest.php')</script>";
				}
			}
?>