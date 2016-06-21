<?php
require_once("includes/db_connect.php");

		//forcing error reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

			
<!DOCTYPE html>
<?php
//require_once("Functions/function.php");
require_once("Functions/functions.php");
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
				<li><a href="../logout.php">LOGOUT</a>
				</ul>
			<div id="form1" style="float:right;">
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
			<form method="POST" action="salesinvoice3.php">
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
			<br />
			<form action ="salesinvoice33.php" method="post" enctype="multipart/form-data">
	National Id:<select name="national_id">
							<option>-------</option>
							<?php
						$get_ps= "select * from patient";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['patient_id'];
						$national_id= $row_cats['national_id'];
						$patient_name= $row_cats['patient_name'];
						echo"<option value='$national_id'>$national_id</option>";
					
						
	}
							?>
						</select>
				NAME:<input type="text" name="patient_name" value="" />	<br />								
			<table>
		
	<tr style="border:0; colspan:0;"><h2>Add Items to calculate the Total price</h2></tr>	
			<thead>
			<tr>
			<th>#</th>			
			<th>Product Name</th>
			<th>Unit Price</th>	
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Choose</th></tr>
			</thead>
			<tbody>
					<?php
//processing the payment details					
			$total=0;
			$amountpaid=0;
			$balance=0;
			//$product_name="";
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
	$product_name=$get_row['product_name'];
	$product_id=$get_row['product_id'];
	$sub=$get_row['price']*$value;
	$total +=$sub;
	
	'<tr>'?>
	<td></td>
	<td><?php echo" $product_name"; ?></td>			
			<td><?php echo " $get_row[price]"; ?></td>
	<td><input type='text' name='qty[]' value="<?php echo $value; ?>"/></td>
			<td><?php echo $sub; ?></td>	
			<?php 
			echo "
			
			<td><a href='salesinvoice3.php?remove=$product_id'>[-]</a> <a href='salesinvoice3.php?add=$product_id'>[+]</a> <a href='salesinvoice3.php?delete=$product_id'>[Delete]</a> </td>  
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
	<td>$total</td>
	<td></td>";	
	}
			?>
		<!--	<tr>
	<td></td>
	<td>Amount Paid </td>
	<td></td>
	<td></td>-->
	<?php
//getting details of the amount paid by the patient	
	//$total=0;
	//if(isset($_POST['submit'])&&isset($_POST['amountpaid'])) {
		//	$amountpaid=$_POST['amountpaid'];
			//$balance=$total-$amountpaid;
			//echo"$amountpaid";
						
			//}
			?>
	
	
			</tbody>
			
			</table>
			
				<input type="submit" name="processpayment" value="Process Payment"/>
			</form>
		
			</div>
			<input type="button" onclick="location.href='sales33.php';" value="Add More Item" />
			
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
	header("Location:salesinvoice33.php");
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

<?php

if(isset($_POST['processpayment'])){
	global $con;
	for($i=0;$i<count($product_name);$i++)
	{
		$query2="insert into salesdetails SET 
		Cashier_name='{$_POST['cashier']}',
			patient_id='{$_POST['id']}',
	product_name='{$_POST['product_name'][$i]}',
	Quantity='{$_POST['quantity'][$i]}',
		price='{$_POST['price'][$i]}',	
	Total_amount='{$_POST['total']}',	
	date=now()";
	$insert_result2=mysqli_query($con, $query2);
	
	if($insert_result2){
	$query = "update product set qunatity=qunatity-$qty".
		" where product_id=$product_id";
$result = mysqli_query($con, $query);
	if($result){
		echo '<script>alert("Successfully updated the quantity in stock")</script>';
	return true;
	}else{	return false;
		//echo '<script>alert("Unable to update the quantity in stock")</script>';
	 }
	}}
	
	
}?>