<?php
require("../DBA/conexionDBA.php");
$q = intval($_GET['q']);
$query = $mysqli->query("SELECT * FROM cliente WHERE Cedula = '".$q."'");
$valores = mysqli_fetch_array($query);
//echo '<option value="' . $valores[1] . '">' . $valores[2] . '</option>';

?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Cedúla</label>
            <input type="text" disabled="true" class="form-control" name="cedula" id="cedula" value="<?php echo $valores["Cedula"]; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Nombre</label>
            <input type="text" disabled="true" class="form-control" name="nombre" id="nombre" value="<?php echo $valores["Nombre"]." ". $valores["Apellido"]; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Dirección</label>
            <input type="number" disabled="true" class="form-control" name="direccion" id="direccion" value="<?php echo $valores[1]; ?>">
        </div>
    </div>
</div>