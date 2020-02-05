<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="certificaciones";
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
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5">
    <div class="row px-4 mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-md-3 mt-2">
        <div class="row">
          <div class="col-12">
            <h2 class="titulos_blog lead">Search</h2>
          </div>
          <div class="col-12">
            <input type="search" name="" value="" placeholder="Search products...">
            <button type="button" name="button">Search</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisions</h2>
          </div>
          <div class="col-12 mt-2 mb-1">
            <a class="enlace_menu_lateral" href="">Food</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Specialty</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Commodities</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Plastics</a>
            <hr class="my-0">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="row">
          <div class="col-12 col-lg-6 mt-3">
            <img src="/imagen/certificacion.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 mt-3">
            <p class="text-muted">
              The elements of our valuable offer concur with the continuous improvement of the different processes that take place in our integral development system.  As a result of our proactivity with which we have focused on development, we have earned the ISO development system certificates 9001: 2008, OHSAS 18001: 2007 and ISO 14001:2004.
            </p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12 col-lg-6">
            <h4 class="text-muted"><strong>Política de Gestión Integral</strong></h4>
            <p class="text-muted">
              EuroChem S.A.
              is a company that offers trustworthy solutions to supply chemical products, which establishes its commitment to integral development by means of: <br>
              1. Continuously improve the processes in order to sustainably develop the organization <br> <br>
              2. Supply products and provide services that meet with the agreements established with suppliers and clients. <br> <br>
              3. Develop and control the processes in order to care for the environment and the health and safety of our personnel.<br> <br>
              4. Comply with the applicable legal prerequisites and regulations.<br> <br>
              5. Train our personnel with the goal of maintaining a competent staff in order to reach our objectives<br> <br>

              NOTE: Sustainable development is the equilibrium between social, economic and environmental areas
            </p>
          </div>
          <div class="col-12 col-lg-6">
            <img src="/imagen/certificacion2.jpg" alt="">
          </div>
        </div>
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
  <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>