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
				<a href="#">All products</a></li><li>
				<a href="logout.php">LOGOUT</a></li>
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
				<li><a href="patientlist.php">Patients</a></li><li>
				<a href="appointment.php">Manage Appointment</a></li><li>
				<a href="prescription.php">Manage Prescription</a></li><li>
				<a href="labtest.php">Laboratory Test</a></li><li>
				<a href="labreportlist1.php">Laboratory Reports</a></li>	
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="patientlist.php">Pateint List</a></li>
			<li><a href="addpatient.php">+ Add Patient</a></li>
			</ul>
			</div>
			<?php
    

     //execute the SQL query and return records
      $result = "SELECT * FROM patient ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
		  <th>ID</th>
          <th>Mobile</th>
          <th>Gender</th>
          <th>Date of Birth</th>          
		  <th>Blood Group</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) ){
	
		
            echo
            "<tr>
              <td>{$row['patient_id']}</td>
			  <td>{$row['national_id']}</td>
              <td>{$row['patient_name']}</td>
              <td>{$row['patient_mobile']}</td>
              <td>{$row['patient_sex']}</td>
              <td>{$row['patient_dob']}</td>
              <td>{$row['patient_blood_group']}</td> 
			  
            </tr>\n";
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








