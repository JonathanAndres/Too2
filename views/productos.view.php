<?= require ('../templates/Header.php'); ?>
<?= require ('../templates/Menu.php'); ?> 
<?= require ('../controller/DBA/conexionDBA.php'); ?> 


    <div class="main-panel">
    <?= require ('../templates/nav.php'); ?>
    
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Productos</h4>
                  <p class="card-category">Ingreso de productos</p>
                </div>
                <div class="card-body"> 
                  <button class="btn btn-primary pull-left" onclick='window.open("./RegistroProducto.view.php ","","width=500,height=500")'>
                    registro
                  </button>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th style='text-align: center;'>
                        id
                        </th>
                        <th style='text-align: center;'>
                          Cod Barras
                        </th>
                        <th style='text-align: center;'>
                          Descripción
                        </th>
                        <th style='text-align: center;'>
                          Nombre del Producto
                        </th>
                        <th style='text-align: center;'>
                          Precio
                        </th>
                        <th style='text-align: center;'>
                          Tipo
                        </th>
                        <th style='text-align: center;'>
                          Estado
                        </th>
                        <th style='text-align: center;'>
                          Cantidad
                        </th>
                        <th style='text-align: center;'>
                          Imagen
                        </th>
                        <th style='text-align: center;'>
                          Opciones
                        </th>
    
                      </thead>
                      <tbody>
                        <?php //dtgrd("personaVIEW",$mysqli); ?>
                        <?php $query = $mysqli -> query("Select * From producto");
                            while($row = mysqli_fetch_array($query))
                            { ?>

                        <tr>
                          <td style='text-align: center;'>
                              <?php echo $row[0] ?>
                          </td>
                          <td style='text-align: center;'>
                              <?php echo $row[1] ?>
                          </td>
                          <td style='text-align: center;'>
                              <?php echo $row[2] ?>
                          </td>
                          <td style='text-align: center;'>
                              <?php echo $row[3] ?>
                          </td>
                          <td style='text-align: center;'>
                              <?php echo $row[4] ?>
                          </td>
                          <td style='text-align: center;'>
                              <?php echo $row[5] ?>
                         
                          </td><td style='text-align: center;'>
                              <?php echo $row[6] ?>
                          </td>
                          </td><td style='text-align: center;'>
                              <?php echo $row[7] ?>
                          </td>
                          </td><td style='text-align: center;'>
                              <img src="<?php echo $row[8] ?>" style="height: 50px;">
                          </td>
                          <td style='text-align: center;'>
                           <a href='javascript:window.open("EditarProducto.view.php?id=<?php echo $row[0] ?>","","width=500,height=500")'> <img  src='../assets/img/icons/edit.png' width='20'  /> </a>
                           <a href='javascript:window.open("../controller/Controllers.views/EliminarProducto.Controller.php?id=<?php echo $row[0] ?>","","width=500,height=500")'> <img  src='../assets/img/icons/delete.png' width='20'  /> </a>
                        </td>
                        </tr>          

                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?= require ('../templates/footer_pg.php'); ?>
    </div>
<?= require ('../templates/Footer.php'); ?>