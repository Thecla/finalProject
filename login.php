
<!DOCTYPE html>
<?php
require_once("Functions/functions.php");
?>
<html>
<head>
<title>log in</title>
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
		<div class="menubar1" >
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
			</div>
		
		<!-- main ends here-->
		
		<div class="content_wrapper">
			
		
		</div>
<!-- main ends here-->
	</div>
</body>

</html>