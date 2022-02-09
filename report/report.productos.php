<?php
require ('../fpdf184/fpdf.php');
        class PDF extends FPDF
        {
            function Header(){
                $this->SetFont('Arial', 'B', 14);
                $this->Cell(60);
                $this->Cell(70,15,'Reporte de Productos',0,0,'C');
                $this->Ln(20);
                $this->Cell(15,25,'id',1,0,'C');
        $this->Cell(40,25,'Descripcion',1,0,'C');
        $this->Cell(40,25,'Nombre',1,0,'C');
        $this->Cell(40,25,'Precio',1,0,'C');
        $this->Cell(15,25,'Estado',1,0,'C');
        $this->Cell(20,25,'Cantidad',1,0,'C');
        $this->Ln();
            }
            function Footer()
            {
            $this->SetY(-15);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(70,15,'Hecho por Andrés Gualoto',0,0,'C');
        }
        }
        require ("../Controller/DBA/conexionDBA.php");
        $consulta ="SELECT *FROM producto";
        $resultado=$mysqli->query($consulta);
        $pdf = new FPDF('L','cm','letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        while ($row = mysqli_fetch_array($resultado))
        {      

$pdf->Cell(15,25,$row['id'],1,0,'C');
            $pdf->Cell(40,25,$row['Descripcion'],1,0,'C');
            $pdf->Cell(40,25,$row['NombreProducto'],1,0,'C');
            $pdf->Cell(40,25,$row['precio'],1,0,'C');
            $pdf->Cell(15,25,$row['Estado'],1,0,'C');
            $pdf->Cell(20,25,$row['cantidad'],1,0,'C');
            $pdf->Ln();
        }
        $pdf->Output();
              ?>
