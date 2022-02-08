<?= require ('../templates/Header.php'); 
    require ('../Controller/controllers.views/registro.controller.php');
  
  
?>
    <div class="main-panel">
 
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Producto</h4>
                  <p class="card-category">Ingrese los siguientes campos</p>
                </div>
                <div class="card-body"> 
                  <form action="../Controller/controllers.views/Producto.controller.php" method="POST">
                    <div class="row">
                  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CodBarras</label>
                          <input type="text" name="CodBarras" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Descripción</label>
                          <input type="text" class="form-control" name="Descripcion" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre del producto </label>
                          <input type="text" class="form-control" name="NombreProducto">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio en $</label>
                          <input type="number" class="form-control" name="precio" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tipo</label>
                          <input type="number" class="form-control" name="tipo" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado</label>
                          <input type="text" class="form-control" name="Estado" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cantidad</label>
                          <input type="number" class="form-control" name="cantidad" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Imagen</label>
                          <input type="text" class="form-control" name="imagen" >
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" >Guardar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?= require ('../templates/footer_pg.php'); ?>
    </div>
