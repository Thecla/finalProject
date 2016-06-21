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
				<li><a href="#">Home</a></li><li>
				<a href="../logout.php">LOGOUT</a></li>				
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
			<li><a href="doctorlist.php">Doctor List</a></li>
			<li><a href="addDoc.php">+ Add Doctor</a></li>
			</ul>
			</div>
			<?php
    

     //execute the SQL query and return records
      $result = "SELECT * FROM doctor ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Department</th>
          <td>Profile</td>
        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) ){
		  $doctor_id =$row['doctor_id'];
		$doctor_name= $row['doctor_name'];
		$doctor_email =$row['doctor_email'];
		$doctor_department= $row['doctor_department'];
		$doctor_profile =$row['doctor_profile'];
		
            echo
            "<tr>
              <td align='center' padding='2px'>{$row['doctor_id']}</td>
              <td  align='center' padding='2px'>{$row['doctor_name']}</td>
              <td>{$row['doctor_email']}</td>
              <td>{$row['doctor_phone']}</td>
              <td>{$row['doctor_department']}</td>
              <td>{$row['doctor_profile']}</td> 
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








