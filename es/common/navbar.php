<div class="col-12 col-md-3 mt-2">
  <div class="row">
    <div class="col-12">
      <h2 class="titulos_blog lead">Búsqueda</h2>
    </div>
    <div class="col-12">
      <form action="/es/productos/index.php" method="get">
        <div class="row">
          <div class="col-12 col-lg-8 px-1 mb-2">
            <input class="form-control" type="search" name="search" placeholder="Buscar productos...">
          </div>
          <div class="col-lg-4 px-1 mb-2">
            <button class="form-control btn btn-primary" type="submit">Buscar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row mt-4 pr-4">
    <div class="col-12">
      <h2 class="titulos_blog lead">Divisiones</h2>
    </div>
    <?php
    $sqld="SELECT * FROM DIVISIONES";
    $result=$conn->query($sqld);
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $id_division=$row['ID'];
        $division=$row['DIVISION'];
        ?>
        <div class="col-12 mt-2 mb-1">
          <a class="enlace_menu_lateral" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
          <hr class="my-0">
        </div>
        <?php
        }
      }
     ?>
  </div>
</div>
