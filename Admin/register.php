<?php
require_once("/includes/db_connect.php");
?>

<!DOCTYPE html>
<?php

require_once("Functions/function.php");
?>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body style="background: linear-gradient(#49708f, #293f50);">
<div class="main_wrapper" style=" margin-top:30px; width:800px">
		<div class="header" style="width:550px;padding-top:30px;">
		
		<center>
		<img id="cuealogo" src="images/cuealogo.jpg" style="height:100px; width:600px float:center" />
		<h2 style="color:#293f50; padding-top:20px">Infirmary System Registration Section</h2>
		</center>
		</div>
<div class="content_wrapper" style="background-repeat:no-repeat;margin-top:0px; padding-top:50px;width:550px;height:500px;">
<!-- main starts here-->
		<center>
		<form  name="form1" action ="register.php" method="POST">
		<fieldset class="account_infor">
		<p>Username:</P>
			<input type="text" name="username" size="20" maxlength="20" value="" required /></label>
			<br />
			<label><p>Email: </p>
			<input type="email"name="email" size="20" maxlength="20" value="" required /></label>
			<label><p>Confirm Email: </p>
			<input type="email"name="email2" size="20" maxlength="20" value="" required /></label>
			<label><p>Password: </p>
			<input type="password"name="upassword" size="20" maxlength="20" value="" required /></label>
			<br />
			<label>
			<p>Confirm Password: </P>
			<input type="password" name="upassword" size="20" maxlength="20" value="" required /></label>
			<p>User Role: </P>
			<input type="text" name="urole" size="20" maxlength="20" value="" required /></label>
		</fieldset>
		<fieldset style="width:200px; height:1px;" class="account-action">
		<input class="btn" type="submit" name="register" value="Register">
		</fieldset>
		</form>
		<center>
		</div>
		</div>
</body>

</html>
   
<?php

	
	if(isset($_POST['register'])){
				//getting the text data from the fields
				$username=$_POST['username'];
				$upassword=md5($_POST['upassword']);	
				$upassword=md5($_POST['upassword']);
				$email=$_POST['email'];
				$email2=$_POST['email'];
				$urole=$_POST['urole'];
				
				//testing if username and password is alphanumeric
				if(!eregi("([^A-Za-z])", $username)){
				//test for duplicate names
				$query="SELECT * FROM users WHERE username='$_POST[username]'";
				$result=mysqli_query($con, $query);
				$num=mysqli_num_rows($result);
				while($row=mysqli_fetch_array($result)){
				$username=$row['username'];
				if(!empty($username)){
				echo "Username already in use";
				}
				}
				
				if($num==0){
				testing for duplicate email
				$query2="SELECT * FROM users WHERE email='$_POST[email]'";
				$result2=mysqli_query($con, $query2);
				$num2=mysqli_num_rows($result2);
				while($row=mysqli_fetch_array($result)){
				$email=$row['email'];
				if(!empty($email)){
				echo "Email already in use";
				}
				}
				if($num2==0){
				// testing if email and password match
						if((($_POST['upassword'])==('$upassword') )&& (($_POST['email'])==('$email'))){
					//get rid of all html from hackers
					$username=mysqli_real_escape_strig($_POST['username']);
				$upassword=md5(mysqli_real_escape_string($_POST['upassword']));
				$email=mysqli_real_escape_string($_POST['email']);
				$urole=mysqli_real_escape_string($_POST['urole']);
				
						$insert_doc= "insert into users (username,email, upassword, urole) values('$username','$upassword','$email','$upassword')";
			
			echo $insert_pro=mysqli_query($con, $insert_doc);
				if($insert_pro){
			echo "<script>alert(' data has been inserted successfully')</script>";
				echo "<script>window.open('register.php')</script>";
				}
				header("location:register.php");
			}
						//}
				//}
				
				
				header("Location:register.php");
				//}
				}
				
						
						
		

?>