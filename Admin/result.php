<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>


<!DOCTYPE html>

<html>
<head>
<title>Product Page</title>
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
				<a href="updateproduct.php">Update Medicine</a></li><li>
				<a href="deleteproduct.php">Delete Medicine</a></li>			
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="productlist.php">Medicine List</a></li>
			<li><a href="product.php">+ Insert Medicine</a></li>
			</ul>
			</div>
					
					<table>
			<?php
			if(isset($_GET['search'])){	
			
			$search_query=$_GET['user_query'];
			
			$get_pro ="select * from product where product_category like '%$search_query%'";
			$run_pro =mysqli_query($con, $get_pro);
			?>
			<thead>
			<th>#</th>
			<th>Medicine</th>
			<th>Expiry Date</th>
			<th>Company</th>
			<th>Category</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Options</th>
			</thead>
			<tbody>
			<?php
			while($row_pro=mysqli_fetch_array($run_pro)){
				$product_id= $row_pro['product_id'];
				$product_name=$row_pro['product_name'];
				$expiry_date=$row_pro['expiry_date'];
				$Company=$row_pro['Company'];
				$product_category=$row_pro['product_category'];
				$Qunatity=$row_pro['Qunatity'];
				$price=$row_pro['price'];
				echo "
					
				<tr>
			<td>$product_id</td>
			<td>$product_name</td>
			<td>$expiry_date</td>
			<td>$Company</td>
			<td>$product_category</td>
			<td>$Qunatity</td>
			<td>$price</td>
			<td><a href='editproduct.php?product_id=$product_id'>edit</a> &bull; <a href='productlist.php?deleteid=$product_id'>delete</a></td>
			</tr> \n";	
				}
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
