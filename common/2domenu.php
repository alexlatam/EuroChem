<nav class="navbar navbar-expand-lg navbar-light bg-white pt-0 navbar_fixed" id="navbar2">
  <div class="container my-0">
    <?php if($section=="home"){ ?>
      <a class="navbar-brand py-0" href="index.php">
        <img src="imagen/logo-conquimica.png" class="d-inline-block align-top" alt="">
      </a>
    <?php }else{ ?>
      <a class="navbar-brand py-0" href="../index.php">
        <img src="../imagen/logo-conquimica.png" class="d-inline-block align-top" alt="">
      </a>
    <?php } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-3">
      <li class="nav-item pt-2">
        <a class="nav-link text_menu_2 <?php if($section=="home"){echo "active";} ?> py-4" href="<?php if($section!="home"){echo "../";} ?>index.php">Inicio</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="divisiones"){echo "active";} ?>" href="#">Divisiones</a>
          <div class="dropdown-content">
            <a class="text_menu_2" href="#">Alimentos</a>
            <a class="text_menu_2" href="#">Especialidades</a>
            <a class="text_menu_2" href="#">Genéricos</a>
            <a class="text_menu_2" href="#">Plásticos</a>
          </div>
        </div>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="industrias"){echo "active";} ?>" href="#">Industrias</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="nuestra_company"){echo "active";} ?>" href="<?php if($section!="home"){echo "../";} ?>nuestra_compania/index.php">Nuestra compañía</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="pagos"){echo "active";} ?>" href="<?php if($section!="home"){echo "../";} ?>pagos/index.php">Pagos en línea</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="contacto"){echo "active";} ?>" href="#">Contáctenos</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
