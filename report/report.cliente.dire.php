<?php



require('../fpdf184/fpdf.php');

$cuidad = $_GET['cuidad'];

require("../Controller/DBA/conexionDBA.php");
$consulta = "SELECT * FROM cliente Where Direccion = '".$cuidad."'";
$resultado = $mysqli->query($consulta);


$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(100,10,utf8_decode('REPORTE CLIENTES POR DIRECCION '),0,1,'R');
$pdf->Ln(10);
$pdf->Cell(25, 10, 'ID', 1, 0, 'C');
	$pdf->Cell(30, 10, 'NOMBRE', 1, 0, 'C');
	$pdf->Cell(30, 10, 'APELLIDO', 1, 0, 'C');
	$pdf->Cell(35, 10, 'CEDULA', 1, 0, 'C');
	$pdf->Cell(35, 10, 'DIRECCION', 1, 0, 'C');
	$pdf->Ln();

while ($row = mysqli_fetch_array($resultado)) {
	$pdf->Cell(25, 10, $row['id'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row['Nombre'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row['Apellido'], 1, 0, 'C');
	$pdf->Cell(35, 10, $row['Cedula'], 1, 0, 'C');
	$pdf->Cell(35, 10, $row['Direccion'], 1, 0, 'C');
	$pdf->Ln();
}

$pdf->Ln(10);
$pdf->Cell(100, 10, utf8_decode('Creado por Too2-System '), 0, 0, 'R'); 

$pdf->Output();
