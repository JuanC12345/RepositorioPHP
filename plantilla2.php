<?php
require('fpdf.php');


	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.png', 5, 5, 45 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->SetXY(50,38);
			$this->Cell(120,10, 'Constancia De Salud',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
