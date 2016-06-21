<?php
require_once('functions/function.php');
$result = "SELECT * FROM lab_report ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
		
          while( $row = mysqli_fetch_array( $selected ) ){
	
			
  $file = 'lab_reports/$report';
  $filename = 'report';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);

          }
		
?>		