<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include 'common/conexion.php';
include 'common/datosGenerales.php';
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
  <link rel="icon" type="image/jpg" sizes="16x16" href="admin/img/<?php echo $imageLogo;?>">
  <link rel="stylesheet" href="assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"-->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include 'common/menu.php'; include 'common/2domenu.php';?>
  <!--Colores #cc0033 #000066 -->
  <!--Corousel Library-->
  <div class="owl-carousel owl-theme" id="carousel">
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal1-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal1.jpg" alt=""></div>
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal3-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal3.jpg" alt=""></div>
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal2-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal2.jpg" alt=""></div>
  </div>
  <script>
    $('#carousel').owlCarousel({
      loop:true,
      dots:true,
      mouseDrag: false,
      //movimiento del carousel
      autoplay:true,
      autoplayHoverPause:true,
      autoplayTimeout:4000,
      smartSpeed:1000,
      margin:0,
      responsive:{
        0:{items:3},
        600:{items:1}
      }
    })
  </script>
  <!-- Seccion de buscar productos y facebook -->
  <section class="container-fluid mt-4 pt-3 pb-4 bg-euro">
    <div class="container py-4 px-5">
      <div class="row pb-4 px-4">
        <input class="col-auto search_productos_home" type="search" name="" value="" placeholder="Buscar productos...">
        <span class="col-auto ml-auto">
          <a href="#">
            <img src="imagen/facebook.png" width="25px" alt="">
          </a>
        </span>
      </div>
    </div>
  </section>
  <!-- Imagenes de productos -->
  <section class="container my-5 px-5 pb-4">
    <div class="row px-4">
      <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">Divisiones de productos</h2>
    </div>
    <div class="row px-4">
      <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Contamos con cuatro divisiones de negocio con las cuales atendemos a los principales sectores de la industria</p>
    </div>
    <div class="row px-4 mt-3">
      <div class="col-3">
        <a class="imagen_divisiones_home" href="#">
          <img src="imagen/division_alimentos.png" alt="">
        </a>
      </div>
      <div class="col-3">
        <a class="imagen_divisiones_home" href="#">
          <img src="imagen/division_especializadas.png" alt="">
        </a>
      </div>
      <div class="col-3">
        <a class="imagen_divisiones_home" href="#">
          <img src="imagen/division_genericos.png" alt="">
        </a>
      </div>
      <div class="col-3">
        <a class="imagen_divisiones_home" href="#">
          <img src="imagen/division_plasticos.png" alt="">
        </a>
      </div>
    </div>
  </section>
  <!-- Imagenes de categorias -->
  <section class="container-fluid mt-5 bg-euro">
    <div class="container pt-5 pb-3 px-5">
      <div class="row mt-3 px-4">
        <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">Industrias</h2>
      </div>
    </div>
  </section>
  <!-- Seccion de Video -->
  <section class="container px-5 my-5">
    <div class="row px-4">
      <div class="col-6">
        <div class="row mt-3">
          <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">Nuestra compañía</h2>
        </div>
        <div class="row text-muted">
          Conquimica S.A. es una compañía colombiana con 40 años de experiencia en la comercialización de materias primas para diversos sectores productivos en el país: recubrimientos, aseo, plásticos, ingredientes para la industria de alimentos y bebidas, agro, adhesivos y pegantes, textil, farma, cosméticos, petróleos, fabricación de intermediarios químicos, entre otros.
        </div>
        <div class="row justify-content-center mt-5">
          <a class="btn btn-primary px-5" href="#">Ver Más</a>
        </div>
      </div>
      <div class="col-6">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ZOV-7f3aofM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
  <!-- Seccion Prodcuto del mes -->
  <section class="container px-5 mb-5">
    <div class="row px-4">
      <div class="col-8">
        <div class="row">
          <h2 class="titulos">Producto del mes</h2>
        </div>
        <div class="row mt-4">
          <img src="imagen/producto_del_mes.jpg" alt="" width="90%">
        </div>
      </div>
      <div class="col-4">
        <div class="row justify-content-center">
          <h2 class="titulos">Portal Empresarial</h2>
        </div>
        <div class="row contenedor_pagos mt-4 justify-content-center align-items-center">
          <div class="text-white px-5 text-center text_pagos_home mt-3">
            Ahora puedes realizar tus pagos por internet de forma ágil, fácil y segura.
          </div>
          <div class="text-center">
            <a class="btn btn-secondary px-5 py-2" href="#">Pagar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Seccion Actualidad -->
  <section class="container px-5 mb-5">
    <div class="row px-4">
      <h2 class="titulos">Actualidad</h2>
    </div>
    <div class="row mt-4">
      <div class="col-4" style="padding:0 2%;">
        <div class="row" style="background-color:#f7f7f7;">
          <div class="container-img-blog">
            <a class="d-flex" href="#">
              <div class="imagen-blog">
                <img class="img-blog" src="imagen/blog1.jpg">
              </div>
            </a>
          </div>
        </div>
        <div class="row px-2" style="background-color:#f7f7f7;">
          <h4 class="titulos_blog pt-3">Un Aporte De Conquimica a la Economía Circular Desde la Eficiencia</h4>
        </div>
        <div class="row text-muted px-2" style="background-color:#f7f7f7;">
          <p>Con el objetivo de fomentar la economía circular, impulsar el aprovechamiento de los envases y empaques que circulan en el mercado, el Ministerio de Ambiente y Desarrollo Sostenible  Mediante la Resolución 1407 de 2018 reglamentó la gestión ambiental de los residuos de envases y empaques de papel, cartón, plástico, vidrio y metal. </p>
        </div>
        <div class="row px-2 pb-4" style="background-color:#f7f7f7;">
          <a class="btn btn-primary px-4" href="#">Leer más</a>
        </div>
      </div>
      <div class="col-4" style="padding:0 2%;">
        <div class="row" style="background-color:#f7f7f7;">
          <div class="container-img-blog">
            <a class="d-flex" href="#">
              <div class="imagen-blog">
                <img class="img-blog" src="imagen/blog2.jpg">
              </div>
            </a>
          </div>
        </div>
        <div class="row px-2" style="background-color:#f7f7f7;">
          <h4 class="titulos_blog pt-3">
            PUBLICACIÓN DE LOS CONDICIONAMIENTOS DERIVADOS DE LA OPERACIÓN DE INTEGRACIÓN ENTRE BRENNTAG COLOMBIA S.A. Y CONQUIMICA S.A.
          </h4>
        </div>
        <div class="row text-muted px-2" style="background-color:#f7f7f7;">
          <p>
            Entre las partes a saber: de una parte BRENNTAG COLOMBIA S.A. y de otra parte CONQUIMICA S.A. (en adelante las “INTERVINIENTES” –como más adelante se define-) de acuerdo con lo establecido en la resolución N° 83700 del 14 de noviembre de 2018, se permiten comunicar a los interesados los condicionamientos derivados de la operación de
          </p>
        </div>
        <div class="row px-2 pb-4" style="background-color:#f7f7f7;">
          <a class="btn btn-primary px-4" href="#">Leer más</a>
        </div>
      </div>
      <div class="col-4" style="padding:0 2%;">
        <div class="row" style="background-color:#f7f7f7;">
          <div class="container-img-blog">
            <a class="d-flex" href="#">
              <div class="imagen-blog">
                <img class="img-blog" src="imagen/blog3.jpg">
              </div>
            </a>
          </div>
        </div>
        <div class="row px-2" style="background-color:#f7f7f7;">
          <h4 class="titulos_blog pt-3">
            Aditivos Para La Industria De Recubrimientos
          </h4>
        </div>
        <div class="row text-muted px-2" style="background-color:#f7f7f7;">
          <p>
            Para CONQUIMICA la industria de recubrimientos siempre ha sido uno de sus sectores foco de crecimiento y presencia, es por esto que con gran alegría nos permitimos informar que continuaremos ofreciendo al mercado los aditivos para recubrimientos de la mano de un nuevo aliado, ADD Additives.
          </p>
        </div>
        <div class="row px-2 pb-4" style="background-color:#f7f7f7;">
          <a class="btn btn-primary px-4" href="#">Leer más</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Carousel Clientes -->
  <section class="container-fluid bg-euro mt-4">
    <div class="container px-5 py-5">
      <div class="row px-4 align-items-center">
        <div class="owl-carousel owl-theme" id="carouselclients">
          <div class="img_clients"><img class="img-fluid" src="imagen/client1.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client2.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client3.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client4.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client6.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client7.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client8.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client9.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="imagen/client10.png" alt=""></div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#carouselclients').owlCarousel({
      loop:true,
      dots:false,
      nav:true,
      center:true,
      mouseDrag: false,
      autoplay:true,
      autoplayHoverPause:true,
      autoplayTimeout:4000,
      smartSpeed:1000,
      margin:0,
      responsive:{
        0:{items:3},
        600:{items:5}
      }
    })
  </script>
  <?php// include 'common/footer.php';?>
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
  <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
