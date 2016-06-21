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
		
			<thead>
			<th>Remove</th>
			<th>Medicine</th>	
			<th>Quantity</th>
			<th>Total Price</th>			
			</thead>
			<?php
			$total = 0;
		global $con;
		
		$ip = getIp();
		$sel_price= "select * from cart where ip_add='$ip'";
		$run_price =mysqli_query($con, $sel_price);
		
		while($p_price=mysqli_fetch_array($run_price)){
		
			$pro_id = $p_price['p_id'];
			
			$pro_price= "select * from product where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con, $pro_price);
			
			while($pp_price=mysqli_fetch_array($run_pro_price )){
			
				$product_price= array($pp_price['price']);
				$product_name = $pp_price['product_name'];			
				$single_price =$pp_price['price'];
				
				$values=array_sum(array($pp_price['price']));
				$total +=$values;		
			?>
			
			
			<tbody>
			<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
						<td><?php echo $product_name; ?></td>
			<td><input type="text" size="3" name="qty" value="<?php //echo $_SESSION['qty']; ?>"/></td>
						<?php
						
					//if(isset($_POST['update_cart'])){
								
					//	$qty=$_POST['qty'];
									
					//	$update_qty="update cart set qty='$qty'";
					//	$run_qty = mysqli_query($con, $update_qty);
									
					//			$qty=$_SESSION['qty'];
					//				$total =$total * $qty;
							
							
					//		}
						?>
						
						
						<td><?php echo "KSh".$single_price; ?></td>
						
					<?php
					}}
					?>
					</tr>
					<tr align="right">
						<td colspan="5"><b>Sub_total</b></td>
						<td colspan="4"><?php echo "KSh".$total; ?></td></tr>
						
							<tr align="center">
								<td colspan="3"><input type="submit" name="update_cart" value="Update Cart" /></td>
								<td> <input type="submit" name="continue" value="Continue Shopping" /></td>
								<td> <button><a href="checkout.php" style="text-decoration:none; color:black">Checkout</a></button></td>
								
							</tr>
			
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
