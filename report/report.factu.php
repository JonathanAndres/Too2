<?php
		

		
		require ('../fpdf184/fpdf.php');


        require("../Controller/DBA/conexionDBA.php");
$id = $_GET['id'];

$query = "SELECT cf.* , CONCAT(c.Nombre,' ',c.Apellido) as Nombre , c.Cedula 
          FROM cabecera_factura cf, cliente c 
          WHERE NumFactura = ".$id." & c.id = cf.id_Cliente";

$result = $mysqli->query($query);
$row = mysqli_fetch_array($result);

$query1 = "SELECT df.*, p.*
FROM  detalle_factura df, producto p
WHERE df.numFac = ".$id." and p.id = df.productoid";
$result1 = $mysqli->query($query1);
//$row1 = mysqli_fetch_array($result1);
echo("funciona");
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>FACTURA</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	Para,<br />
	<b>RECEPTOR (FACTURA A)</b><br />
	Nombres : '.$row['Nombre'].'<br /> 
	Cedula : '.$row['Cedula'].'<br />
	</td>
	<td width="35%">         
	Factura No. : '.$row['NumFactura'].'<br />
	Factura Fecha : '.$row['Fecha'].'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Codigo</th>
	<th align="left">Nombre Producto</th>
	<th align="left">Cantidad</th>
	<th align="left">Precio</th>
	<th align="left">Actual Amt.</th> 
	</tr>';
$count = 0;
while($row1 = mysqli_fetch_array($result1)){   
//foreach($invoiceItems as $invoiceItem){
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$row1["CodBarras"].'</td>
	<td align="left">'.$row1["NombreProducto"].'</td>
	<td align="left">'.$row1["cantidad"].'</td>
	<td align="left">'.$row1["precio"].'</td>
	<td align="left">'.$row1["total"].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Sub Total</b></td>
	<td align="left"><b>'.$row['Subtotal'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Tasa Impuesto :</b></td>
	<td align="left">12%</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Monto Tasa: </td>
	<td align="left">'.$row['iva'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total: </td>
	<td align="left">'.$row['TotalVenta'].'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
//$invoiceFileName = 'Invoice-'.$invoiceValues['order_id'].'.pdf';

// require_once 'dompdf/src/Autoloader.php';
// Dompdf\Autoloader::register();
// use Dompdf\Dompdf;
// $dompdf = new Dompdf();
// $dompdf->loadHtml(html_entity_decode($output));
// $dompdf->setPaper('A4', 'landscape');
// $dompdf->render();
        
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


		$pdf = new FPDF();
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
