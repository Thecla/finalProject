<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<?php
require_once("includes/db_connect.php");
	if(isset($_GET['patient_id'])){
		echo'Do you really want to delete this item with id'.$_GET['patient_id'].'?<a href="patientlist.php?yesdelete='.$_GET['patient_id'].'">Yes</a>|<a href="patientlist.php">No</a>';
		exit();
	}
	if(isset($_GET['yesdelete'])){
		//remove the product from the database
		$patient_id=$_GET['yesdelete'];
		$sql="DELETE FROM patient WHERE patient_id='$patient_id'LIMIT 1";
		$delete_pro=mysqli_query($con,$sql);
		if($patient_id)
  {
      header("Location:patientlist.php");
  }
  else
  {
      echo mysqli_error($con);
  }
	}
	
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Patient List</title>
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
	  <!-- Begginning of the detete form -->
	  		<div id="form">
		<form method="POST" action="test.php" enctype="multipart/form-data">
		<input type="text" name=" " placeholder="Print Report"/>
	<a href="test.php"><input type='submit' name='delete' value='Print Report' /></a>
	</form>
	<!-- beginning of the table-->
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>
          <th>#</th>
           <th>ID</th>
		<th>Name</th>
          <th>Mobile</th>
          <th>Gender</th>
          <th>Date of Birth</th>          
		  <th>Blood Group</th>
		  <th>OPTION</th>
        </tr>
      </thead>
	  
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) ){
	
		$patient_id=$row['patient_id'];
            echo
            "<tr>
              <td>{$row['patient_id']}</td>
			   <td>{$row['national_id']}</td>
              <td>{$row['patient_name']}</td>
              <td>{$row['patient_mobile']}</td>
              <td>{$row['patient_sex']}</td>
              <td>{$row['patient_dob']}</td>
              <td>{$row['patient_blood_group']}</td>
			  <td><a href='updatepatient.php?patient_id=$patient_id'>edit</a> &bull; <a href='patientlist.php?patient_id=$patient_id'>delete</a></td>
		
            </tr>\n";
          }
        ?>
      </tbody>
	  <!--end of the table-->				
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
<?php
	if(isset($_POST['delete'])){
		$patient_id=$_POST['patient_id'];
		$query= "delete from patient where patient_id=$patient_id";
		$result=mysqli_query($con, $query);
		if($result){
		echo "<script>data succefully deleted</script>";
		echo "<script>window.open('patientlist.php','_self')</script>";
		}
	}
?>







