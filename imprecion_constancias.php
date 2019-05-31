<?php

include('plantilla2.php');

$pdf = new PDF('l','mm',array(225,180));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	
	$pdf->MultiCell(80,10,'SAN SALVADOR.',0,'L',0);
	$pdf->SetXY(180,58);
	$pdf->MultiCell(80,10,$_POST['fecha'],0,'L',0);
$pdf->SetFont('Arial','',12);
     $pdf->MultiCell(80,10,'A Quien Interese:',0,'L',0);
     $pdf->MultiCell(212,10,'Por este Medio Hago Constar que el/a paciente: '.$_POST['paciente'].' , asistio a mi consulta en la fecha '.$_POST['fecha']. ' , teniendo un cuadro '.$_POST['padecimiento'].' . Por Lo que se extiende esta constancia medica y se da una incapacidad de '.$_POST['incapacidad'].' dias a partir de esta fecha. Y Para Los Usos que estime conveniente',0,'L',0);
$pdf->SetFont('Arial','B',12);
     $pdf->SetXY(10,136);
    $pdf->MultiCell(80,20,'Firma.____________________',0,'L',0);
    $pdf->SetXY(100,136);
 $pdf->MultiCell(80,20,'Sello.________________________',0,'L',0);
	$pdf->Output();
	


	
    
	

?>