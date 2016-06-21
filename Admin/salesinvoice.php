<?php
$con = mysqli_connect("localhost","root","","finalproject");

if(isset($_POST['save'])){
	$query="insert into tbl_order(re_name,location)) values('{$_POST['re_name']}','{$_POST['location']}')";
	$id=mysqli_insert_id($con);
	$insert_result=mysqli_query($con, $query);
	for($i=0;$i<count($_POST['product_name']);$i++)
	{
		$query2="insert into tbl_orderdetail SET 
	order_id='{$id}',	product_name='{$_POST['product_name'][$i]}',
	quantity='{$_POST['quantity'][$i]}',
		price='{$_POST['price'][$i]}',
	discount='{$_POST['discount'][$i]}',
	amount='{$_POST['amount'][$i]}'";
	$insert_result2=mysqli_query($con, $query2);
	}
	function product(){
	$output = '';
	global $con;
	$get_ps= "select * from product";
						$run_ps= mysqli_query($con, $get_ps);	
						while($row_cats=mysqli_fetch_array($run_ps)){
						$p_id =$row_cats['product_id'];
						$p_title= $row_cats['product_name'];
						$price=$row_cats['price'];
						$output.='<option value="'.$p_title.'">'.$p_title.'</option>';
	}
	return $output;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>invoice</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jQuery2.1.4.js"></script>

<body>
 <form action="invoice.php" method="post">
	<div class="box box-primary">
	<div class="box-header">
	<h3 class="box-title">Invoice</h3>
	</div>
	<div class="box-body">
	<div class="form-group">
		ReceptName
		<input type="text" name="re_name" class="form-control">
	</div>
		<div class="form-group">
		Location
		<input type="text" name="location" class="form-control">
	</div>
	</div>
		<input type="submit" class="btn btn-primary" name="save" value="Save Record" >
	</div>
	
	<table class="table table-bordered table-hover">
		<thead><th>No</th>
		<th>ProductName</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Amount</th>
		<th><input type="button" value="+" id="add" class="btn btn-primary"></th>
		</thead>
	<tbody class="detail">
	<tr>
		<td class="no">1</td>
		<td>
		<select class="form-control productname" name="product_name[]">
							<option>-------</option>
							<?php
					echo product();
							?>
						
			</label></td><td></td>
			
		<td><input type="" class="form-control quantity" name="quantity[]"></td>
		<td><input type="text" class="form-control price" name="price[]"></td>
		<td><input type="text" class="form-control discount" name="discount[]"></td>
		<td><input type="text" class="form-control amount" name="amount[]"></td>
		<td><a href="#" class="remove">Delete</a></td>		
			</tr>
			</tbody>
	</form>		
			<tfoot>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th style="text-align:center;" class="total">0<b>$</b></th>
			</tfoot>
		
	</table>
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
	function addnewrow(){
		var n = ($('.detail tr').length-0)+1;
		var tr = '<tr>'+
			'<td class="no">'+n+'</td>'+
		'<td><select  class="form-control productname" name="productname[]"> <option>  <?php  ?></option></select></td>'+
		'</td><td><?php echo $price;?></td>'+
	'<td><input type="text" class="form-control quantity" name="quantity[]"></td>'+
		'<td><input type="text" class="form-control price" name="price[]"></td>'+
		'<td><input type="text" class="form-control discount" name="discount[]"></td>'+
		'<td><input type="text" class="form-control amount" name="amount[]"></td>'+
		'<td><a href="#" class="remove">Delete</a></td>'+		
		'</tr>';
	$('.detail').append(tr);	
		
	}
</script>