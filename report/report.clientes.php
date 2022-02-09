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
		$this->Cell(40,10,'Nombre',1,0,'C');
		$this->Cell(40,10,'Apellido',1,0,'C');
		$this->Cell(40,10,'Cedula',1,0,'C');
		$this->Cell(40,10,'Telefono',1,0,'C');
		$this->Cell(40,10,'Dirección',1,0,'C');
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
        $consulta ="SELECT *FROM cliente";
        $resultado=$mysqli->query($consulta);


		$pdf=new FPDF('L','mm','A4');
        $pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		


		
		while ($row = mysqli_fetch_array($resultado))
		{
		$pdf->Cell(25,10,$row['id'],1,0,'C');
		$pdf->Cell(40,10,$row['Nombre'],1,0,'C');
		$pdf->Cell(40,10,$row['Apellido'],1,0,'C');
		$pdf->Cell(40,10,$row['Cedula'],1,0,'C');
		$pdf->Cell(40,10,$row['Telefono'],1,0,'C');
		$pdf->Cell(35,10,$row['Direccion'],1,0,'C');
		$pdf->Ln();
		}
		
		

		$pdf->Output();
		

		

		

	

		?>
