<?= require ('../templates/Header.php'); 
    //require ('../Controller/controllers.views/registro.controller.php');
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
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Cliente</label>
                            <select name="Cli_codigo" id="Cli_codigo" class="form-control" onchange="showUser(this.value)">
                              <option value="17578231" >Andres Alocoser</option>
                              <option value="17578231" >17578231</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div id="pruebaTXT">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Cedúla</label>
                              <input type="text" disabled="true" class="form-control" name="cedula" id="cedula" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Nombre</label>
                              <input type="text" disabled="true" class="form-control" name="nombre" id="nombre" value="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Dirección</label>
                              <input type="number" disabled="true" class="form-control" name="direccion" id="direccion" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <hr>
                    <fieldset>
                    <legend style="font-weight: bold; font-size: 17px;" >Datos Factura</legend>
                    <hr>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Productos</label>
                            <select name="Cli_codigo" id="Cli_codigo" class="form-control" onchange="showProduc(this.value)">
                              <option value="1010101" >LLantas</option>
                              <option value="1010110" >Refri</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-bordered table-hover" id="invoiceItem">	
                                <tr>
                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                    <th width="15%">Prod. No</th>
                                    <th width="38%">Nombre Producto</th>
                                    <th width="15%">Cantidad</th>
                                    <th width="15%">Precio</th>								
                                    <th width="15%">Total</th>
                                </tr>							
                                <tr>
                                    <td><input class="itemRow" type="checkbox"></td>
                                    <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                                    <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
                                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                    <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                    <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                </tr>						
                            </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <table>
                            <tr>
                              <td><button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button></td>
                              <td><button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button></td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <!-- Aqui va los calculos de la Factura -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Subtotal:</label>
                            <input type="number" disabled="true" class="form-control" name="subTotal" id="subTotal" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Tasa Impuesto:</label>
                            <input type="number" class="form-control" name="taxRate" id="taxRate" Value="12" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Monto Inpuesto:</label>
                            <input type="number" disabled="true" class="form-control" name="taxAmount" id="taxAmount" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Total:</label>
                            <input type="number" disabled="True" class="form-control" name="totalAftertax" id="totalAftertax" >
                          </div>
                        </div>
                      </div>
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