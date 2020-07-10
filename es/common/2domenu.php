<nav class="navbar navbar-expand-lg navbar-light py-0 bg-white" id="navbar2">
  <div class="container my-0 bg-transparent">
    <a class="navbar-brand py-0" href="/index.php">
      <img class="logo_2menu mr-0" src="/imagen/solo_letras.svg" alt="SVG">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-3">
      <li class="nav-item pt-2">
        <a class="nav-link text_menu_2 <?php if($section=="home"){echo "active";} ?> py-4" href="/index.php">Inicio</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="divisiones"){echo "active";} ?>" href="/es/productos/index.php?productos=1">Divisiones</a>
          <div class="dropdown-content">
            <?php
            $sqld="SELECT * FROM DIVISIONES";
            $result=$conn->query($sqld);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_division=$row['ID'];
                $division=$row['DIVISION'];
                ?>
                <a class="text_menu_2" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                <?php
              }
            }
             ?>
          </div>
        </div>
      </li>
      <li class="nav-item px-2 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="industrias"){echo "active";} ?>" href="/es/productos/index.php?industrias=1">Industrias</a>
          <div class="dropdown-content2">
            <ul class="col3">
              <?php
              $sqld="SELECT * FROM INDUSTRIAS";
              $result=$conn->query($sqld);
              if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $id_industria=$row['ID'];
                  $industria=$row['INDUSTRIA'];
                  ?>
                  <li><a class="text_menu_2" href="/es/productos/index.php?id_ind=<?php echo $id_industria;?>"><?php echo $industria;?></a></li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="nuestra_company"){echo "active";} ?>" href="/es/nuestra_compania/index.php">Nuestra compañía</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="pagos"){echo "active";} ?>" href="/es/pagos/index.php">Pagos en línea</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="contacto"){echo "active";} ?>" href="/es/contacto/index.php">Contáctenos</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
