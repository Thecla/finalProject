<?php
$con=mysqli_connect("localhost","root","","finalproject");
//getting the categories

function getCats(){
	global $con;
	$get_cats= "select * from dashboard";
	$run_cats= mysqli_query($con, $get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id =$row_cats['id'];
		$cat_title= $row_cats['title'];
		echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

function getDept(){

			if(isset($_GET['cat'])){
				$cat_id= $_GET['cat'];

			global $con;
			$get_cat_pro ="select * from department where department_cat='$cat_id'";
			$run_cat_pro =mysqli_query($con, $get_cat_pro);
		
		
			while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
				
				$Department_id= $row_cat_pro['Department_id'];
				
			
				
				echo "
					
					
					<a href='departmentlist.php?Department_id=$Department_id' >Department</a>
										
					
				
				";
			}
}}



?>