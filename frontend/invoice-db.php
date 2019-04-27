<?php
require('fpdf.php');

//db connection


//get invoices data
include "../core/stockC.php";

$sql="select * From stock";
		$db = config::getConnexion();
	
		$liste=$db->query($sql);
		$pdf = new FPDF('P','mm','A4');

		$pdf->AddPage();	
		//Cell(width , height , text , border , end line , [align] )
		$pdf->SetFont('Arial','B',14);
		$i=0;
$pdf->Cell(130	,5,'Catalogue Galaxy Design',0,0);

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(102	,5,'Image	',1,0);
$pdf->Cell(25	,5,'Nom',1,0);
$pdf->Cell(34	,5,'Prix en DT',1,1);//end of line

$pdf->SetFont('Arial','',12);
$i=0;
foreach($liste as $invoice){

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm


$nomimage=$invoice['fichier'];
$image1 = "../img/$nomimage";
$pdf->Cell(59	,5,'',0,1);
//set font to arial, bold, 14pt




//Numbers are right-aligned so we give 'R' after new line parameter

//items


//display the items
$pdf->Cell( 102, 75, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 100.90), 1, 0);


	//add thousand separator using number_format function
	$pdf->Cell(25	,75,$invoice['nom'],1,0);
	$pdf->Cell(34	,75,number_format($invoice['prix']),1,1,'M');//end of line
	//accumulate tax and amount
	

//summary

}
$pdf->Output();

?>
