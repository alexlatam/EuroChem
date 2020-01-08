<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $root_folder;?>/index.php">
      <img class="" width="30px" src="">
      EuroChem
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <?php if(isset($_GET['genero']) && $_GET['genero']==1){ ?>
            <a class="nav-link active" href="<?php echo $root_folder;?>/vitrina/index.php?genero=1">Damas</a>
          <?php }else{ ?>
            <a class="nav-link" href="<?php echo $root_folder;?>/vitrina/index.php?genero=1">Damas</a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <?php if(isset($_GET['genero']) && $_GET['genero']==2){ ?>
            <a class="nav-link active" href="<?php echo $root_folder;?>/vitrina/index.php?genero=2">Caballeros</a>
          <?php }else{ ?>
            <a class="nav-link" href="<?php echo $root_folder;?>/vitrina/index.php?genero=2">Caballeros</a>
          <?php } ?>
        </li>
        <li class="nav-item ml-4">
          <form class="d-none d-lg-inline-block" action="<?php echo $root_folder;?>/vitrina/index.php" method="get">
            <?php if(isset($_GET['busqueda'])){ ?>
              <input class="search-principal" type="search" name="busqueda" placeholder="Buscar..." value="<?php echo $_GET['busqueda'];?>">
            <?php }else{ ?>
              <input class="search-principal" type="search" name="busqueda" placeholder="Buscar...">
            <?php } ?>
            <button class="search-button" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15"><path fill="#a5a5a5"d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
            </button>
          </form>
        </li>
    </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php if(isset($_SESSION['NAME_USER'])){
            $user=$_SESSION['NAME_USER'];
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $user;?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo $root_folder;?>/perfil/">Mi Cuenta</a>
              <a class="dropdown-item" href="<?php echo $root_folder;?>/perfil/compras.php">Mis compras</a>
              <span class="dropdown-item">
                <form action="<?php echo $root_folder;?>/login/index.php" method="post">
                  <input type="hidden" name="out" value="1">
                  <button class="btn btn-link text-dark p-0" type="submit" name="button" style="text-decoration:none;">Salir</button>
                </form>
              </span>
            </div>
            <?php }else{ ?>
            <a class="text-white" href="<?php echo $root_folder;?>/login/">
              Entrar
            </a>
            <?php } ?>
      </li>
      </ul>
      <span class="ml-auto pt-2">
        <a href="<?php echo $root_folder;?>/carrito/index.php">
          <?php if(isset($_SESSION['carrito'])){ ?>
            <span style="position:relative;">
              <svg class='svg-light' width="23px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"/>
                <span class="car_red"></span>
              </svg>
            </span>
          <?php }else{ ?>
            <svg class='svg-light' width="23px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"/></svg>
          <?php } ?>
        </a>
      </span>
    </div>
  </div>
</nav>
