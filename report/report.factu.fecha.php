<?php
		

		
		require ('../fpdf184/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Factura',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'id',1,0,'C');
		$this->Cell(40,10,'ID Cliente',1,0,'C');
		$this->Cell(40,10,'Fecha',1,0,'C');
		$this->Cell(40,10,'Total',1,0,'C');
		$this->Cell(40,10,'Estado',1,0,'C');
		$this->Ln();
            }
            function Footer()
            {
            $this->SetY(-15);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(70,10,'Hecho por Marilin Rios',0,0,'C');
        }

        }

		require ("../Controller/DBA/conexionDBA.php");
        $consulta ="SELECT *FROM cabecera_factura where NumFactura='10'";
        $resultado=$mysqli->query($consulta);


		$pdf = new FPDF('L','cm','letter');
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = mysqli_fetch_array($resultado))
		{
            $pdf->Cell(25,10,$row['id'],1,0,'C');
            $pdf->Cell(40,10,$row['id_Cliente'],1,0,'C');
            $pdf->Cell(40,10,$row['Fecha'],1,0,'C');
            $pdf->Cell(40,10,$row['TotalVenta'],1,0,'C');
            $pdf->Cell(40,10,$row['Estado'],1,0,'C');
            $pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>
