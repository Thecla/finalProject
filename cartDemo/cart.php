<?php
session_start();
require 'includes/db_connect.php';
require 'item.php';
if(isset($_GET['product_id'])&& !isset($_POST['update'])){
 $sql='select * from product where product_id=' . $_GET['product_id'];
 $result= mysqli_query($con,$sql);
$product = mysqli_fetch_object($result);
$item = new Item ();
$item->product_id = $product['product_id'];;
$item->product_name = $product['product_name'];;
$item->price = $product['price'];;
$item->Qunatity = 1;

//checking if product exist in cart
$index = -1;
if(isset($_SESSION['cart'])){
	$cart = unserialize (serialize ($_SESSION['cart']));
	for($i = 0; $i<count ($cart); $i ++)
	if($cart [$i]->product_id==$_GET['product_id']){
		$index = $i;
		break;
	}
}
	if($index == -1)
	$_SESSION['cart'] [] = $item;
	else{
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}
// delete product in cart
if(isset ($_GET['index']) && !isset($_POST['update'])){
	$cart =unserialized (serialized ($_SESSION['cart']));
	$cart = array_values ($cart);
	$_SESSION ['cart'] = $cart;	
}
//update quantity in cart
if(isset($_POST['update'])){
	$arrQuantity = $_POST['quantity'];
	$cart = unserialize ( serialize ( $_SESSION['cart']));
	for($i =0; $i<count ($cart); $i++){
		$cart[$i]->quatity = $arrayQuantity[$i];
	}

	// validate quantity
	$valid =1 ;
	for($i=0;$i<count($arrayQuantity); $i++)
	if (!is_numeric($arrayQuantity[$i])|| $arrayQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
	$cart =unserialized (serialized ($_SESSION['cart']));
	for($i = 0; $i<count ($cart); $i ++){
		$cart[$i]->quantity = $arrayQuantity[$i];
	}
	$_SESSION ['cart'] = $cart;
	}
	else
	$error = 'Quantity is invalid';
}
?>
<?php echo isset($error) ? $error : ''; ?>
<form method="POST">
	<table cellpadding="2" cellspacing="2" border="1">
	<tr>
		<th>Option</th>
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity <input type="image" src="img.png" style="height:20px; width:20px;"><input type="hidden" name="update">
		</th>
		<th>Sun Total</th>
		</tr>
		<?php
		$cart = unserialize ( serialize (  $_SESSION ['cart']));
		$s =0;
		$index = 0;
		for($i =0; $i < count ( $cart); $i ++){
			$i += $cart [$i]->price * $cart [$i]->quantity;
		
		?>
		<tr>
		<td><a href="cart.php?index= <?php echo $index; ?>" onclick="return confirm('Are you sure')">Delete</a></td>
		<td><?php echo $cart[$i]->product_id; ?></td>
		<td><?php echo $cart[$i]->product_name; ?></td>
		<td><?php echo $cart[$i]->price; ?></td>
		<td><input type="text" value="<?php echo $cart[$i]->Qunatity; ?>" style="width: 50px;" name="quantity[]"></td>
		<td><?php echo $cart[$i]->price * $cart[$i]->Qunatity; ?></td>
		</tr>
		<?php
		$index ++;
		}
		?>
		<tr>
		<td colspan="5" align="right"> Sum</td>
		<td align="left"><?php echo $s; ?></td>
		</tr>
		</table>
</form>
<br />
<a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>