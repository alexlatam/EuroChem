<nav class="navbar navbar-expand-lg navbar-light bg-white pt-0 navbar_fixed" id="navbar2">
  <div class="container my-0">
      <a class="navbar-brand py-2" href="/index.php">
        <img src="/imagen/logo_texto.png" alt="" width="100%">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-3">
      <li class="nav-item pt-2">
        <a class="nav-link text_menu_2 <?php if($section=="home"){echo "active";} ?> py-4" href="/index.php">Inicio</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="divisiones"){echo "active";} ?>" href="/es/productos/index.php?productos=1">Divisiones</a>
          <div class="dropdown-content">
            <a class="text_menu_2" href="#">Alimentos</a>
            <a class="text_menu_2" href="#">Especialidades</a>
            <a class="text_menu_2" href="#">Genéricos</a>
            <a class="text_menu_2" href="#">Plásticos</a>
          </div>
        </div>
      </li>
      <li class="nav-item ml-3 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="industrias"){echo "active";} ?>" href="/es/productos/index.php?industrias=1">Industrias</a>
          <div class="dropdown-content2">
            <ul class="col3">
              <li><a class="text_menu_2" href="#">Adhesivos y pegantes</a></li>
              <li><a class="text_menu_2" href="#">Alimentos y bebidas</a></li>
              <li><a class="text_menu_2" href="#">Contrucción y vías</a></li>
              <li><a class="text_menu_2" href="#">Farma y cosmética</a></li>
              <li><a class="text_menu_2" href="#">Ingenios</a></li>
              <li><a class="text_menu_2" href="#">Petróleos</a></li>
              <li><a class="text_menu_2" href="#">Pulpa</a></li>
              <li><a class="text_menu_2" href="#">Textil y prendas</a></li>
              <li><a class="text_menu_2" href="#">Agro</a></li>
              <li><a class="text_menu_2" href="#">Aseo</a></li>
              <li><a class="text_menu_2" href="#">Cuero</a></li>
              <li><a class="text_menu_2" href="#">Impresión</a></li>
              <li><a class="text_menu_2" href="#">Otras industrias</a></li>
              <li><a class="text_menu_2" href="#">Plásticos</a></li>
              <li><a class="text_menu_2" href="#">Recubrimientos</a></li>
              <li><a class="text_menu_2" href="#">Tratamiento de aguas</a></li>
              <li><a class="text_menu_2" href="#">Alimentación animal</a></li>
              <li><a class="text_menu_2" href="#">Comercializadores</a></li>
              <li><a class="text_menu_2" href="#">Espumas</a></li>
              <li><a class="text_menu_2" href="#">Industria Química</a></li>
              <li><a class="text_menu_2" href="#">Papel y cartón</a></li>
              <li><a class="text_menu_2" href="#">Productos de metal</a></li>
              <li><a class="text_menu_2" href="#">Servicios</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="nuestra_company"){echo "active";} ?>" href="/es/nuestra_compania/index.php">Nuestra compañía</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="pagos"){echo "active";} ?>" href="/es/pagos/index.php">Pagos en línea</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="contacto"){echo "active";} ?>" href="/es/contacto/index.php">Contáctenos</a>
      </li>
      <li class="nav-item ml-5 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section==""){echo "active";} ?>" href="/en/index.php">
          <img src="/imagen/usa.png" alt="" width="18px">
        </a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section==""){echo "active";} ?>" href="/index.php">
          <img src="/imagen/vzla.png" alt="" width="18px">
        </a>
      </li>
    </ul>
  </div>
  </div>
</nav>
