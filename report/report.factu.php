<?php
		

		
		require ('../fpdf184/fpdf.php');
	
		class PDF extends FPDF
        {

            function Header(){
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(60);
                $this->Cell(190,15,'Reporte de Productos',1,0,'C');
                $this->Ln(20);
                $this->Cell(25,10,'id',1,0,'C');
		$this->Cell(30,10,'Producto',1,0,'C');
		$this->Cell(20,10,'Precio',1,0,'C');
		$this->Cell(30,10,'Cantidad',1,0,'C');
		$this->Cell(30,10,'Estado',1,0,'C');
        $this->Cell(30,10,'Num Fac',1,0,'C');
        $this->Cell(30,10,'Total',1,0,'C');
        $this->Cell(30,10,'Subtotal',1,0,'C');
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
        $consulta ="SELECT *
        FROM cabecera_factura as cf, detalle_factura df
        WHERE cf.NumFactura = df.numFac";
        $resultado=$mysqli->query($consulta);


		$pdf = new FPDF('L','cm','letter');
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = mysqli_fetch_array($resultado))
		{
            $pdf->Cell(25,10,$row['facturaid'],1,0,'C');
		$pdf->Cell(30,10,$row['productoid'],1,0,'C');
		$pdf->Cell(20,10,$row['precio'],1,0,'C');
		$pdf->Cell(30,10,$row['cantidad'],1,0,'C');
		$pdf->Cell(30,10,$row['Estado'],1,0,'C');
        $pdf->Cell(30,10,$row['NumFactura'],1,0,'C');
        $pdf->Cell(30,10,$row['TotalVenta'],1,0,'C');
        $pdf->Cell(30,10,$row['Subtotal'],1,0,'C');
            
		}
		
		

		$pdf->Output();
		

		

		

	

		?>

