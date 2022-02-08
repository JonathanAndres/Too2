
<?php
include ("../DBA/conexionDBA.php");
if(isset($_POST["Descripcion"]) && isset($_POST["NombreProducto"]) &&  isset($_POST["precio"])  &&  isset($_POST["tipo"]) && isset($_POST["Estado"]) && isset($_POST["cantidad"])){

    $CodBarras = $_POST['CodBarras'];
    $Descripcion= $_POST['Descripcion'];
    $NombreProducto = $_POST['NombreProducto'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $Estado = $_POST['Estado'];
    $cantidad = $_POST['cantidad'];
   // $imagen = $_POST['imagen'];
    
$query = "INSERT INTO  producto  ( CodBarras,Descripcion,NombreProducto,precio,tipo,cantidad) VALUES 
    ('".$CodBarras."', '".$Descripcion."','".$NombreProducto."', '".$precio."', '".$tipo."', '".$cantidad."')";
   $ejecuta = $mysqli->query($query);
    if($ejecuta == true )
       echo "El producto fue ingresado correctamente ";
    else
        echo "Error";       
}else{
   
       echo "NO se ingreso todos los campos";
       header("Location: productos.view.php");
}
?>
