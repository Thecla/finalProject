<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='SCIENTIST')
{
  echo "<script>window.location.assign('logintest.php')</script>";
}
?>
<!DOCTYPE html>
<?php
require_once("Functions/function.php");
?>
<html>
<head>
<title>Scientist Area</title>
<link rel="stylesheet" href="style/style.css" media="all" />

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
				<li><a href="logout.php">LOGOUT</a></li><li>				
				</ul>
		<!--	<div id="form">
		<form method="get" action="results.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="search a product"/>
	<input type="submit" name="search" value="search" />
				</form>
			</div>-->
			</div>
		<!-- main ends here-->
		
		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Dashboard</div>
				<ul id="cats">
				<li><a href="labreport.php">Laboratory Reports</a></li><li>
				<a href="labreportlist.php">Lab Report List</a></li><li>
				<a href="scientistpage.php"><img src="images/arrow.png" style="height:30px; width:30px float:left" />Return</a></li>
				
				</ul>
			
			<div id="sidebar_title"></div>
				<ul id="cats">
					
				</ul>
				
			</div>
			<div id="content_area">
			<div id="register">
			<div id="department">
			<ul>
			<li><a href="labreportlist.php"> Lab Result List</a></li>
			<li><a href="labreport.php"> Process Lab Request</a></li>
			</ul>
			</div>
			<?php
    

     //execute the SQL query and return records
      $result = "SELECT * FROM lab_report ";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
     
      ?>
      <table border="5" style= "background-color: white; color: grey; padding:10px margin:0 auto;" >
      <thead>
        <tr>
          
          <th>Scientist</th>          
		 <th>National Id</th>				
          <th>Date</th>
			<th>Report</th>
			<th>Details</th>
	  </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_array( $selected ) )
				  {
	$lab_report_id=  $row['lab_report_id'];
		
            echo
            "<tr>
                <td>{$row['sc_name']}</td>               
			   <td>{$row['p_national_id']}</td> 
			  <td>{$row['date']}</td>			  
             <td>{$row['report']}</td>
		<td><a href='details.php?lab_report_id=$lab_report_id'>View Report</a></td>
</tr>\n";
          }
        ?>
      </tbody>
    </table>
			</div>
			</div>
			</div>
		
		<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
<!-- main ends here-->
	</div>
</body>

</html>








