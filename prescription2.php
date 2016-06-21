<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='DOCTOR')
{
  echo "<script>window.location.assign('logintest.php')</script>";
}
$con = mysqli_connect("localhost","root","","finalproject");
?>

<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Nurse Area</title>
<link rel="stylesheet" href="style/style.css" media="all" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jQuery2.1.4.js"></script> 
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
				<a href="logout.php">LOGOUT</a></li>				
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
			<div id="sidebar" Style="height:710px">
				<div id="sidebar_title">Dashboad</div>
				<ul id="cats">
					
				<li><a href="patientlist2.php">Patients</a></li><li>				
				<a href="prescription2.php">Manage Prescription</a></li>
				<!--<a href="labtest.php">Laboratory Test</a>--><li>
				<a href="labreportlist2.php">Laboratory Reports</a></li>
				</ul>
				
				
			</div>
			<div id="content_area">			
		
				<div id="admin"><h2 style="text-align:center; padding-top:30px">Nurse Area </h2>
				</div>				
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="prescriptionlist2.php">Prescription List</a></li>
			<li><a href="prescription2.php">+ Add Prescription</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="prescription.php">
			<fieldset class="account_infor">
			<label>
			<p>Nurse:</P>			
							
							<?php
						$get_ps= "select * from nurse where nurse_name='$_SESSION[user_name]'";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['nurse_id'];
						$nuc_title= $row_cats['nurse_name'];
						echo"$nuc_title";	
	
	}
							?>
					
			
			<br />
			</label>
			<label>			
			<p>Patient ID: </P>			
			<select name="national_id">
							<option>-------</option>
							<?php
						$get_ps= "select * from patient";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['patient_id'];
						$national_id= $row_cats['national_id'];
						echo"<option value='$national_id'>$national_id</option>";
	}
							?>
						</select>
			</label>
			<br />
			<br />
			<p></p>
			<br />
			
			<label>
			
			<p>Case History</p>
			<textarea name="case_history" cols="20" rows="5"></textarea>
			</label>
			<label>
			<p>Lab Request</p>
			<textarea name="lab_test" cols="20" rows="5"></textarea>
			</label>
			<label>
			<p>Drug Prescription</p>
			<textarea name="drug_prescription" cols="20" rows="5"></textarea>
			</label>
			<p>description</p>
			<input type="text" name="description" size="30" required />
			</label>
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Prescription" style="background:grey; color:white;"/></p>
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
	<?php
global $con;
			if(isset($_POST['submit'])){
				//getting the text data from the fields
				//$doc_title=$_POST['doc_name'];
				$national_id=$_POST['national_id'];
				$case_history=$_POST['case_history'];
				$lab_test=$_POST['lab_test'];
				$drug_prescription=$_POST['drug_prescription'];
				$description=$_POST['description'];				
						
		 $insert_doc= "insert into prescription (doc_name, national_id,case_history,lab_test,drug_prescription,date,description) values('$doc_title','$national_id','$case_history','$lab_test','$drug_prescription',now(),'$description')";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('prescription.php')</script>";
				}
			}
?>
</body>

</html>
