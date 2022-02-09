<?= require ('../templates/Header.php'); ?>
<?= require ('../templates/Menu.php');
require("../Controller/DBA/conexionDBA.php"); ?>


    <div class="main-panel">
    <?= require ('../templates/nav.php'); ?> 
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">FACTURAS</h4>
                  <p class="card-category">Informe Facturación</p>
                </div>
                <div class="card-body"> 
                  <button class="btn btn-primary pull-left" onclick='window.open("./newQuotation.view.php","","width=800,height=600")'>
                    Nueva Factura 
                  </button>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th style='text-align: center;'>
                          Num. Factura
                        </th>
                        <th style='text-align: center;'>
                          Cliente
                        </th>
                        <th style='text-align: center;'>
                          Fecha
                        </th>
                        <th style='text-align: center;'>
                          Total Venta
                        </th>
                        <th style='text-align: center;'>
                          Opciones
                        </th>
                      </thead>
                      <tbody>
                        <?php //dtgrd("personaVIEW",$mysqli); ?>
                        <?php $query = $mysqli -> query("Select * From Factura_Table");
                            while($row = mysqli_fetch_array($query))
                            { ?>

                        <tr>
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
                           <a href='javascript:window.open("../report/prueba.php?id=<?php echo $row[1] ?>","","width=500,height=500")'> <img src='../assets/img/icons/imprimir.png' width='25'  /> </a>
                           <!-- <a href='javascript:window.open("../views/registroPerson.view.php?id=<?php //echo $row[0] ?>","","width=500,height=500")'> <img src='../assets/img/icons/edit.png' width='25'  /> </a> -->
                           <a href='javascript:window.open("../views/registroPerson.view.php?id=<?php echo $row[0] ?>","","width=500,height=500")'> <img src='../assets/img/icons/delete.png' width='25'  /> </a>
                        </td>
                        </tr>          

                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Partner Fundation</h6>
                  <h4 class="card-title">Andres</h4>
                  <p class="card-description">
                    First System bussines Too2, bussines dedicate to develop system for 
                    all people, mission is cripto-system whit wallet.
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <?= require ('../templates/footer_pg.php'); ?>
    </div>
<?= require ('../templates/Footer.php'); ?>