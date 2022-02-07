<?php 

require ("../DBA/conexionDBA.php");

if($_POST['nombre'] != null && $_POST['apellido']  && $_POST['cedula'] && $_POST['direccion']  && $_POST['telefono'] && $_POST['correo']){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO  cliente  ( Nombre,Apellido,Cedula,Telefono,Correo,Direccion) VALUES 
    ('".$nombre."', '".$apellido."', '".$cedula."', '".$correo."', '".$correo."', '".$direccion."')";
    $ejecuta = $mysqli->query($query);
    if($ejecuta == true )
       echo "si se ejecuto ";
    else
        echo "error";       
    


}else{
   
       echo "NO se ingreso todos los campos";
}

?>