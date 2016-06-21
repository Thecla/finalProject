
<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

if(isset($_POST['btn-signup']))
{
 $uname = mysqli_real_escape_string($_POST['uname']);
 $email = mysqli_real_escape_string($_POST['email']);
 $upass = md5(mysqli_real_escape_string($_POST['pass']));
 
 if(mysqli_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
?>






<!DOCTYPE html>
<?php
require_once("Functions/functions.php");
?>
<html>
<head>
<title>Register</title>
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
	<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
	<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
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