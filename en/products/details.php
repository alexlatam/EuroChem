<?php
session_start();
include '../common/conexion.php';
//divisiones
$sql="SELECT * FROM DIVISIONES";
$id_divisiones=array();
$divisiones=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_divisiones,$row['ID']);
    array_push($divisiones,$row['DIVISION']);
  }
}
//presentaciones
$sql="SELECT * FROM PRESENTACIONES";
$id_presentaciones=array();
$presentaciones=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_presentaciones,$row['ID']);
    array_push($presentaciones,$row['PRESENTACION']);
  }
}
//Unidades
$sql="SELECT * FROM UNIDADES";
$id_unidades=array();
$unidades=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_unidades,$row['ID']);
    array_push($unidades,$row['UNIDAD']);
  }
}
//tipos de productos
$sql="SELECT * FROM TIPO_PRODUCTOS";
$id_productos=array();
$productos=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_productos,$row['ID']);
    array_push($productos,$row['TIPO_PRODUCTO']);
  }
}
$section="productos";
if (isset($_GET['id_prod'])) {
  $id_producto=$_GET['id_prod'];
  $sql="SELECT * FROM PRODUCTOS WHERE ID=$id_producto";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $titulo=$row['TITULO'];
      $subtitulo=$row['SUBTITULO'];
      $descripcion=$row['DESCRIPCION'];
      $sku=$row['SKU'];
      $id_division=$row['IDDIVISION'];
      $key=array_search($id_division,$id_divisiones);
      $division=$divisiones[$key];
      $id_presentacion=$row['IDPRESENTACION'];
      $key=array_search($id_presentacion,$id_presentaciones);
      $presentacion=$presentaciones[$key];
      $id_unidad=$row['IDUNIDAD'];
      $key=array_search($id_unidad,$id_unidades);
      $unidad=$unidades[$key];
      $id_tipo_producto=$row['IDTIPOPRODUCTO'];
      $key=array_search($id_tipo_producto,$id_productos);
      $tipo_producto=$productos[$key];
    }
  }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="desciption" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content=""/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/">
  <link rel="stylesheet" href="../../assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5 pb-4">
    <div class="row mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-sm-3 mt-2">
      </div>
      <div class="col-12 col-sm-9">
        <div class="row">
          <h2 class="titulos"><a href="/en/products/details.php?id_prod=<?php echo $id_producto;?>"><?php echo $titulo;?></a></h2>
        </div>
        <div class="row">
          <div class="col-4">
            <img src="" alt="">
          </div>
          <div class="col-8">
            <div class="row">
              <span class="text-muted"><?php echo $subtitulo;?></span>
            </div>
            <div class="row align-items-center">
              <small>SKU: <?php echo $sku;?></small>&nbsp;
              <small>Category: <a href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a></small>&nbsp;
              <small>Tag:<a href="/es/productos/index.php?id_tipo=<?php echo $id_tipo_producto;?>"> <?php echo $tipo_producto;?></a></small>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Additional Information</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="container d-block">
                <div class="row mt-2">
                  <h2 class="titulos">Description</h2>
                </div>
                <div class="row text-muted">
                  <?php echo $descripcion;?>
                </div>
                <div class="row mt-3">
                  <a href="#">See tecnic data</a>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="container">
                <div class="row mt-2">
                  <h2 class="titulos">Additional Information</h2>
                </div>
                <div class="row">
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-3">
                    <small><strong>Industries</strong></small>
                  </div>
                  <div class="col-9">
                    <?php
                    $sql="SELECT i.ID,i.INDUSTRIA FROM INDUSTRIAS i INNER JOIN (SELECT pi.IDINDUSTRIA FROM PRODUCTOS_INDUSTRIAS pi WHERE pi.IDPRODUCTO=$id_producto) aux ON i.ID=aux.IDINDUSTRIA";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                      while($row=$result->fetch_assoc()){
                        $id_industria=$row['ID'];
                        $industria=$row['INDUSTRIA'];
                        ?>
                        <a href="/es/productos/index.php?id_ind=<?php echo $id_industria;?>"><?php echo $industria;?>,</a>
                        <?php
                      }
                    }
                     ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-3">
                    <small><strong>Product type</strong></small>
                  </div>
                  <div class="col-9">
                    <a href="/es/productos/index.php?id_tipo=<?php echo $id_tipo_producto;?>"> <?php echo $tipo_producto;?></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-3">
                    <small><strong>Other Names</strong></small>
                  </div>
                  <div class="col-9">
                    <?php
                    $sql="SELECT o.OTRO_NOMBRE FROM OTROS_NOMBRES o INNER JOIN (SELECT pon.IDOTRONOMBRE FROM PRODUCTOS_OTROS_NOMBRES pon WHERE pon.IDPRODUCTO=$id_producto) aux ON o.ID=aux.IDOTRONOMBRE";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                      while($row=$result->fetch_assoc()){
                        $otro_nombre=$row['OTRO_NOMBRE'];
                        ?>
                        <a href="/en/products/details.php?id_prod=<?php echo $id_producto;?>"><?php echo $otro_nombre;?>,</a>
                        <?php
                      }
                    }
                     ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-3">
                    <small><strong>Metric Units</strong></small>
                  </div>
                  <div class="col-9">
                    <a href="/es/productos/index.php?id_unid=<?php echo $id_unidad;?>"><?php echo $unidad;?></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-3">
                    <small><strong>Presentations</strong></small>
                  </div>
                  <div class="col-9">
                    <a href="/es/productos/index.php?id_pres=<?php echo $id_presentacion;?>"><?php echo $presentacion;?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <hr>
        </div>
        <div class="row">
          <h2 class="titulos">Related Products</h2>
        </div>
          <!-- Listado de productos relacionados-->
          <?php
          $sql="SELECT ID,TITULO,SUBTITULO FROM PRODUCTOS WHERE IDDIVISION=$id_division OR IDTIPOPRODUCTO=$id_tipo_producto ORDER BY Rand() LIMIT 5";
          if($sql!=""){
            $result=$conn->query($sql);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_producto=$row['ID'];
                $titulo=$row['TITULO'];
                $subtitulo=$row['SUBTITULO'];
                ?>
                <div class="row mb-2 align-items-center">
                  <div class="col-12 px-0">
                    <hr class="bg-dark m-0 mb-2">
                  </div>
                  <div class="col-1">
                    <img src="" alt="">
                  </div>
                  <div class="col-2">
                    <a href="/en/products/details.php?id_prod=<?php echo $id_producto;?>"><?php echo $titulo;?></a>
                  </div>
                  <div class="col-7 text-muted">
                    <?php echo $subtitulo;?>
                  </div>
                  <div class="col-1">
                    <div class="row">
                      <small>Category</small>
                    </div>
                    <?php
                    $sqlaux="SELECT IDDIVISION FROM PRODUCTOS WHERE ID=$id_producto";
                    $resultaux=$conn->query($sqlaux);
                    if($resultaux->num_rows>0){
                      while($rowaux=$resultaux->fetch_assoc()){
                        $id_division=$rowaux['IDDIVISION'];
                        $key=array_search($id_division,$id_divisiones);
                        $division=$divisiones[$key];
                        ?>
                        <div class="row">
                          <a href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><small><?php echo $division;?></small></a>
                        </div>
                        <?php
                      }
                    }
                    ?>
                  </div>
                  <div class="col-1">
                    <a class="btn btn-sm btn-primary px-3" href="details.php?id_prod=<?php echo $id_producto;?>">See</a>
                  </div>
                </div>
                <?php
              }
            }
          }
          ?>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../common/footer.php';?>
  <script>
    window.onscroll = function() {
      var scroll=window.scrollY;
      var navbar = document.getElementById("navbar2");
      if(scroll>=400){
        navbar.classList.add("fixed-top");
      }else if (scroll<200) {
        var hasClase2 = navbar.classList.contains( 'fixed-top' );
        if (hasClase2) {
          navbar.classList.remove("fixed-top");
        }
      }
    };
  </script>
  <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
