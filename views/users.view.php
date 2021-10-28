<?= require ('../templates/Header.php'); ?>
<?= require ('../templates/Menu.php'); ?> 
<?= require ('../Controller/controllers.views/users.controller.php'); ?>  

    
    <div class="main-panel">
    <?= require ('../templates/nav.php'); ?>
    
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Usuarios</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body"> 
                <button class="btn btn-primary pull-left" onclick='window.open("./registro.view.php","","width=500,height=500")'>
                  registro
                </button>
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Ruc
                        </th>
                        <th>
                          Nombre
                        </th>
                        <th>
                          Cuidad
                        </th>
                        <th>
                          Direccion
                        </th>
                        <th>
                          Telefono
                        </th>
                        <th>
                          Opciones
                        </th>
                      </thead>
                      <tbody>
                        <?= dtgrd("empresa",$mysqli); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="col-md-4">
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
            </div>-->
          </div>
        </div>
      </div>
      <?= require ('../templates/footer_pg.php'); ?>
    </div>
<?= require ('../templates/Footer.php'); ?>