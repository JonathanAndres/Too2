<?php 

require ("../DBA/conexionDBA.php");

//Datos Form//
$codigo = $_POST['codigo'];
$nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Direccion = $_POST['Direccion'];
$Telefono = $_POST['Telefono'];

$query = "UPDATE persona Set Nombre = '".$nombre."', Apellido = '".$Apellido."', Direccion = '".$Direccion."', Telefono = '".$Telefono."' WHERE Cedula = '".$codigo."'";

$ejecuta = $mysqli->query($query);
if($ejecuta == true )
    echo "<scrip>window.close()</scrip>";
else
    echo "error";           

?>