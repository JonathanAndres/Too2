<?= require ('../templates/Header.php');
    require("../Controller/DBA/function.dba.php");
    require("../Controller/DBA/conexionDBA.php");
    $vecotor = VecDatos("producto",$mysqli,$_GET["id"]);
  
?>

    <div class="main-panel">
 
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Producto</h4>
                  <p class="card-category">Complete los siguientes campos</p>
                </div>
                <div class="card-body"> 
                  <form action="../Controller/controllers.views/EditarProducto.controller.php" method="POST">
                    <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                          <label style="visibility:hiddenclass bmd-label-floating">iD</label> 
                           <input type="text" name="id" class="form-control" style="visibility:hidden" value="<?= $vecotor["id"] ?>">
                        </div>
                      </div> 
                  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CodBarras</label>
                          <input type="text" name="CodBarras" class="form-control" value="<?= $vecotor["CodBarras"] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Descripción</label>
                          <input type="text" class="form-control" name="Descripcion" value="<?= $vecotor["Descripcion"] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre del producto </label>
                          <input type="text" class="form-control" name="NombreProducto" value="<?= $vecotor["NombreProducto"] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio</label>
                          <input type="number" class="form-control" name="precio" value="<?= $vecotor["precio"] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tipo</label>
                          <input type="number" class="form-control" name="tipo" value="<?= $vecotor["tipo"] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-13">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado</label>
                          <input type="text" class="form-control" name="Estado" value="<?= $vecotor["Estado"] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-14">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cantidad</label>
                          <input type="number" class="form-control" name="cantidad" value="<?= $vecotor["cantidad"] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-15">
                        <div class="form-group">
                          <label class="bmd-label-floating">Imagen</label>
                          <input type="text" class="form-control" name="imagen" value="<?= $vecotor["imagen"] ?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-left" >Actualiar</button>
                    <button class="btn btn-primary pull-right" onclick='window.close()'>Cancelar</button>
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
