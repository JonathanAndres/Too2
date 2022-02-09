<?php



require('../fpdf184/fpdf.php');
require("../Controller/DBA/conexionDBA.php");

$consulta = "SELECT * FROM producto ";
$resultado = $mysqli->query($consulta);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(120,10,'REPORTE POR PRODUCTO',0,0,'R');
$pdf->Ln(10);
while($row = mysqli_fetch_array($resultado)){
    $pdf->Ln(10);
    $pdf->Cell(50,6,'CODIGO DE BARRAS: ',0,0);
    $pdf->Cell(0,6,$row['CodBarras'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(50,6,'NOMBRE PRODUCTO: ',0,0);
    $pdf->Cell(40,6,$row['NombreProducto'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(50,6,'DESCRIPCION: ',0,0);
    $pdf->MultiCell(0,6,$row['Descripcion'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(35,6,'PRECIO: ',0,0);
    $pdf->Cell(40,6,$row['precio'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(35,6,'ESTADO: ',0,0);
    $pdf->Cell(40,6,$row['Estado'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(35,6,'CANTIDAD: ',0,0);
    $pdf->Cell(40,6,$row['cantidad'],0,1);
    $pdf->Ln(10);
    $pdf->Cell(11,11, $pdf->Image($row['image'],30),0);
    $pdf->Ln(10);
}

$pdf->Cell(100, 10, utf8_decode('Reporte TOO2_System'), 0, 0); 
$pdf->Ln(10);

$pdf->Output();
