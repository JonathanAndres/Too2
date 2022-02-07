<?= require ('../templates/Header.php'); 

?>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Nuevo Cliente</h4>
                </div>
                <div class="card-body"> 
                  <form action="../Controller/controllers.views/registroCliente.controller.php" method="POST">
                    <div class="row">
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" name="nombre" id="nombre" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellido</label>
                          <input type="text" class="form-control" name="apellido" id="apellido" >
                        </div>
                      </div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cedula</label>
                          <input type="text" class="form-control" name="cedula" id="cedula">
                        </div>
                      </div>

                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" >
                        </div>
                      </div>
                    </div><br><br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo Electronico</label>
                          <input type="email" class="form-control" name="correo" id="correo" >
                        </div>
                      </div>

                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Teléfono</label>
                          <input type="text" class="form-control" name="telefono" id="telefono" >
                        </div>
                      </div>
                    </div><br><br>
                                                    
                   
                    <button type="submit" class="btn btn-danger pull-right" onclick='window.close()' >Cancelar</button>
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
