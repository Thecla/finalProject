<?php
require_once("includes/db_connect.php");
session_start();
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
			
			<?php cart(); ?>
			</div>
			<form action ="invoice.php" method="post" enctype="multipart/form-data">
			<table>
	<?php	
			$total=0;
foreach($_SESSION as $name => $value){
	if($value>0){
	if(substr($name, 0, 5)=='cart_'){
	$id = substr($name, 5, (strlen($name)-5));
	$query="SELECT product_id, product_name, price FROM product where product_id='$id'";
	$result=mysqli_query($con,$query);
	?>
	<table cellpadding="1" cellspacing="2" border="1">
	<thead>
	<th>
		<td>Product Name</td>
		<td>Quantity</td>
		<td>Unit price</td>
		<td>sub_total</td>
		<td>Option</td>
	</th>
	</thead>
	<?php
	while($get_row=mysqli_fetch_array($result)){
	$sub=$get_row['price']*$value;
	//$total +=$sub;
	?>
	<tbody>
	<?php
	echo "
	<tr>
	<td></td>
	<td>{$get_row['product_name']}</td>
	<td>{$value }</td>
	<td>{$get_row['price']}</td>
	<td>&pound; .$sub. </td>
	<td><a href='carttest.php?remove='.$id.''>[-]</a> <a href='carttest.php?add='.$id.''>[+]</a> <a href='carttest.php?delete='.$id.''>[Delete]</a> </td> </tr> \n";
	
	
	}	
	}
	
	}$total +=$sub;
	//echo $total;

if ($total==0){
	echo "your cart is empty";
}
else {
	echo "
	<tr>
	<td></td>
	<td>Total:  </td>
	<td></td>
	<td></td>
	<td></td>	
	<td>$total</td>";
	}
}


?>
</tbody>
	
			
			</table>	
</form>			
			<?php
			function updatecart(){
			global $con;
			$ip= getIp();
			
				if(isset($_POST['update_cart'])){
				foreach($_POST['remove'] as $remove_id){
				
					$delete_product ="delete from cart where p_id ='$remove_id' AND ip_add= '$ip' ";
					
					$run_delete= mysqli_query($con, $delete_product);
					
					if($run_delete){
					
							echo "<script>window.open('cart.php','_self')</script>";
					}
				}
				}
				
				if(isset($_POST['continue'])){
					echo "<script>window.open('index.php','_self')</script>";
				}
				echo @$up_cart =updatecart();
			}
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
