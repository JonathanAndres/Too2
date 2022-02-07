<?php 

require ("../DBA/conexionDBA.php");
$id = $_GET['id'];
$query = " DELETE FROM cliente WHERE id = '".$id."'";
 $ejecuta = $mysqli->query($query);
    if($ejecuta == true )
       echo "se elimino ";
    else
        echo "error";
        
  header('Location: ../../views/clientes.view.php ');

?>