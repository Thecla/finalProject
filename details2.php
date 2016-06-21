<!DOCTYPE html>
<?php
require_once("includes/db_connect.php");
require_once("Functions/function.php");
?>
<html>
<head>
<title>Lab report details</title>
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
			
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title"></div>
				<ul id="cats">
				
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			
			<div id="products_box">
			<?php
			if(isset($_GET['lab_report_id'])){
			$lab_report_id= $_GET['lab_report_id'];
			$get_pro ="select * from lab_report where lab_report_id='$lab_report_id'";
			$run_pro =mysqli_query($con, $get_pro);
			
			while($row_pro=mysqli_fetch_array($run_pro)){
				$lab_report_id=$row_pro['lab_report_id'];
				$national_id= $row_pro['p_national_id'];							
				$report=$row_pro['report'];
			
			
				echo "
					<div id='single_product'>
					<h3>national_id: $national_id</h3>
					<p> </p>
					<img src='lab_reports/$report' width='300' height='300' />			
					</div>	
					<a href='labreportlist1.php?lab_report_id=$lab_report_id' style='float:left'>Go Back</a>
					
					
				
				
				";
			}}
			
			?>
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