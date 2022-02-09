<?php

$Author="Andres Alcoser";

require ('../fpdf184/fpdf.php');

require("../Controller/DBA/conexionDBA.php");
$id = $_GET['id'];

$query = "SELECT cf.* , CONCAT(c.Nombre,' ',c.Apellido) as Nombre , c.Cedula 
          FROM cabecera_factura cf, cliente c 
          WHERE NumFactura = ".$id." AND c.id = cf.id_Cliente";

$result = $mysqli->query($query);
$row = mysqli_fetch_array($result);

$query1 = " SELECT df.*, p.*
            FROM  detalle_factura df, producto p
            WHERE df.numFac = ".$id." and p.id = df.productoid";
$result1 = $mysqli->query($query1);

//include '../fdf184/fpdf.php'; // Incluímos la clase fpdf.php para poder utilizar sus métodos para generar nuestro pdf
date_default_timezone_set('America/Lima'); //Configuramos el horario de acuerdo a la ubicación del servidor
class PDF extends FPDF{  
    function Header() {        
        $this->Image('../assets/img/logo.png', 12, 12, 25); //Insertamos el logo si es en PNG su calidad o formato debe estar entre PNG 8/PNG 24
         
        $ancho = 190;
        $this->SetFont('Arial', 'B', 6);
         
        if($this->pagina == 1){ //Cuando el archivo está en Horizontal
            $horizontal = 85; //Permitirá que las dimensiones que abarca horizontalmente sea 85 puntos más que cuando es vertical
            $this->SetY(12);
            $this->Cell($ancho + $horizontal, 10,'Usuario: Too2', 0, 0, 'R');
            $this->SetY(15);
            $this->Cell($ancho + $horizontal, 10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
            $this->SetY(18);
            $this->Cell($ancho + $horizontal, 10,'Hora: '.date('H:i:s'), 0, 0, 'R');            
        } else {            
            $this->SetY(12); //Mencionamos que el curso en la posición Y empezará a los 12 puntos para escribir el Usuario:
            $this->Cell($ancho, 10,'Usuario: Too2', 0, 0, 'R');
            $this->SetY(15);
            $this->Cell($ancho, 10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
            $this->SetY(18);
            $this->Cell($ancho, 10,'Hora: '.date('H:i:s'), 0, 0, 'R');            
        }        
    }
     
    function Body() {
        $yy = 40; //Variable auxiliar para desplazarse 40 puntos del borde superior hacia abajo en la coordenada de las Y para evitar que el título este al nivel de la cabecera.
        $y = $this->GetY(); 
        $x = 12;
        $this->AddPage($this->CurOrientation);
         
        $this->SetFont('helvetica', 'B', 20); //Asignar la fuente, el estilo de la fuente (negrita) y el tamaño de la fuente
        $this->SetXY(0, $y + $yy); //Ubicación según coordenadas X, Y. X=0 porque empezará desde el borde izquierdo de la página
        $this->Cell(220, 10, "Reportes Personalizados", 0, 1, 'C');
         
        $this->SetFont('courier', 'U', 15); //Asignar la fuente, el estilo de la fuente (subrayado) y el tamaño de la fuente
        $y = $this->GetY(); 
        $this->SetXY(0, $y); //Ubicación según coordenadas X, Y. X=0 porque empezará desde el borde izquierdo de la página
        $this->Cell(220, 10, "Lista de Alumnos", 0, 1, 'C');
         
        $this->SetFont('arial', '', 8); //Asignar la fuente, el estilo de la fuente (subrayado) y el tamaño de la fuente
        $y = $this->GetY() + 8;
        $this->SetXY(10, $y);
        $this->MultiCell(12, 4, utf8_decode("Nº"), 1, 'C'); //Utilizamos el utf8_decode para evitar código basura o ilegible
        $this->SetXY(22, $y); //El resultado 22 es la suma de la posición 10 y el tamaño del MultiCell de 12.
        $this->MultiCell(73, 4, utf8_decode("Apellidos y Nombres"), 1, 'C');
        $this->SetXY(95, $y);
        $this->MultiCell(40, 4, utf8_decode("Nº DNI"), 1, 'C');
        $this->SetXY(135, $y);
        $this->MultiCell(35, 4, utf8_decode("Correo"), 1, 'C');
        $this->SetXY(170, $y);
        $this->MultiCell(30, 4, utf8_decode("Teléfono"), 1, 'C');        
        $n = 1;
        

        while($n>5) {            
            $y = $this->GetY();
            $this->SetXY(10, $y);
            $this->MultiCell(12, 4, $n, 1, 'C');
            $this->SetXY(22, $y);
            $this->MultiCell(73, 4, "", 1, 'C');
            $this->SetXY(95, $y);
            $this->MultiCell(40, 4, "", 1, 'C');
            $this->SetXY(135, $y);
            $this->MultiCell(35, 4, "", 1, 'C');
            $this->SetXY(170, $y);
            $this->MultiCell(30, 4, "", 1, 'C');
            $n++;            
        }
         
        // $y = $this->GetY();
        // $this->SetXY(10, $y);
        // $this->Cell(190, 10, utf8_decode("Alineación a la derecha con 'R'"), 0, 1, 'R');
        // $y = $this->GetY();
        // $this->SetXY(10, $y);
        // $this->Cell(190, 10, utf8_decode("Alineación a la derecha con 'L'"), 0, 1, 'L');
        // $y = $this->GetY();
        // $this->SetXY(10, $y);
        // $this->Cell(190, 10, utf8_decode("Alineación centrado con 'C'"), 0, 1, 'C');
        // $y = $this->GetY();
        // $this->SetXY(10, $y);
        // $this->Cell(190, 10, utf8_decode("Texto con Borde"), 1, 1, 'J');
         
        // $this->pagina = 1;
        // $this->AddPage('L');
         
        // $this->pagina = 0;
        // $this->AddPage('P');
         
        // $this->pagina = 1;
        // $this->AddPage('L');
         
    }
     
    function Footer() {        
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
        if($this->CurOrientation == 'L') { //Se reconoce el tipo de Orientación de la página (Vertical = P|Horizontal = L)
            $this->SetX(0);
            $this->Cell(292, 10, utf8_decode('Creado por Too2-System '), 0, 0, 'R');            
        } else {       
            $this->SetX(0);
            $this->Cell(205, 10, utf8_decode('Creado por Too2-System '), 0, 0, 'R');
             
        }        
    }
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,10,'REPORTE FACTURA: ',0,0,'R');
$pdf->Ln(10);
$pdf->Cell(20,6,'Cliente: ',0,0);
$pdf->Cell(0,6,$row['Nombre'],0,1);
$pdf->Ln(10);
$pdf->Cell(20,6,'Cedula: ',0,0);
$pdf->Cell(0,6,$row['Cedula'],0,1);
$pdf->Ln(10);
$pdf->Cell(35,6,'Numero Factura: ',0,0);
$pdf->Cell(40,6,$row['NumFactura'],0,1);
$pdf->Ln(10);
$pdf->Cell(100, 10, utf8_decode('Detalle Factura '), 0, 0); 
$pdf->Ln(10);
//Tabla
    $pdf->Cell(30, 10, 'Codigo Barras', 1, 0, 'C');
	$pdf->Cell(70, 10, 'Producto', 1, 0, 'C');
	$pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C');
	$pdf->Cell(30, 10, 'Precio', 1, 0, 'C');
	$pdf->Cell(30, 10, 'Total', 1, 0, 'C');
    $pdf->Ln(10);
while ($row1 = mysqli_fetch_array($result1)) {
	$pdf->Cell(30, 10, $row1['CodBarras'], 1, 0, 'C');
	$pdf->Cell(70, 10,$row1['NombreProducto'],1, 0, 'C');
	$pdf->Cell(20, 10, $row1['cantidad'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row1['precio'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row1['total'], 1, 0, 'C');
    $pdf->Ln(10);
}

$pdf->Ln(10);
$pdf->Cell(20,6,'Subtotal: ',0,0,'L');
$pdf->Cell(0,6,$row['Subtotal'],0,1,'L');
$pdf->Ln(10);
$pdf->Cell(10,6,'Iva: ',0,0,'L');
$pdf->Cell(0,6,$row['iva'],0,1,'L');
$pdf->Ln(10);
$pdf->Cell(15,6,'Total: ',0,0,'L');
$pdf->Cell(0,6,$row['TotalVenta'],0,1,'L');

$pdf->Ln(10);
$pdf->Cell(100, 10, utf8_decode('Creado por Too2-System '), 0, 0, 'R'); 
// $pdf->pagina = 0;
// $pdf->AliasNbPages(); //Permitir el conteo de la cantidad de páginas existentes {nb}
$pdf->Output('ReporteEjemplo_TuCafeJava_'.date("d_m_Y_H_i_s"), 'I'); //El primer parámetro es para colocar el nombre del archivo al momento de ser descargado y el segundo parámetro es para abrir el archivo en el navegador con la opción para poder ser descargado
?>
