<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>


<!DOCTYPE html>
<?php
require_once("Functions/function.php");
require_once ('CartPratice.php');
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
		<form method="get" action="productresult.php" enctype="multipart/form-data">
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
			<div id="department" >
			<span style="float: right; font-size=18px; padding:5px; line-height:40px; "> Processing Bill!<b style="color:skyblue; padding:5px">Bill info</b>- Total Items: <?php total_items() ?> Total Price: <?php total_price() ?> <a href="invoice2.php" style="padding:5px; color:skyblue">Go To Invoice</a>
			
			</span>
			<?php cart(); ?>
			</div>
			<?php
			$product_list="";
			$sql="SELECT * FROM product";
			$count=mysqli_query($con,$sql);
			$productCount=mysqli_num_rows($count);
			if($productCount==0){
			
				echo "<h2>There are no products found</h2>";		
			}
			
			?>
			<table>
		
			<thead>
			<th>#</th>			
			<th>Product Name</th>
			<th>Unit Price</th>			
			<th>Choose</th>
			</thead>
			
			
			<tbody>
			<?php
			// displaying the products from the database
			while($row=mysqli_fetch_array($count)){
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];			
			$price =$row['price'];
			echo "
			<tr>
			<td>$product_id</td>
			<td>$product_name</td>			
			<td>$price</td>
			<td><a href='sales.php?add=$product_id'><button style='float:right'>Add To invoice</button></td>
			</tr> \n";
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
