<?php
include ("../DBA/conexionDBA.php");
//require(" ../DBA/conexionDBA.php");
$id =  $_GET['id'];
$query = " DELETE FROM producto where id = $id ";
$ejecuta = $mysqli->query($query);
 if ($ejecuta)
        echo "se elimino";
    else
        echo "error";

//header ('Location: ../../view/productos.view.php');

?>