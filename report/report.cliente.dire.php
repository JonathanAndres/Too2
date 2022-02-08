<?php
		

		
		require ('fpdf/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Cliente',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'id',1,0,'C');
		$this->Cell(40,10,'Nombre',1,0,'C');
		$this->Cell(40,10,'Apellido',1,0,'C');
		$this->Cell(40,10,'Cédula',1,0,'C');
		$this->Cell(40,10,'Telefono',1,0,'C');
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
        $consulta ="SELECT *FROM cliente where 'Direccion'="Riobamba"";
        $resultado=$mysql->query($consulta);


		$pdf = new FPDF();
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = $resultado->fech_assoc())
		{
		$pdf->Cell(25,10,$dato['id'],1,0,'C');
		$pdf->Cell(40,10,$dato['Nombre'],1,0,'C');
		$pdf->Cell(40,10,$dato['Apellido'],1,0,'C');
		$pdf->Cell(40,10,$dato['Cédula'],1,0,'C');
		$pdf->Cell(40,10,$dato['Telefono'],1,0,'C');
		$pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>
