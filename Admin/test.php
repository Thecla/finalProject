<?php

require("fpdf/fpdf.php");
require_once("includes/db_connect.php");
$pdf=new FPDF();
$pdf->AddPage();

$pdf->Image('images/cuealogo2.gif',16,8,150,'GIF');
$pdf->SetFont("Arial","B",16);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(16,10,'',0,1);
$pdf->Cell(0,10,"INFIRMARY REPORT",0,1,'C');
$pdf->Cell(150,7,'',0,0);
$pdf->Cell(10,7,'Date:'.date('d-m-y').'',0,1);
$pdf->SetFont("Arial","",10);
$pdf->Cell(0,10,"Patient List",0,1,'C');
$pdf->Ln(2);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(15,8,'Item',0);
$pdf->Cell(20,8,'ID',0);
$pdf->Cell(30,8,'Name',0);
$pdf->Cell(40,8,'Mobile Number',0);
$pdf->Cell(30,8,'Date Of Birth',0);
$pdf->Cell(30,8,'Blood Group',0);
$pdf->Cell(20,8,'Date',0);
$pdf->Ln(8);
//$pdf->Ln(15);
$pdf->SetFont('Arial','',8);
 if(isset($_POST['submit'])){
	$StartDate=$_POST['StartDate'];
	$EndDate=$_POST['EndDate'];
  $result = "SELECT * FROM patient WHERE date BETWEEN '$StartDate' AND '$EndDate' ORDER BY date ASC";
	  
      $selected = mysqli_query($con, $result)
        or die("Unable to connect");
		$item=0;
       while( $row = mysqli_fetch_array( $selected ) ){
	$item=$item +1;
	$pdf->Cell(15,8, $item,0);
$pdf->Cell(20,8, $row['national_id'],0);
$pdf->Cell(30,8, $row['patient_name'],0);
$pdf->Cell(40,8, $row['patient_mobile'],0);
$pdf->Cell(40,8, $row['patient_dob'],0);
$pdf->Cell(20,8,$row['patient_blood_group'],0);
$pdf->Cell(20,8,$row['date'],0);
//$pdf->Ln();
$pdf->Ln(8);
		}}
$pdf->output();
?>