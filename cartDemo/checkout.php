<?php
session_start();
require 'includes/db_connect.php';
require 'item.php';
// save new order
mysqli_query($con, 'insert into orders(name, datecreation, ststus, username)values("New Order", "'.date('y-m-d').'",0,"acc2")');
$orderid = mysqli_insert_id($con);
echo 'insert into orders(name, datecreation, status, username)values("New Order", "'.date('y-m-d').'",0,"acc2")';
echo $ordersid;
//save order details for new order
$cart = unserialize ( serialize ( $_SESSION['cart']));
for($i=0; $i<count($cart); Si++){
	mysqli_query($con 'insert into orderdetail(productid, ordersid,price, quantity)values('.$cart[$i]->id.','.$ordersid.','.$cart[$i]->price.','.$cart[$i]->quantity.'))')
}
// Clear all products in cart
unset($_SESSION['cart']);
?>
Thank you for comin
