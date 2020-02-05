<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="productos";
if(isset($_GET['productos'])){
  $producto=$_GET['productos'];
}else if(isset($_GET['industrias'])){
  $industrias=$_GET['industrias'];
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
    <div class="row px-4 mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-sm-3 mt-2">
        <div class="row">
          <div class="col-12">
            <h2 class="titulos_blog lead">Búsqueda</h2>
          </div>
          <div class="col-12">
            <input type="search" name="" value="" placeholder="Buscar productos...">
            <button type="button" name="button">Buscar</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisiones</h2>
          </div>
          <div class="col-12 mt-2 mb-1">
            <a class="enlace_menu_lateral" href="">Alimentos</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Especialidades</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Genericos</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Plásticos</a>
            <hr class="my-0">
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-9">
        <!-- Productos -->
        <?php if(isset($producto) && $producto==1){ ?>
          <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="#">
                <img src="/imagen/divisiones/alimentos.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="#">
                <img src="/imagen/divisiones/especialidades.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="#">
                <img src="/imagen/divisiones/genericos.png" alt="" width="100%">
              </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
              <a class="imagen_divisiones_home" href="#">
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
