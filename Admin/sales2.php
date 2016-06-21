<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
	<?php
//getting details of the amount paid by the patient	
	$total=0;
	if(isset($_POST['submit'])&&isset($_POST['amountpaid'])) {
			$amountpaid=$_POST['amountpaid'];
			$balance=$total-$amountpaid;
			//echo"$amountpaid";
						
			}
			?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
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
			<form method="POST" action="sales2.php">
				<input type="text" name="user_query" placeholder="enter patatient id"/>
				<input type="submit" name="submit" value="Get Details"/>
				
				</form>
				</div>
				<div id="display">
			<?php echo patient_details(); ?>
			
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
			<form action ="sales2.php" method="post" enctype="multipart/form-data">

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
			<td><a href='sales2.php?add=$product_id'>Add</a></td>
			<td>$product_name</td>			
			<td>$price</td>
					
			</tr>";?>
	
			<?php } ?>
					<tr>
	<td></td>
	<td></td>
	<td></td>
	<td style="border:0; colspan:0;">Add Items to calculate the Total price</td></tr>	
			<tr><th>#</th>			
			<th>Product Name</th>
			<th>Unit Price</th>	
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Choose</th></tr>
					<?php
//processing the payment details					
			$total=0;
			$amountpaid=0;
			$balance=0;
foreach($_SESSION as $name => $value){
	if($value>0){
	if(substr($name, 0, 5)=='cart_'){
	$id = substr($name, 5, (strlen($name)-5));
	$query="SELECT product_id, product_name, price FROM product where product_id='$id'";
	$result=mysqli_query($con,$query);
	?>

			<?php
			$qty="";
	while($get_row=mysqli_fetch_array($result)){
	
	$product_id=$get_row['product_id'];
	$sub=$get_row['price']*$value;
	$total +=$sub;
	
	'<tr>'?>
	<td></td>
	<td><?php echo" $get_row[product_name]"; ?></td>			
			<td><?php echo " $get_row[price]"; ?></td>
	<td><input type='text' name='qty' value="<?php echo $value; ?>"/></td>
			<td><?php echo $sub; ?></td>	
			<?php 
			echo "
			
			<td><a href='sales2.php?remove=$product_id'>[-]</a> <a href='sales2.php?add=$product_id'>[+]</a> <a href='sales2.php?delete=$product_id'>[Delete]</a> </td>  
			</tr> \n";?>
		<?php	}}}}
			?>
			<?php
			if ($total==0){
	echo "your cart is empty";
}
else {
	echo "
	<tr>
	<td></td>
	<td style='color:blue;'>Total Price:  </td>
	<td></td>
	<td></td>
	<td>$total</td>";	
	}
			?>
			<tr>
	<td></td>
	<td>Amount Paid </td>
	<td></td>
	<td></td>
	
	<td><input type="text" name="amountpaid" value="<?php echo $amountpaid; ?>"/>
	<td><input type="submit" name="submit" value="Enter"/></td>
	</td>
	
	</tr>
		<tr>
	<td><?php $balance=$total-$amountpaid;?></td>
	<td>Balance </td>
	<td></td>
	<td></td>
	<td><input type="text" name="balance" value="<?php echo $balance; ?>"/></td></tr>	
	
			</tbody>
			
			</table>
				<input type="submit" name="processpayment" value="Process Payment"/>
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
	header("Location:sales2.php");
}
if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location:sales2.php");
}
if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location:sales2.php");
}
?>
