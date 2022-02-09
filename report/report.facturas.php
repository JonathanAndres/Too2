<?php
		

		
		require ('../fpdf184/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Factura',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'ID',1,0,'C');
		$this->Cell(40,10,'NumFactura',1,0,'C');
		$this->Cell(30,10,'Cliente',1,0,'C');
		$this->Cell(25,10,'Fecha',1,0,'C');
		$this->Cell(30,10,'Total',1,0,'C');
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
        $consulta ="SELECT *FROM factura_table";
        $resultado=$mysqli->query($consulta);


		$pdf = new FPDF();
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = mysqli_fetch_array($resultado))
		{
            $pdf->Cell(25,10,$row['ID_Factura'],1,0,'C');
            $pdf->Cell(20,10,$row['NumFactura'],1,0,'C');
            $pdf->Cell(65,10,$row['Client_Info'],1,0,'C');
            $pdf->Cell(55,10,$row['Fecha'],1,0,'C');
            $pdf->Cell(30,10,$row['TotalVenta'],1,0,'C');
            $pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>