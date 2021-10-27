<?php 
    require ("../Controller/DBA/conexionDBA.php");


    function cbx_empresa($dat_cbx,$mysqli)
    {
        $query = $mysqli -> query("Select ruc,nombre From ".$dat_cbx);
        while($valores = mysqli_fetch_array($query)){
            echo '<option value="'.$valores["ruc"].'">'.$valores["nombre"].'</option>';
        }
    }

?>