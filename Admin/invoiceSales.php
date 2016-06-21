<?php
$con = mysqli_connect("localhost","root","","finalproject");


?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jQuery2.1.4.js"></script>

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
				<li>
				<a href="../logout.php">LOGOUT</a></li>
				</ul>
		
			</div>
			</div>
			<div class="content_wrapper">
			
				<div id="sidebar">
				<div id="sidebar_title">Dashboard</div>
				<ul id="cats">
					<li><a href="depatmentlist.php">Department</a></li><li>
				<a href="doctorlist.php">Doctors</a></li><li>
				<a href="patientlist.php">Patients</a></li><li>
				<a href="nurselist.php">Nurses</a></li><li>
				<a href="pharmacistlist.php">Pharmacist</a></li><li>
				<a href="scientistlist.php">Scientist</a></li><li>
				<a href="accountantlist.php">Accountant</a></li><li>
				<a href="receptionist.php">Receptionist</a></li><li>
				<a href="product.php">Product</a></li>
				</ul>
			
			<div id="sidebar_title"></div>			
				
			</div>
				<div id="department">
			<ul>
			<li><a href="productsales.php">Pruduct List</a></li>
			<li><a href="invoiceSales..php">Make Payment</a></li>
			</ul>
			</div>
			<div id="content_area">
			<div id="department"  style="background-color:white; height:auto; width:500px;">
			<form method="POST" action="invoiceSales.php">
				<input type="text" name="user_query" placeholder="enter patient id"/>
				<input type="submit" class="btn btn-primary" name="submit" value="Get Details"/>
				
				</form>
				</div>
				<div id="display">
			<?php echo patient_details(); ?>
			
			</div>
<form action="invoiceSales.php" method="post">
	<div class="box box-primary">
	<div class="box-header">
	<h3 class="box-title">Invoice</h3>
	</div>
		<table class="table table-bordered table-hover">
	<div class="box-body">
	<div class="form-group">
		Cashier Name
		<input type="text" name="cashier" class="form-control">
	</div>
		<div class="form-group">
		Patient Id
		<input type="text" name="id" class="form-control">
	</div>
	</div>
		<input type="submit" class="btn btn-primary" name="save" value="Save Record" >
	</div>
	

		<thead>
		<th>No</th>
		<th>ProductName</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Amount</th>
		<th><input type="button" name="save" value="+" id="add" class="btn btn-primary"></th>
		</thead>
	<tbody class="detail">
	<tr>
	
		<td class="no">1</td>
		<td><input type="text" class="form-control productname" name="product_name[]"></td>
		<td><input type="text" class="form-control quantity" name="quantity[]"></td>
		<td><input type="text" class="form-control price" name="price[]"></td>
		<td><input type="text" class="form-control discount" name="discount[]"></td>
		<td><input type="text" class="form-control amount" name="amount[]"></td>
		<td><a href="#" class="remove">Delete</a></td>		
		</tbody>
			<tfoot class="detail2">
			<tr>
			<td></td>
			<td>Total</td>
			<td></td>
			<td></td>
			<td></td>
			<td name="total" style="text-align:center;" class="total">0<b>$</b></td>
				</tr>
			
			</tfoot>
		</form>
	</table>

</div>

<!-- main ends here-->

		
	<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>	
	</div>	
		
</body>

</html>
<script type="text/javascript">
$(function(){
	$('#add').click(function(){
	 addnewrow();
	});
	
	$('body').delegate('.remove','click',function(){
	$(this).parent().parent().remove();
		});
		
	$('.detail').delegate('.quantity,.price,.discount','keyup',function(){
		var tr = $(this).parent().parent();
		var qty = tr.find('.quantity').val();
		var price = tr.find('.price').val();	
		var dis= tr.find('.discount').val();			
		var amt =(qty*price)-(qty*price*dis)/100;		
		tr.find('.amount').val(amt);
		
		total();
		balance();
		
		});
		$('.detail2').delegate('.paid','keyup',function(){
		var tr = $(this).parent().parent();
		var pd = tr.find('.paid').val();
		tr.find('.paid').val(pd);
			total();
		balance();
			});
	});
function total()
{
		var t = 0;
		$('.amount').each(function(i,e)
		{
			var amt = $(this).val()-0;
			t +=amt;
					});
					
		$('.total').html(t);
}	
function balance()
{
total();
		var t = 0;
		var b = 0;
		$('.paid').each(function(i,e)
		{
			var pd = $(this).val();
			var b = t-pd;
		});
		$('.balance').html(b);
}
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		var tr = '<tr>'+
			'<td class="no">'+n+'</td>'+
		'<td><input type="text" class="form-control productname" name="productname[]"></td>'+
	'<td><input type="text" class="form-control quantity" name="quantity[]"></td>'+
		'<td><input type="text" class="form-control price" name="price[]"></td>'+
		'<td><input type="text" class="form-control discount" name="discount[]"></td>'+
		'<td><input type="text" class="form-control amount" name="amount[]"></td>'+
		'<td><a href="#" class="remove">Delete</a></td>'+		
		'</tr>';
		+'</tr>'+
			'<td></td>'+
			'<td>Total</td>'+
			'<td></td>'+
			'<td></td>'+
			'<td></td>'+
			'<td name="total" style="text-align:center;" class="total">0<b>$</b></td>'+
			'</tr>';
		
			
	$('.detail').append(tr);	
		
	}
</script>
<?php
if(isset($_POST['save'])){
	$total="";
	//$total=$_POST['total'];
	for($i=0;$i<count($_POST['product_name']);$i++)
	{
		$query2="insert into salesdetails SET 
		Cashier_name='{$_POST['cashier']}',
			patient_id='{$_POST['id']}',
	product_name='{$_POST['product_name'][$i]}',
	Quantity='{$_POST['quantity'][$i]}',
		price='{$_POST['price'][$i]}',
	discount='{$_POST['discount'][$i]}',
	amount='{$_POST['amount'][$i]}',	
	date=now()";
	$insert_result2=mysqli_query($con, $query2);

	}
	
}
?>