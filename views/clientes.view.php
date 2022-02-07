<?= require ('../templates/Header.php'); ?>
<?= require ('../templates/Menu.php'); ?>
<?= require ('../Controller/controllers.views/users.controller.php'); ?>


<div class="main-panel">

    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
            </div>

            <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="input-group no-border">
                        <input type="text" id="valor" name="valor" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon" id="enviar" name="enviar"
                            value="Buscar">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Clientes</h4>
                            <p class="card-category">LIstado de clientes </p>
                        </div>

                        <div class="container">

                            <div class="card-body">
                                <button class="btn btn-primary pull-left"
                                    onclick='window.open("./registroCliente.view.php","","width=500,height=500")'>
                                    registro
                                </button>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th style='text-align: center;'>
                                                Id
                                            </th>
                                            <th style='text-align: center;'>
                                                Cedula
                                            </th>
                                            <th style='text-align: center;'>
                                                Nombre
                                            </th>
                                            <th style='text-align: center;'>
                                                Apellido
                                            </th>
                                            <th style='text-align: center;'>
                                                Opciones
                                            </th>
                                        </thead>
                                        <tbody>



                                            <?php

$where = "";

if(!empty($_POST))
{
  $valor = $_POST['valor'];
  if(!empty($valor)){
    $where = "WHERE Nombre LIKE '$valor%'";
   
  }
}
$sql = "SELECT * FROM cliente $where";
$query = $mysqli->query($sql);
                                            
                                                                            
                                          
                            while($row = mysqli_fetch_array($query))
                            { ?>

                                            <tr>
                                                <td style='text-align: center;'>
                                                    <?php echo $row['id'] ?>
                                                </td>
                                                <td style='text-align: center;'>
                                                    <?php echo $row['Cedula'] ?>
                                                </td>
                                                <td style='text-align: center;'>
                                                    <?php echo $row['Nombre'] ?>
                                                </td>
                                                <td style='text-align: center;'>
                                                    <?php echo $row['Apellido'] ?>
                                                </td>
                                                <td style='text-align: center;'>
                                                    <a
                                                        href='../views/modificarCliente.view.php?id=<?php echo $row['id'] ?>'>
                                                        <img src='../assets/img/icons/edit.png' width='20' /> </a>
                                                    <a href='../Controller/controllers.views/eliminarCliente.controller.php?id=<?php echo $row['id'] ?>'
                                                        onclick="return Confirmation()"> <img
                                                            src='../assets/img/icons/delete.png' width='20' /> </a>

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
    </div>

    <?= require ('../templates/Footer.php'); ?>