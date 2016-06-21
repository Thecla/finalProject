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

<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Prescription Report</title>
<link rel="stylesheet" href="style/style.css" media="all" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript">
$(function() {
$("#txtDate").datepicker({ dateFormat: 'yy-mm-dd' });
$("#txtDate2").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
<style type="text/css">
.ui-datepicker { font-size:8pt !important}
</style>
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
			</div>
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper" >
			
			<div id="content_area" style="background:white; weight:800px; height:400px">
			<div id="register"  style=" margin-top:20px; margin-right:100px; background:white; height:300px;padding-top:30px; border:none;>
			
			<form method="POST" action="test4.php" enctype="multipart/form-data">
	<input type="text" id="txtDate" value="" placeholder="YYYY-MM-DD" name="StartDate"/>
	<input type="text" id="txtDate2" value="" placeholder="YYYY-MM-DD" name="EndDate"/>
	<a href="test4.php" style="text-decoration:none;"><input style="background:#293f50; color:white;"type='submit' name='submit' value='Print Report' /></a>
	</form>      
			
			<?php    

     //execute the SQL query and return records
      $result = "SELECT * FROM prescription ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
	  

			</div>		
			
			</div>
		
		
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->

		</div>
</body>

</html>








