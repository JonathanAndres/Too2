<?php 

require ("../DBA/conexionDBA.php");

if($_POST['nombre'] != null && $_POST['apellido']  && $_POST['cedula'] && $_POST['direccion']  && $_POST['telefono'] && $_POST['correo']){

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono'];

   
    $query = "UPDATE cliente SET Nombre = '".$nombre."' , Apellido = '".$apellido."',Cedula = '".$cedula."',Telefono = '".$correo."' ,Correo =  '".$correo."',Direccion = '".$direccion."' 
     WHERE id = '".$id."'";
    $ejecuta = $mysqli->query($query);
    if($ejecuta == true )
       echo "se modifico ";
    else
        echo "error";       


}else{
   
       echo "NO se ingreso todos los campos";
}

  header('Location: ../../views/clientes.view.php ');


?>