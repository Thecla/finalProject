<! DOCTYPE html>
<html>
<head>
<title>Cart Demo</title>
<?php
require_once('includes/db_connect.php');
//require 'connect.php';

?>
</head>
<body>
<?php
$result = mysqli_query($con, 'select * from product');
?>
<table cellpadding="2" celllspacing="2" border="0">
<thead>
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Price</th>
	<th>Buy</th>
	</tr>
	<?php while($product = mysqli_fetch_object($result)){
	?>
	<tr>
	<td><?php echo $product['product_id']; ?></td>
	<td><?php echo $product['product_name']; ?></td>
	<td><?php echo $product['price']; ?></td>
	<td><a href="cart.php?product_id=<?php echo $product['product_id']; ?>&action=add">order now</a></td>
	</tr>
	<?php } ?>
</thead>
</table>
</body>

</html>

