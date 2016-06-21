<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ADMIN')
{
  echo "<script>window.location.assign('../logintest.php')</script>";
}
?>
<?php
//connecting to the datatbase
require_once("includes/db_connect.php");

//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<?php
//inserting into the database
		if(isset($_POST['update'])){
		
		$targetId =$_POST['product_id'];
	$product_name =$_POST['product_name'];
	$expiry_date = $_POST['expiry_date'];
	$Company = $_POST['Company'];
	$product_category = $_POST['product_category'];
	$Qunatity = $_POST['Qunatity'];
	$price  =$_POST['price'];
		
		$update_product = "UPDATE product SET product_name='$product_name',expiry_date='$expiry_date',Company='$Company' ,product_category='$product_category',Qunatity='$Qunatity',price='$price' WHERE product_id=$targetId";
	
	$run_update = mysqli_query($con, $update_product or die(mysql_error()));	
	if($run_update){
					echo "<script>alert('product successfully updated')</script>";
					echo "<script>window.open('editproduct.php')</script>";
					
	}
		header("location:productlist.php");
	}
?>
<?php 
if(isset($_GET['product_id'])){
	$targetId=$_GET['product_id'];
	$sql= "SELECT * FROM product WHERE product_id='$targetId' LIMIT 1";
	$count=mysqli_query($con,$sql);
			$productCount=mysqli_num_rows($count);
			if($productCount>0){			
			while($row=mysqli_fetch_array($count)){
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];
			$expiry_date=strftime("%b %d %y", strtotime($row['expiry_date']));
			$Company=$row['Company'];
			$category=$row['product_category'];
			$Qunatity=$row['Qunatity'];
			$price =$row['price'];		
			}
}else {
		echo" That product does not exist.";
		exit();
}
}

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
				<li><a href="../logout.php">LOGOUT</a>
				</ul>
			<div id="form1">
		<form method="get" action="productresult.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="search a product"/>
	<input type="submit" name="search" value="search" />
				</form>
			</div>
			</div>
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboard</div>
				<ul id="cats">			
				<li><a href="productlist.php">Medicines</a></li><li>
				<a href="company.php">Companies</a></li><li>
				<a href="salesrecord.php">View Sales Record</a></li><li>
				<a href="sales.php">New Sales</a></li><li>
				<a href="product.php">Manage Inventory</a></li><li>
				<a href="editproduct.php">Update Medicine</a><li>
				<a href="Adminpage.php">Admin</a></li>				
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
			<form name="form1" method="post" action="editproduct.php">
			<fieldset class="account_infor">
			<label>
			<p>Product Name:</P>
			<input type="text" name="product_name" size="20" maxlength="20" value="<?php echo $product_name;?>" /></label>
			<br />
			<p>Expiry Date: </P>
			<input id="datepicker" type="text" name="expiry_date" size="20" maxlength="20" value="<?php echo $expiry_date; ?>"/></label>
			<br />
			<p>Company: </P>
			<select name="Company">
	<option value="<?php echo $Company; ?>"><?php echo $Company; ?></option>
		<?php
	$get_comp = "select * from company";
	$run_comp = mysqli_query($con, $get_comp);

	while ($row_comp = mysqli_fetch_array($run_comp)){
	$comp_id = $row_comp['company_id'];
	$comp_name = $row_comp['company_name'];

echo  "<option value='$comp_name'>$comp_name</option>";
}
?>
</select>
			<br />
			<p>Product Category:</p>
			<select name="product_category">
				<option value="<?php echo $category; ?>"><?php echo $category; ?></option>
		<?php
	$get_cats = "select * from category";
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)){
	$cat_id = $row_cats['cat_id'];
	$cat_name = $row_cats['cat_name'];

	echo  "<option value='$cat_name'>$cat_name</option>";
	}
		?>
		</select>	
			
			<br />
			<label><p>Quantity:</p>
			<input type="text" name="Qunatity" size="20" maxlength="40" value="<?php echo $Qunatity; ?>" /></label>
			<br />
			<label><p>Unit Price:</p>
			KSh <input type="text" name="price" size="15" maxlength="40" value="<?php echo $price;?>" /></label>
			<br />
			
			</fieldset>
			<fieldset class="account-action">
			<input name="thisId" type="hidden" value="<?php echo $targetId ?>"  />
			<input class="btn" type="submit" name="update" value="Edit Product" style="background:grey; color:white;"/></p>
			<fieldset>
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
