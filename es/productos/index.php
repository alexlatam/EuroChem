<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
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
$section="productos";
if(isset($_GET['productos'])){
  $producto=$_GET['productos'];
}else if(isset($_GET['industrias'])){
  $industrias=$_GET['industrias'];
}
$sql_ppal="";
if(isset($_GET['id_div'])){
  $id_division_get=$_GET['id_div'];
  $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDDIVISION=$id_division_get ";
  if(isset($_GET['id_ind'])){
    $id_industria_get=$_GET['id_ind'];
    $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p INNER JOIN PRODUCTOS_INDUSTRIAS i ON p.ID=i.IDPRODUCTO WHERE p.IDDIVISION=$id_division_get AND i.IDINDUSTRIA=$id_industria_get ";
  }
}
if(isset($_GET['id_ind'])){
  $id_industria_get=$_GET['id_ind'];
  if($sql_ppal==""){
    $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p INNER JOIN PRODUCTOS_INDUSTRIAS i ON p.ID=i.IDPRODUCTO WHERE i.IDINDUSTRIA=$id_industria_get ";
  }
}
if(isset($_GET['id_tipo']) && $sql_ppal!=""){
  $id_tipo_producto_get=$_GET['id_tipo'];
  $sql_ppal.="AND p.IDTIPOPRODUCTO=$id_tipo_producto_get";
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
        <div class="row pr-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Búsqueda</h2>
          </div>
          <div class="col-12">
            <input type="search" name="" value="" placeholder="Buscar productos...">
            <button type="button" name="button">Buscar</button>
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
                if($id_division_get==$id_division){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active">
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1">
                    <a class="enlace_menu_lateral" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }
              }
            }
           ?>
        </div>
        <?php if (isset($_GET['id_div']) || isset($_GET['id_ind'])): ?>
        <div class="row mt-4 pr-4">
            <div class="col-12">
              <h2 class="titulos_blog lead">Tipo de productos</h2>
            </div>
            <?php
            $sqld="SELECT * FROM TIPO_PRODUCTOS";
            $result=$conn->query($sqld);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_tipo_producto=$row['ID'];
                $tipo_producto=$row['TIPO_PRODUCTO'];
                $complemento_enlace="?id_tipo=$id_tipo_producto";
                if(isset($_GET['id_div'])){
                  $complemento_enlace.="&id_div=$id_division_get";
                }
                if(isset($_GET['id_ind'])){
                  $complemento_enlace.="&id_ind=$id_industria_get";
                }
                if($id_tipo_producto_get==$id_tipo_producto){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active">
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $tipo_producto;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1">
                    <a class="enlace_menu_lateral" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $tipo_producto;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }
              }
            }
            ?>
        </div>
        <div class="row mt-4 pr-4">
            <div class="col-12">
              <h2 class="titulos_blog lead">Industrias</h2>
            </div>
            <?php
            $sqld="SELECT * FROM INDUSTRIAS";
            $result=$conn->query($sqld);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_industria=$row['ID'];
                $industria=$row['INDUSTRIA'];
                $complemento_enlace="?id_ind=$id_industria";
                if(isset($_GET['id_div'])){
                  $complemento_enlace.="&id_div=$id_division_get";
                }
                if(isset($_GET['id_tipo'])){
                  $complemento_enlace.="&id_tipo=$id_tipo_producto_get";
                }
                if($id_industria_get==$id_industria){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active">
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $industria;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1">
                    <a class="enlace_menu_lateral" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $industria;?></a>
                    <hr class="my-0">
                  </div>
                  <?php
                }
              }
            }
            ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-sm-9">
        <?php echo $sql_ppal; ?>
        <!-- Divisiones e industrias imagenes -->
        <?php if(isset($producto) && $producto==1){ ?>
          <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="/es/productos/index.php?id_div=1">
                <img src="/imagen/divisiones/alimentos.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="/es/productos/index.php?id_div=2">
                <img src="/imagen/divisiones/especialidades.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="/es/productos/index.php?id_div=3">
                <img src="/imagen/divisiones/genericos.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="/es/productos/index.php?id_div=4">
                <img src="/imagen/divisiones/plasticos.png" alt="" width="100%">
              </a>
            </div>
          </div>
        <?php }else if(isset($industrias) && $industrias==1){ ?>
          <div class="row justify-content-center align-items-center mt-2">
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/comercializadores.jpg" alt="">
                <div class="div_text_industria">
                  <div class="text_span text-white">Alimentos y bebidas</div>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/recubrimientos.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Recubrimientos</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/comercializadores.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Comercializadores</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/aseo.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Aseo</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/telas.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Textil y prendas</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/industria.jpg" alt="">
                <div class="div_text_industria">
                  <div class="text_span text-white">Industria Química</div>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/plasticos.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Plasticos</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/adhesivos.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Adhesivos y pegantes</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/impresion.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Impresión</span>
                </div>
              </div>
            </a>
            <a class="enlace_img_industrias mx-1" href="#">
              <div class="contenedor_img_industrias mt-3">
                <img class="img_industrias" src="/imagen/industrias/petroleos.jpg" alt="">
                <div class="div_text_industria">
                  <span class="text_span text-white">Petróleos</span>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
        <!-- Listado de productos-->
        <?php
        if($sql_ppal!=""){
          $result=$conn->query($sql_ppal);
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
                  <a href="#"><?php echo $titulo;?></a>
                </div>
                <div class="col-7 text-muted">
                  <?php echo $subtitulo;?>
                </div>
                <div class="col-1">
                  <div class="row">
                    <small>Categoria</small>
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
                  <a class="btn btn-sm btn-primary px-3" href="#">Ver</a>
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
