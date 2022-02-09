<?php



require('../fpdf184/fpdf.php');
require("../Controller/DBA/conexionDBA.php");
$cliente = $_GET['id'];

$consulta = "SELECT *FROM cliente Where id = ".$cliente;
$resultado = $mysqli->query($consulta);
$row = mysqli_fetch_array($resultado);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->Cell(120,10,'REPORTE POR CLIENTES',0,0,'R');
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->Cell(30,6,'CODIGO: ',0,0);
$pdf->Cell(0,6,$row['id'],0,1);
$pdf->Ln(10);
$pdf->Cell(30,6,'NOMBRE : ',0,0);
$pdf->Cell(40,6,$row['Nombre'].' '.$row['Apellido'],0,1);
$pdf->Ln(10);
$pdf->Cell(30,6,'CEDULA: ',0,0);
$pdf->MultiCell(0,6,$row['Cedula'],0,1);
$pdf->Ln(10);
$pdf->Cell(35,6,'TELEFONO: ',0,0);
$pdf->Cell(40,6,$row['Telefono'],0,1);
$pdf->Ln(10);
$pdf->Cell(35,6,'CORREO: ',0,0);
$pdf->Cell(40,6,$row['Correo'],0,1);
$pdf->Ln(10);
$pdf->Cell(35,6,'DIRECCION: ',0,0);
$pdf->Cell(40,6,$row['Direccion'],0,1);
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->Cell(100, 10, utf8_decode('Reporte TOO2_System'), 0, 0); 
$pdf->Ln(10);


$pdf->Output();
?>