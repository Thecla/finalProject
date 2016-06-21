<!DOCTYPE html>
<html>
<head>
<title>
Patient Report
</title>
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
<div class="main_wrapper">
		<div class="header">
		<div id="menubar">
		<img id="logo" src="images/logo.jpg" style="height:100px; width:200px" />
		<img id="cuealogo" src="images/cuealogo.jpg" style="height:100px; width:200px float:right" />
		</div>
		</div>
		<div class="menubar">		
			</div>
		</div>
		<div class="content_wrapper" style="" >
		<div id="content_area" style="margin-top:50px;height:300px;" >
<form method="POST" action="test.php" enctype="multipart/form-data">
	<input type="text" id="txtDate" value="" placeholder="YYYY-MM-DD" name="StartDate"/>
	<input type="text" id="txtDate2" value="" placeholder="YYYY-MM-DD" name="EndDate"/>
	<a href="test.php" style="text-decoration:none;"><input style="background:#293f50; color:white;"type='submit' name='submit' value='Print Report' /></a>
	</form>
	</body>
	</div>
	<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
	</div>
	