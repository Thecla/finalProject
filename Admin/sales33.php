<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<!DOCTYPE html>
<?php
require_once("Functions/functions2.php");
session_start();
//session_destroy();
//require_once ('CartPratice.php');
?>

<html>
<head>
<title>Sales Page</title>
<link rel="stylesheet" href="style/style.css" media="all" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
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
				<a href="#">All Services</a></li><li>
				<a href="../logout.php">LOGOUT</a>
				</ul>
			<div id="form1">
		<form method="get" action="result.php" enctype="multipart/form-data">
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
				<li><a href="productlist.php">Medicines</a></li><li>
				<a href="company.php">Companies</a></li><li>
				<a href="salesrecord.php">View Sales Record</a></li><li>
				<a href="sales.php">New Sales</a></li><li>
				<a href="product.php">Manage Inventory</a></li><li>
				<a href="updateproduct.php">Update Medicine</a></li>			
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			
			<div id="department"  style="background-color:white; height:auto; width:500px;">
			<form method="POST" action="sales33.php">
				<input type="text" name="user_query" placeholder="enter patatient id"/>
				<input type="submit" name="submit" value="Get Details"/>
				
				</form>
				</div>
				<div id="display">
			<?php 
			if(isset($_POST['user_query'])){
				patient_details($_POST['user_query']); 
			}
			
			?>
			</div>
			<?php
			$product_list="";
			$sql="SELECT product_id,product_name, price, Qunatity FROM product where Qunatity >0";
			$count=mysqli_query($con,$sql);
			$productCount=mysqli_num_rows($count);
			if($productCount==0){
			
				echo "<h2>There are no products found</h2>";		
			}
			
			?>
			<form action ="salesinvoice33.php" method="post" enctype="multipart/form-data">

			<table>
		<tr>ITEMS FROM THE DATABASE AND THEIR PRICES</tr>
			<thead>
			<th>#</th>			
			<th>Product Name</th>
			<th>Unit Price</th>	
			
			</thead>
			
			
			<tbody>
	<?php
			// displaying the products from the database
			while($row=mysqli_fetch_array($count)){
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];			
			$price =$row['price'];
			?>
	<?php
			echo "
			<tr>
			<td><a href='sales33.php?add=$product_id'>Add</a></td>
			<td>$product_name</td>			
			<td>$price</td>
					
			</tr>";}?>
	
	
	
	
			</tbody>
			
			</table>
				<button><a href="salesinvoice33.php" style="text-decoration:none; color:black">process payment</a></button>
			</form>
		
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
if (isset($_GET['add'])){
global $con;

$product_id=$_GET['add'];
	$quantity= "SELECT product_id, Qunatity FROM product where product_id='$product_id'";
	$result=mysqli_query($con,$quantity);
	while($quantity_row=mysqli_fetch_array($result)){
	
	if($quantity_row['Qunatity']!=$_SESSION['cart_'.$_GET['add']]){
		$_SESSION['cart_'.$_GET['add']]+='1';
		
	}
	}
	header("Location:sales33.php");
}
if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location:salesinvoice33.php");
}
if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location:salesinvoice33.php");
}
?>
