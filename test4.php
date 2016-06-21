<?php

require("fpdf/fpdf.php");
require_once("includes/db_connect.php");
$pdf=new FPDF();
$pdf->AddPage();

$pdf->Image('Admin/images/cuealogo2.gif',16,8,150,'GIF');
$pdf->SetFont("Arial","B",16);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(0,10,"INFIRMARY REPORT",0,1,'C');
$pdf->Cell(150,7,'',0,0);
$pdf->Cell(10,7,'Date:'.date('d-m-y').'',0,1);
$pdf->SetFont("Arial","",10);
$pdf->Cell(0,10,"Prescription Details",0,1,'C');
$pdf->Ln(2);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(15,8,'Item',0);
$pdf->Cell(20,8,'ID',0);
$pdf->Cell(40,8,'Lab Tests',0);
$pdf->Cell(50,8,'Prescription',0);
$pdf->Cell(40,8,'Description',0);
$pdf->Cell(20,8,'Date',0);
$pdf->Ln(8);
//$pdf->Ln(15);
$pdf->SetFont('Arial','',8);
if(isset($_POST['submit'])){
	$StartDate=$_POST['StartDate'];
	$EndDate=$_POST['EndDate'];
  $result = "SELECT *FROM prescription WHERE date BETWEEN '$StartDate' AND '$EndDate' ORDER BY date ASC";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
		$item=0;
       while( $row = mysqli_fetch_array( $selected ) ){
	$item=$item +1;
	$pdf->Cell(15,8, $item,0);
$pdf->Cell(20,8, $row['national_id'],0);
$pdf->Cell(40,8, $row['lab_test'],0);
$pdf->Cell(50,8, $row['drug_prescription'],0);
$pdf->Cell(40,8, $row['description'],0);
$pdf->Cell(20,8,$row['date'],0);
$pdf->Ln(8);
		}}
$pdf->output();
?>