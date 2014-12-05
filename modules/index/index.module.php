<?php
//require(dirname(__FILE__).'\..\..\pdf\fpdf.php');  // pour pouvoir utiliser la librairie fpdf dans les modules qui exdends THE modul

class Index extends Module{

	public function action_index(){
		$this->set_title("Index");
			//ce module ne fait rien de particulier	
		

		
		/*
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World !');
		$pdf->Output();	
		*/
	}

	
}	
?>