<body class="">
  <div id="modal_container" class="modal-container">
            <div class="modal">
              <h1>Ventana Modal</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque assumenda dignissimos illo explicabo natus quia repellat, praesentium voluptatibus harum ipsam dolorem cumque labore sunt dicta consectetur, nesciunt maiores delectus maxime?
              </p>
              <button id="close">Cerrar</button>
            </div>
  </div>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          <strong>Aqua</strong> Store
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./inicio.view.php">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <!-- "active" sirve para activar visualizacion de estado opcion del menu actual  -->
          <li class="nav-item active ">
            <a class="nav-link" href="../views/clientes.view.php">
              <i class="material-icons">person</i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./guia.view.php">
              <i class="material-icons">content_paste</i>
              <p>Facturar</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./productos.view.php">
              <i class="material-icons">library_books</i>
              <p>Productos</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./inventario.view.php">
              <i class="material-icons">bubble_chart</i>
              <p>Usuarios</p>
            </a>
          </li> -->
          <!--<li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>-->
          <li class="nav-item ">
            <a class="nav-link" href="./Reportes.view.php">
              <i class="material-icons">picture_as_pdf</i>
              <p>Reportes</p>
            </a>
          </li>
          <li class="nav-item active-pro">
            <a class="nav-link" href="./avisos.view.php">
              <i class="material-icons">notifications</i>
              <p>Ayuda</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
            <a class="nav-link" href="./inicio.view.php">
              <i class="material-icons">unarchive</i>
              <p>Ventas Proximamente</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>