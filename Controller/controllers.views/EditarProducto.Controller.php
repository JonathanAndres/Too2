<?php 

include ("../DBA/conexionDBA.php");
//include("../DBA/funcion.dba.php");


        $id = $_POST ['id'];
        $CodBarras = $_POST ['CodBarras'];
        $Descripcion= $_POST ['Descripcion'];
        $NombreProducto = $_POST ['NombreProducto'];
        $precio = $_POST ['precio'];
        $tipo = $_POST ['tipo'];
        $Estado = $_POST ['Estado'];
        $cantidad = $_POST ['cantidad'];
        $imagen = $_POST ['imagen'];


        $query = "UPDATE  producto SET  CodBarras= '$CodBarras', Descripcion='$Descripcion', NombreProducto='$NombreProducto', precio='$precio',tipo='$tipo', cantidad='$cantidad', imagen='$imagen' where id ='$id'" ;
        $ejecuta = $mysqli->query($query);
       

 ?>