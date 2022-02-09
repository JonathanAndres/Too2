<?= require('../templates/Header.php'); ?>
<?= require('../templates/Menu.php'); 
require ('../Controller/DBA/function.dba.php');
require ('../Controller/DBA/conexionDBA.php');
$cuidad = 0;?>

<div class="main-panel">
  <?= require('../templates/nav.php'); ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">REPORTES</h4>
              <p class="card-category">Información de cada reporte</p>
            </div>
            <div class="card-body">


              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th style='text-align: center;'>
                      Reporte
                    </th>
                    <th style='text-align: center;'>
                      Decripcion
                    </th>
                    <th style='text-align: center;'>
                      Especificos
                    </th>
                    <th style='text-align: center;'>
                      Opciones
                    </th>
                  </thead>
                  <tbody>
                    <?php //dtgrd("personaVIEW",$mysqli); 
                    ?>
                    <?php /*$query = $mysqli -> query("Select * From Factura_Table");
                            while($row = mysqli_fetch_array($query))
                            {*/ ?>

                    <tr>
                      <td style='text-align: center;'>
                        <label for="">CLIENTES</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del primer reporte</label>
                      </td>
                      <td></td>
                      <td style='text-align: center;'>
                        <a href='javascript:window.open("../report/report.clientes.php?id=<?php //echo $row[0] ?>","","width=500,height=500")'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                      </td>
                    </tr>
                    <tr>
                      <td style='text-align: center;'>
                        <label for="">PRODUCTOS</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del segundo reporte</label>
                      </td>
                      <td></td>
                      <td style='text-align: center;'>
                        <a href='javascript:window.open("../report/report.productos.php?id=<?php //echo $row[0]  ?>","","width=500,height=500")'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                      </td>
                    </tr>
                    <tr>
                      <td style='text-align: center;'>
                        <label for="">FACTURAS</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del tercer reporte</label>
                      </td>
                      <td></td>
                      <td style='text-align: center;'>
                        <a href='javascript:window.open("../report/report.facturas.php?id=<?php //echo $row[0] ?>","","width=500,height=500")'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                      </td>
                    </tr>
                    <tr>
                      <td style='text-align: center;'>
                        <label for="">CLIENTE ESPECIFICO</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del cuarto reporte</label>
                      </td>
                      <td style='text-align: center;'>
                        <select name="Cli_codigo" id="Cli_codigo" class="form-control" onchange="clienteCBx(this.value)">
                          <?php cbx(["id","Nombre","cliente_cbx"],$mysqli);?>
                        </select>
                      </td>
                      <td style='text-align: center;'>
                        <a href='#'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                    </tr>
                    <tr>
                      <td style='text-align: center;'>
                        <label for="">PRODUCTO EN ESPECIFICO</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del sexto reporte</label>
                      </td>
                      <td style='text-align: center;'>
                        <select name="Cli_codigo" id="Cli_codigo" class="form-control" onchange="productoCBx(this.value)">
                          <?php cbx(["id","NombreProducto","producto"],$mysqli);?>
                        </select>
                      </td>
                      <td style='text-align: center;'>
                        <a href='#'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                      </td>
                    </tr>
                    <tr>
                      <td style='text-align: center;'>
                        <label for="">DIRECCIÓN</label>
                        <?php //echo $row[1] 
                        ?>
                      </td>
                      <td style='text-align: center;'>
                        <label for="">Descripción del octavo reporte</label>
                      </td>
                      <td style='text-align: center;'>
                        <select name="cuidad" id="cuidad" class="form-control" onchange="envioCBx(this.value)"  >
                          <?php cbx2(["Direccion","DISTINCT_Cuidad"],$mysqli);?>
                        </select>
                      </td>
                      <td style='text-align: center;'>
                        <a href='#'> <img src='../assets/img/icons/imprimir.png' width='25' /> </a>
                    </tr>
                    <?php //} 
                    ?>
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
  <?= require('../templates/footer_pg.php'); ?>
</div>
<?= require('../templates/Footer.php'); ?>