<?= require ('../templates/Header.php');?>
<?= require ('../Controller/controllers.views/users.controller.php'); ?>  
<?php
$id = $_GET["id"];
$query = $mysqli -> query("Select * From cliente WHERE id = '".$id."' ");
$cliente = mysqli_fetch_array($query)// array

?>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ModificarCliente</h4>
                </div>
                <div class="card-body"> 
                  <form action="../Controller/controllers.views/modificarCliente.controller.php" method="POST">
                    <div class="row">

                     <input type="hidden" name="id" name="id" value="<?= $cliente["id"]?>">
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $cliente["Nombre"] ?>" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellido</label>
                          <input type="text" class="form-control" name="apellido" id="apellido" value="<?= $cliente["Apellido"] ?>">
                        </div>
                      </div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cedula</label>
                          <input type="text" class="form-control" name="cedula" id="cedula" value="<?= $cliente["Cedula"] ?>">
                        </div>
                      </div>
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $cliente["Direccion"] ?>">
                        </div>
                      </div>
                    </div><br><br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo Electronico</label>
                          <input type="email" class="form-control" name="correo" id="correo" value="<?= $cliente["Correo"] ?>">
                        </div>
                      </div>

                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Teléfono</label>
                          <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $cliente["Telefono"] ?>">
                        </div>
                      </div>
                    </div><br><br>
                                                    
                   
                    <button type="button" class="btn btn-danger pull-right" onclick="location.href='clientes.view.php'" >Cancelar</button>
                    <button type="submit" class="btn btn-primary pull-right" >Guardar</button>
               
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 
</div>  
    
</div>
