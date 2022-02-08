<?php
		

		
		require ('../fpdf184/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Cliente',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'id',1,0,'C');
		$this->Cell(40,10,'Descripcion',1,0,'C');
		$this->Cell(40,10,'Fecha',1,0,'C');
		$this->Cell(40,10,'Cantidad',1,0,'C');
		$this->Cell(40,10,'Total',1,0,'C');
        $this->Cell(40,10,'Estado',1,0,'C');
		$this->Ln();
            }
            function Footer()
            {
            $this->SetY(-15);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
        }

        }

		require ("../Controller/DBA/conexionDBA.php");
        $consulta ="SELECT *FROM kardex";
        $resultado=$mysqli->query($consulta);


		$pdf = new FPDF();
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = mysqli_fetch_array($resultado))
		{
            $pdf->Cell(25,10,$row['ID'],1,0,'C');
            $pdf->Cell(40,10,$row['Descripcion'],1,0,'C');
            $pdf->Cell(40,10,$row['Fecha'],1,0,'C');
            $pdf->Cell(40,10,$row['cantidad'],1,0,'C');
            $pdf->Cell(40,10,$row['total'],1,0,'C');
            $pdf->Cell(40,10,$row['estado'],1,0,'C');
            $pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>
