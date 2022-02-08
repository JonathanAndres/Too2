<?php
// session_start();
// include 'Invoice.php';
// $invoice = new Invoice();
// $invoice->checkLoggedIn();
// if(!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
// 	echo $_GET['invoice_id'];
// 	$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);		
// 	$invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);		
// }
// $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['order_date']));
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
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
//$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>  