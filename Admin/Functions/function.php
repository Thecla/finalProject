<?php
$con=mysqli_connect("localhost","root","","finalproject");

//getting the users IP address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR']; 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }
     return $ip;
}
//getting the car for billing
function cart(){
		
		
	if(isset($_GET['add_cart'])){
	
	global $con;
	$ip=getIp();
	$pro_id= $_GET['add_cart'];	
	$check_pro ="select * from cart where ip_add='$ip' AND p_id='$pro_id'";	
	$run_check=mysqli_query($con, $check_pro);	
	if(mysqli_num_rows($run_check)>0){
		
		echo " ";
	}
	else{
			$insert_pro= "insert into cart (p_id,ip_add) values('$pro_id','$ip')";
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('sales.php','_self')</script>";
	}
	}
		
}
function patient_details(){
	if(isset($_POST['user_query'])){
				global $con;
				$search_query = $_POST['user_query'];
				$query="SELECT * from patient where national_id='$search_query'";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)){
				$id =$row['national_id'];
				$name =$row['patient_name'];
				echo"<b>Id:</b> $id <br />";
				echo"<b>Name:</b> $name <br />";
				}
				$query="SELECT lab_test, drug_prescription FROM prescription where national_id ='$search_query' AND date= CURDATE()";			
				$result=mysqli_query($con,$query);				
				while($row=mysqli_fetch_array($result)){
				//$id=$row['national_id'];
				$lab=$row['lab_test'];
				$drug=$row['drug_prescription'];
				echo"<b>Lab Test:</b> $lab <br />";
				echo"<b>Medication:</b> $drug ";
				
				}
				}
				
}
function total_items(){

	
	if(isset($_GET['add_cart'])){
	 
	    global $con;
		
		$ip=getIp();
		$get_items= "select * from cart where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
		}
		else{
		global $con;
		$ip=getIp();
		$get_items= "select * from cart where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
	
	}
		echo $count_items;

}
function total_price(){

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
				
				$values= array_sum($product_price);
				
				$total +=$values;
			}
		}
		echo "KSh". $total;

}
?>