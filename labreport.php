<?php
session_start();
 
if (!isset($_SESSION['mysesi'])=='$name' && !isset($_SESSION['mytype'])=='SCIENTIST')
{
  echo "<script>window.location.assign('logintest.php')</script>";
  include_once("includes/db_connect.php");
}
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Scientist Page</title>
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
				<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			<!--<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a product"/>
				<input type="submit" name="search" value="search" />
				</form>
			</div>-->
			</div>
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboad</div>
				<ul id="cats">			
				<li><a href="labreport.php">Laboratory Reports</a></li><li>
				<a href="labreportlist.php">Lab Report List</a></li><li>
				<a href="scientistpage.php"><img src="images/arrow.png" style="height:30px; width:30px float:left" />Return</a></li>
			
				</ul>			
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>				
			</div>
			<div id="content_area">			
							
			<section id="products_box" style="padding:0px; margin:0px; margin-bottom:10px;padding-bottom:20px">
			<div id="admin" style="border:0px; padding:0px"><h2 style="text-align:center; padding-top:20px"> Laboratory Scientist </h2>
				</div>		
			</section>
			
		<div id="register">
			<div id="department">
			<ul>
			<li><a href="labreportlist.php"> Lab Result List</a></li>
			<li><a href="labreport.php"> Process Lab Request</a></li>
			</ul>
			</div>
			<form name="form1" method="post" action="labreport.php" enctype="multipart/form-data">
			<fieldset class="account_infor">
			<label>
			<p>Scientist:</P>
			<select name="sc_name">
							<option>-------</option>
							<?php
						$get_ps= "select * from scientist";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['scientist_id'];
						$p_title= $row_cats['scientist_name'];
						echo"<option value='$p_title'>$p_title</option>";
	}
							?>
						</select>
			
			<br />
			</label>
			<label>
			<p>Patient Id: </P>			
			<select name="p_national_id">
							<option>-------</option>
							<?php
						$get_ps= "select * from patient";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						//$p_id =$row_cats['patient_id'];
						//$national_id= $row_cats['national_id'];
						//$p_title= $row_cats['patient_name'];
						echo"<option value='$row_cats[national_id]'>$row_cats[national_id]</option>";
						}
						?>
	
						</select>
			</label>
			<br />
			
			<label>
			<p>Reports</p>
			<input type="file" name="report" />
			</label>
			</fieldset>
			<fieldset class="account-action">
			<input class="btn" type="submit" name="submit" value="Add Report" style="background:grey; color:white;"/></p>
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
				$sc_name=$_POST['sc_name'];
				$p_national_id=$_POST['p_national_id'];
				//$date=$_POST['date'];
				
				//getting the report from the field
				$report=$_FILES['report']['name'];
				$report_image_tmp=$_FILES['report']['tmp_name'];			
				move_uploaded_file($report_image_tmp,"lab_reports/$report");
			
				
						
		 $insert_doc= "insert into lab_report (sc_name, p_national_id,p_name,'$p_title',report,date) values('$sc_name','$p_national_id','$report', now())";
			
			$insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
				echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('labreport.php')</script>";
				}
			}
?>
		