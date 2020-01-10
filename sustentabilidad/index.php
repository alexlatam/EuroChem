<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
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
  <link rel="stylesheet" href="../assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"-->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php $section="sustentabilidad";?>
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <!-- Seccion de Video -->
  <section class="container px-5 my-5">
    <div class="row px-4">
      <div class="col-12 col-md-6">
        <div class="row mt-3">
          <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">Nuestra compañía</h2>
        </div>
        <div class="row text-muted">
          Conquimica S.A. es una compañía colombiana con 40 años de experiencia en la comercialización de materias primas para diversos sectores productivos en el país: recubrimientos, aseo, plásticos, ingredientes para la industria de alimentos y bebidas, agro, adhesivos y pegantes, textil, farma, cosméticos, petróleos, fabricación de intermediarios químicos, entre otros.
        </div>
        <div class="row justify-content-center mt-5 mb-4">
          <a class="btn btn-primary px-5" href="#">Ver Más</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <iframe width="100%" height="250vh" src="https://www.youtube.com/embed/ZOV-7f3aofM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
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
  <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
