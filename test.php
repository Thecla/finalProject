<?php

require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"Welcome",1,0,'C');

$pdf->output();
?>