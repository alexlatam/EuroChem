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
if(isset($_GET['id_tipo'])){
  $id_tipo_producto_get=$_GET['id_tipo'];
  if($sql_ppal!=""){
    $sql_ppal.="AND p.IDTIPOPRODUCTO=$id_tipo_producto_get";
  }else{
    $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDTIPOPRODUCTO=$id_tipo_producto_get";
  }
}
if(isset($_GET['id_unid'])){
  $id_unidad_get=$_GET['id_unid'];
  $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDUNIDAD=$id_unidad_get";
}elseif (isset($_GET['id_pres'])) {
  $id_presentacion_get=$_GET['id_pres'];
  $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDPRESENTACION=$id_presentacion_get";
}elseif (isset($_GET['search'])){
  $search=$_GET['search'];
  $sql_ppal="SELECT p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.TITULO LIKE '%$search%' OR p.SUBTITULO LIKE '%$search%' OR p.DESCRIPCION LIKE '%$search%'";
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
            <form action="" method="get">
              <input type="search" name="search" placeholder="Buscar productos...">
              <button type="submit">Buscar</button>
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
        <?php if (isset($_GET['id_div']) || isset($_GET['id_ind']) || isset($_GET['id_tipo'])): ?>
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
        <div class="row mb-2">
          <?php if(isset($_GET['id_div']) && $_GET['id_div']=="1"){ ?>
          <p class="text-muted">
            La División de Alimentos de EuroChem está enfocada en la atención de los principales sectores de la industria de Alimentos (Cárnicos, Lácteos, Bebidas, Nutracéuticos, Salsas, etc.) y cuenta con un amplio portafolio de ingredientes dirigidos a la mejora de atributos tales como: textura, conservación, sabor, entre otros. Disponemos de un equipo técnico y comercial especializado para proporcionar soluciones integrales a nuestros clientes en el mejoramiento y desarrollo de sus productos. Nuestra labor se fundamenta en las alianzas estratégicas con prestigiosas casas productoras, las cuales mantienen los más altos estándares de calidad, servicio, innovación y responsabilidad con el consumidor final.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="2"){ ?>
          <p class="text-muted">
            Ofrecemos un portafolio integral de especialidades químicas para múltiples sectores industriales, como recubrimientos, polimerización, formuladores, aseo, plásticos, petróleos, construcción, entre otros. En nuestra extensa gama de productos se destacan pigmentos, resinas, aditivos de formulación para recubrimientos y tensoactivos para variadas aplicaciones. Trabajamos con casas productoras reconocidas por su calidad y tecnología. Contamos con un laboratorio de aplicaciones que nos permite ofrecer acompañamiento en la homologación, uso de nuestros productos y asesoría en el desarrollo de formulaciones.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="3"){ ?>
          <p class="text-muted">
            En esta división de negocios, EuroChem agrupa una amplia oferta de insumos químicos para diversas industrias, con mayor énfasis en recubrimientos, aseo, fabricación de intermediarios químicos, alimentos y bebidas, adhesivos y pegantes, textiles, petróleos, farma, cosméticos, agro, construcción, nutrición animal, cuero y papel. Los productos de esta división se presentan en formas líquidas y sólidas, representan un amplio espectro de la química inorgánica (ácidos, bases, sales, pigmentos, etc.) y de la química orgánica (solventes alifáticos, aromáticos, clorados, alcoholes, cetonas, acetatos, tensoactivos aniónicos y no iónicos, entre otros).
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="4"){ ?>
          <p class="text-muted">
            Proveemos soluciones integrales para la industria del plástico, ofreciendo un amplio portafolio de resinas genéricas y especializadas para la transformación por procesos de inyección, soplado, extrusión y expansión. Contamos con proveedores que son nuestros aliados para llevar a los clientes un producto con altos estándares de calidad, soporte técnico y oportunidad en la entrega.
          </p>
        <?php } ?>
        </div>
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
                  <a href="detalles.php?id_prod=<?php echo $id_producto;?>"><?php echo $titulo;?></a>
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
                  <a class="btn btn-sm btn-primary px-3" href="detalles.php?id_prod=<?php echo $id_producto;?>">Ver</a>
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
