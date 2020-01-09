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
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal3-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal3.jpg" alt=""></div>
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal2-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal2.jpg" alt=""></div>
    <div class="imagenPpal"><img class="d-block d-sm-none" src="imagen/ppal1-responsive.jpg" alt=""><img class="img-fluid d-none d-sm-block" src="imagen/principal1.jpg" alt=""></div>
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
  <?php// include 'common/footer.php';?>
  <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
