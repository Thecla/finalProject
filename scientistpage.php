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
				<form method="get" action="patientresult.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a patient"/>
				<input type="submit" name="search" value="search" />
				</form>
			</div>-->
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboad</div>
				<ul id="cats">			
				<li><a href="labreport.php">Laboratory Reports</a></li>
				</ul>			
			<div id="sidebar_title"> </div>
				<ul id="cats">
					
				</ul>				
			</div>
			<div id="content_area">
			
<!--<div id="single_product" style="">-->
							
			<section id="products_box" style="padding:0px; margin:0px; margin-bottom:10px;padding-bottom:20px">
			<div id="admin" style="border:0px; padding:0px"><h2 style="text-align:center; padding-top:20px"> Laboratory Scientist </h2>
			<h1>Welcome <?php 
				$query="select * from users where username='$_SESSION[mysesi]'";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)){
				$name=$row['username'];
				
				echo "$name";
				 }
				?>
				</div>
				
			<ul style="padding-bottom:10px">
			<li><img src="images/patient.jpg" height="40" width="30" />Patients</li>	
			<li><img src="images/medicine.jpg" height="40" width="30" />Medicine</li>
			<li><img src="images/lab.jpg" height="40" width="30" />Scientist</li>
			</ul>
			</section>
			<!--</div>-->
			<div id="department">
			<ul>
			<li><a href="#">Lab Request List</a></li>
			</ul>
			</div>
			<?php
     //execute the SQL query and return records
      $result = "SELECT * FROM laboratory WHERE date=CURDATE()";	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");     
      ?>
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>          
          <th>Doctor</th>
          <th>Patient ID</th>		  
		  <th>Test Details</th>		
          <th>Date</th>        
	  </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) ){		
            echo
            "<tr>
                 <td>{$row['lab_dname']}</td>
              <td>{$row['national_id']}</td>              
			  <td>{$row['test']}</td>			  
			  <td>{$row['date']}</td>			  
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
			</div>
		</div>
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->
	</div>
</body>

</html>