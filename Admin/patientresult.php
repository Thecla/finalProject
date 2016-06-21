<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>


<!DOCTYPE html>

<html>
<head>
<title>Product Page</title>
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
				<li><a href="../logout.php">LOGOUT</a>
				</ul>
			<div id="form1">
		<form method="get" action="pateintresult.php" enctype="multipart/form-data" style="float:right; padding-top:2px;">
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
				<li><a href="patientresult.php">Patient Search</a></li>
						
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			
			</div>
					
					<table>
			<?php
			if(isset($_GET['search'])){	
			
			$search_query=$_GET['user_query'];
			
			$get_pro ="select * from patient where patient_name like '%$search_query%'";
			$run_pro =mysqli_query($con, $get_pro);
			?>
			<thead>
			<th>#</th>
			<th>National Id</th>
          <th>Name</th>
          <th>Mobile</th>
          <th>Gender</th>
          <th>Date of Birth</th>          
		  <th>Blood Group</th>
		  <th>OPTION</th>
			</thead>
			<tbody>
			<?php
			while($row=mysqli_fetch_array($run_pro)){
				$patient_id=$row['patient_id'];
				echo  "<tr>
              <td>{$row['patient_id']}</td>
			  <td>{$row['national_id']}</td>
              <td>{$row['patient_name']}</td>
              <td>{$row['patient_mobile']}</td>
              <td>{$row['patient_sex']}</td>
              <td>{$row['patient_dob']}</td>
              <td>{$row['patient_blood_group']}</td>
			<td> <a href='updatepatient.php?patient_id=$patient_id'>Click to Update</a></td>
            </tr>\n";
				}
			}

			?>
			</tbody>
			</table>
						
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
