<?php
		

		
		require ('fpdf/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Factura',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'id',1,0,'C');
		$this->Cell(40,10,'Producto',1,0,'C');
		$this->Cell(40,10,'Precio',1,0,'C');
		$this->Cell(40,10,'Cantidad',1,0,'C');
		$this->Cell(40,10,'Total',1,0,'C');
		$this->Ln();
            }
            function Footer()
            {
            $this->SetY(-15);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
        }

        }

		require 'conexionDBA.php';
        $consulta ="SELECT *FROM detalle_factura";
        $resultado=$mysql->query($consulta);


		$pdf = new FPDF();
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = $resultado->fech_assoc())
		{
            $pdf->Cell(25,10,'id',1,0,'C');
            $pdf->Cell(40,10,'Producto',1,0,'C');
            $pdf->Cell(40,10,'Precio',1,0,'C');
            $pdf->Cell(40,10,'Cantidad',1,0,'C');
            $pdf->Cell(40,10,'Total',1,0,'C');
            $pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>
