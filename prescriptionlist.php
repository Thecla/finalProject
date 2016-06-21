<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='DOCTOR')
{
  echo "<script>window.location.assign('logintest.php')</script>";
}
?>
<?php
include_once("includes/db_connect.php");
?>
<?php
	//if(isset($_GET['prescription_id'])){
	//	echo'Do you really want to delete this item with id'.$_GET['prescription_id'].'?<a href="prescriptionlist.php?yesdelete='.$_GET['prescription_id'].'">Yes</a>|<a href="prescriptionlist.php">No</a>';
	//	exit();
//}
	//if(isset($_GET['yesdelete'])){
		//remove the product from the database
	//	$id_to_delete=$_GET['yesdelete'];
	//	$sql="DELETE FROM prescription WHERE prescription_id='$prescription_id' LIMIT 1";
	//	$delete_pro=mysqli_query($con,$sql);
	//	if($prescription_id)
  //{
    //  header("Location:prescriptionlist.php");
 // }
 // else
  //{
   //   echo mysqli_error($con);
  //}
	//}
	
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Doctor List</title>
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
				<li><a href="logout.php">LOGOUT</a></li>				
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
			<div id="sidebar">
				<div id="sidebar_title">Dashboard</div>
				<ul id="cats">
				<li><a href="patientlist.php">Patients</a></li><li>
				<a href="appointment.php">Manage Appointment</a></li><li>
				<a href="prescription.php">Manage Prescription</a></li><li>
				<a href="labreportlist1.php">Laboratory Reports</a></li><li>
				<a href="doctorpage.php">Doctor Page</a></li>
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="prescriptionlist.php">Prescription Details</a></li>
			<li><a href="prescription.php">+ Make Prescription</a></li>
			</ul>
			</div>
			<form method="POST" action="test2.php" enctype="multipart/form-data">
	<input type="text" value="" placeholder="YYYY-MM-DD" name="StartDate"/>
	<input type="text" value="" placeholder="YYYY-MM-DD" name="EndDate"/>
	<a href="test2.php" style="text-decoration:none;"><input style="background:#293f50; color:white;"type='submit' name='submit' value='Print Report' /></a>
	</form>
			<?php    

     //execute the SQL query and return records
      $result = "SELECT * FROM prescription ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
	  
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>
          
          <th>Doctor</th>
          <th>National Id</th>          
		    <th>Drug Prescription</th>
		  <th>Date</th>
		  <th>Option</th>
        
	  </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) ){
			$prescription_id_id=$row['prescription_id'];
		
            echo
            "<tr>
			
                 <td>{$row['doc_name']}</td>
              <td>{$row['national_id']}</td>			  
			  <td>{$row['drug_prescription']}</td>
              <td>{$row['date']}</td>
           
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








