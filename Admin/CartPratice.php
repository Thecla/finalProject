<?php

session_start();

//$page 'carttest.php';
require_once("includes/db_connect.php");

function product(){
global $con;
$product_list="";
			$sql="SELECT product_id,product_name, price, Qunatity FROM product where Qunatity >0";
			$count=mysqli_query($con,$sql);
			$productCount=mysqli_num_rows($count);
			if($productCount==0){
			
				echo "<h2>There are no products found</h2>";		
			}

while($row=mysqli_fetch_array($count)){
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];			
			$price =number_format($row['price'],2);
			
			
			echo "
			<p>$product_id
			$product_name			
			$price	</p>	
			 <a href='carttest.php?add=$product_id'>Add</a>\n";
			}
}

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
	header("Location:carttest.php");
}
if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location:carttest.php");
}
if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location:carttest.php");
}
?>

<?php
function cart2(){
global $con;
$total=0;
foreach($_SESSION as $name => $value){
	if($value>0){
	if(substr($name, 0, 5)=='cart_'){
	$product_id = substr($name, 5, (strlen($name)-5));
	$query="SELECT product_id, product_name, price FROM product where product_id='$product_id'";
	$result=mysqli_query($con,$query);
	?>
	
	<?php
	while($get_row=mysqli_fetch_array($result)){
	$sub=$get_row['price']*$value;
	$total +=$sub;
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
	</thead><tbody>
	<?php
	echo "
	<tr>
	<td></td>
	<td>{$get_row['product_name']}</td>
	<td>{$value }</td>
	<td>{$get_row['price']}</td>
	<td>&pound; $sub </td>
	<td><a href='carttest.php?remove='$product_id''>[-]</a> <a href='carttest.php?add='$get_row[product_id]'>[+]</a> <a href='carttest.php?delete='$product_id''>[Delete]</a> </td> </tr> ";
	
	
	}	
	}
	
	}//$total +=$sub;
	//echo $total;
}
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
	$query_itemQ = "Update Products SET Products.ProductStock = Products.ProductStock -
$DetailQuantity WHERE Products.ProductID = $idCall";