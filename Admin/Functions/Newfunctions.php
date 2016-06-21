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
function signup($uType,$uname,$email,$password){
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

function reduce_stock($prod_id,$qty){
	global $con;
	$query = "update product set qunatity=qunatity-$qty".
			" where product_id=$prod_id";
	$result = mysqli_query($con, $query);
	if($result){
		//echo '<script>alert("Successfully update the quantity in stock")</script>';
		return true;
	}else{
		return false;
		//echo '<script>alert("Unable to update the quantity in stock")</script>';
	} 
}


//increase_stock function
//this function is used to increase the quantity of a product 
//the function takes two arguments i.e product id and the amount by which to increase
//the function will return true if the update is successful and returns false if the update fails 

function increase_stock($prod_id,$qty){
	global $con;
	$query = "update product set qunatity=qunatity+$qty".
			" where product_id=$prod_id";
	$result = mysqli_query($con, $query);
	if($result){
		//echo '<script>alert("Successfully update the quantity in stock")</script>';
		return true;
	}else{
		//echo '<script>alert("Unable to update the quantity in stock")</script>';
		return false;
	} 
}

//patient details function
function patient_details($id){
	global $con;
	$query = "select * from patient where patient_id=$id";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0){
		echo '<table caption="Patient Details">';
		echo '<tr>';
			echo '<th>Name</th>';
			echo '<th>Gender</th>';
			echo '<th>Email</th>';
			echo '<th>National ID</th>';
		echo '</tr>';

		while($row = mysqli_fetch_array($result)){
			echo '<tr>';
				echo "<td>".$row['patient_name']."</td>";
				echo "<td>".$row['patient_sex']."</td>";
				echo '<td id="mail">'.$row['patient_email'].'</td>';	
				echo "<td>".$row['national_id']."</td>";	
			echo '</tr>';
		}

		echo "</table>";
		product_cat();
	}else{
		echo '<script>alert("User not found !");</script>';
	}
	
}

function product_cat(){
	global $con;
	$query = "select * from product";
	$result = mysqli_query($con, $query);

echo '<form action="salesinvoice3.php" method="post">';
	echo '<table caption="Product Catalog">';
	echo '<tr>';
			echo '<th>Product Name</th>';
			echo '<th>Quantity</th>';
			echo '<th>Unit Price</th>';
			echo '<th>Sub Total</th>';
	echo '</tr>';
	$i = 1;
	

	while($row = mysqli_fetch_array($result)){
		load_script($i);
		echo '<tr>';
		echo '<td>'.$row['product_name'].'</td>';
		echo '<td>'.'<input type="text" onblur="calculateSubTotal'.$i.'()'.'" name="pqty'.$i.'" id="qt'.$i.'"/>'.'</td>';
		//echo '<td id="price'.$i.'">'.$row['price'].'</td>';
		echo '<td><p id="price'.$i.'">'.$row['price'].'</p>';
		echo '<td>'.'<input type="text" id="subtotal'.$i.'" placeholder="0" name="subtotal'.$i.'" readonly/>'.'</td>';
		echo '</tr>';
		$i++;
	} 
	echo '<tr>';
		echo '<td colspan="3">';
		echo '<strong>Total Amount</strong>';			
		echo '</td>';
		echo '<td>';
			echo '<input type="text" name="total" value="0" id="total" readonly/>';
			echo '<input type="hidden" name="pat_mail" id="pat_mail"/>';
		echo '</td>';
	echo '</tr>';

echo '</table>';
echo '<input type="submit" name="submitDetails" onclick="return confirm(\'Proceed to check out?\');"/>';
echo '</form>';
}

function load_script($i){
	echo '<script>';
		echo 'function calculateSubTotal'.$i.'(){';
		echo 'var t = parseInt(document.getElementById("total").value);';
		echo 'var s = document.getElementById("subtotal'.$i.'");';
		echo 'var m = document.getElementById("mail").innerHTML;';
		echo 'var n = document.getElementById("pat_mail");';
		echo 'n.value = m;';

		echo 't = t - s.value;';
		//echo 'alert(t);';
		echo 'var y = document.getElementById("qt'.$i.'").value;';
		echo 'var w = document.getElementById("price'.$i.'").innerHTML;';
		echo 'var z = y * w;';
		echo 't = z + t;';
		echo 'var x = document.getElementById("total");';
		echo 'x.value = t;';
		
		echo 's.value=z;';		
		echo '}';
	echo '</script>';	
}


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