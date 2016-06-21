<?php
include_once("includes/db_connect.php");
?>
<!DOCTYPE html>
<html>
	<title>Datatable Demo1 | CoderExample</title>
	<head>
	<link href="css/datatable/jquery.dataTables.min.css" type="text/css" rel="stylesheet"/>
<link href="css/datatable/select.dataTables.min.css" type="text/css" rel="stylesheet"/>

<!-- Latest compiled and minified JavaScript -->
<script src="js/datatable/jquery-1.12.0.min.js"></script>
<script src="js/datatable/jquery.dataTables.min.js"></script>
<script src="js/datatable/dataTables.select.min.js"></script>

<style type="text/css">

  .dataTable {

    letter-spacing:0px;
  }

  .dataTable thead {
  }
  table.dataTable{
      zoom:0.85;  
  }
  .table-bordered input {
    width:8em;
  }
   .dataTable tr td{
    padding: 0px;
   }

  .dataTable tr td input[type=text] {
   
    border: 0px solid #cdcdcd;
    border-color: #fff;
   
}
  
</style>



<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );
</script>
		
	</head>
	<body>
				<form method="POST" action="datatables.php" enctype="multipart/form-data">
	<input type="text" value="" placeholder="YYYY-MM-DD" name="StartDate"/>
	<input type="text" value="" placeholder="YYYY-MM-DD" name="EndDate"/>
	<a href="test2.php" style="text-decoration:none;"><input style="background:#293f50; color:white;"type='submit' name='submit' value='Report' /></a>
	</form>
	<?php    

     //execute the SQL query and return 
	 if(isset($_POST['submit']))
	 {
	 $EndDate = $_POST['EndDate'];
	 $StartDate = $_POST['StartDate'];
      $result = "SELECT *FROM prescription WHERE date BETWEEN '$StartDate' AND '$EndDate' ORDER BY date ASC";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
	  <a href="test3.php?StartDate=$StartDate&EndDate=$EndDate" style="text-decoration:none;"><input style="background:#293f50; color:white;"type='submit' name='submit' value='Print Report' /></a>
	  
		<table id="example" class="display table table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">





        <thead>
            <tr>
                      <th>Doctor</th>
          <th>National Id</th>
          <th>Lab Request</th>
		    <th>Drug Prescription</th>
		  <th>Date</th>
		  <th>Option</th>
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>Doctor</th>
          <th>National Id</th>
          <th>Lab Request</th>
		    <th>Drug Prescription</th>
		  <th>Date</th>
		  <th>Option</th>
             
            </tr>
        </tfoot>

<tbody>
<?php
          while( $row = mysqli_fetch_array( $selected ) ){
			$prescription_id_id=$row['prescription_id'];
		
            echo
            "<tr>
			
                 <td>{$row['doc_name']}</td>
              <td>{$row['national_id']}</td>
			  <td>{$row['lab_test']}</td>
			  <td>{$row['drug_prescription']}</td>
              <td>{$row['date']}</td>
           
            </tr>\n";
          }
        ?>
    
            
        </tbody>
    </table>
	<?php } ?>
	</body>
</html>
