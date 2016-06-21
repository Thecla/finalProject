<?php
$con=mysqli_connect("localhost","root","","finalproject");
//getting the categories

function getCats(){
	global $con;
	$get_cats= "select * from categories";
	$run_cats= mysqli_query($con, $get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id =$row_cats['cat_id'];
		$cat_title= $row_cats['cat_title'];
		echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}
function getBrands(){
	global $con;
	$get_brands= "select * from brands";
	$run_brands= mysqli_query($con, $get_brands);
	
	while($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id =$row_brands['brand_id'];
		$brand_title= $row_brands['brand_title'];
		echo"<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

//signup function
//this function is used to sign up a new user into the system and it takes four arguments, i.e role,username,email and password
function signup($uType,$uname,$email,$password,$address,$phone,$department,$profile){
	global $con;
	$password = md5($password);
	$query = "insert into users(urole,username,email,upassword)".
			" values('$uType','$uname','$email','$password')";
	$result = mysqli_query($con, $query);
	if($result){
		return true;
	}else{
		return false;
	}

}

//reduce_stock function
//this function is used to decrease the quantity of a product 
//the function takes two arguments i.e product id and the amount by which to reduce
//the function will return true if the update is successful and returns false if the update fails

//function reduce_stock($prod_id,$qty){
//	global $con;
//	$query = "update product set qunatity=qunatity-$qty".
//			" where product_id=$prod_id";
//	$result = mysqli_query($con, $query);
//	if($result){
		//echo '<script>alert("Successfully update the quantity in stock")</script>';
//		return true;
//	}else{
//	return false
		//echo '<script>alert("Unable to update the quantity in stock")</script>';
//	 }
//}


//increase_stock function
//this function is used to increase the quantity of a product 
//the function takes two arguments i.e product id and the amount by which to increase
//the function will return true if the update is successful and returns false if the update fails 

//	global $con;
	//$query = "update product set qunatity=qunatity+$qty".
	//		" where product_id=$prod_id";
	//$result = mysqli_query($con, $query);
	//if($result){
		//echo '<script>alert("Successfully update the quantity in stock")</script>';
	//	return true;
	//}else{
		//echo '<script>alert("Unable to update the quantity in stock")</script>';
	//	return false
	//} 
//


function getPro(){

			if(!isset($_GET['cat'])){
				if(!isset($_GET['brand'])){

			global $con;
			$get_pro ="select * from products order by RAND() limit 0,6";
			$run_pro =mysqli_query($con, $get_pro);
			while($row_pro=mysqli_fetch_array($run_pro)){
				$pro_id= $row_pro['product_id'];
				$pro_cat=$row_pro['product_cat'];
				$pro_brand=$row_pro['product_brand'];
				$pro_title=$row_pro['product_title'];
				$pro_price=$row_pro['product_price'];
				$pro_image=$row_pro['product_image'];
				echo "
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='Admin/product_images/$pro_image' width='180' height='200' />
					<p><b> Ksh $pro_price</b></P>
					
					<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button>
					
					</div>
				
				";
			}
}}}


?>