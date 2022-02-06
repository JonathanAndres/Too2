<?= require ('../templates/Header.php'); 
    require ('../Controller/controllers.views/registro.controller.php');
?>
    <div class="main-panel">
    <?= require ('../templates/nav.php'); ?>
    
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Nueva Factura</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body"> 
                  <form action="../Controller/controllers.views/Person.controller.php" method="POST">

                    <fieldset>

                      <legend style="font-weight: bold; font-size: 17px;" >Datos Cliente</legend>

                      <hr>  

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Cliente</label>
                            <select name="codigo" class="form-control" value="">
                              <option>Seleccione ...</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <!-- <label class="bmd-label-floating">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" value=""> -->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Cedúla</label>
                            <input type="text" disabled="true" class="form-control" name="Apellido" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre</label>
                            <input type="text" disabled="true" class="form-control" name="Direccion" value="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="number" disabled="true" class="form-control" name="direccion" value="">
                        </div>
                      </div>
                    </div>
                    </fieldset>
                    <hr>
                    <fieldset>
                    <legend style="font-weight: bold; font-size: 17px;" >Datos Factura</legend>
                    <hr> 
                    </fieldset>
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
<?= require ('../templates/Footer.php'); ?>