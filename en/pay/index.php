<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="pagos";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="desciption" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content=""/>
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../assets/icons/css/all.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/filtros.js"></script>
  <link href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5 pb-4">
    <div class="row px-4 mt-3">
      <!-- Navbar -->
      <?php // include '../common/navbar.php'; ?>
      <div class="row">
          <div class="col-12 col-md-8">
            <div class="row">
              <div class ="col-12 text-center pb-2 px-0">
                <h4 class="text-primary"><strong>ONLINE PAYMENT ENTRY</strong></h4>
              </div>
            </div>
            <div class="row px-5">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-danger input_search text-white"><i class="fas fa-user mx-2"></i></span>
                </div>
                <input class="form-control" type="text" name="" value="" placeholder="User">
              </div>
            </div>
            <div class="row px-5">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-danger input_search text-white"><i class="fas fa-key mx-2"></i></span>
                </div>
                <input class="form-control" type="password" name="" value="" placeholder="Password">
              </div>
            </div>
            <div class="row mb-4 px-5">
              <div class="col-12 px-0">
                <button class="btn btn-primary px-4 input_search" type="button"><b>Login</b></button>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="row px-4 bg-primary m-2">
              <div class="col-12 my-3 pl-2">
                <h class="text-light h5"><strong>INFORMATION</strong></h6>
              </div>
              <div class="col-12 mb-5 pl-5 text-justify">
                <span class='text-light' style="font-family: 'Roboto Condensed', sans-serif;">Online payments allows you to <b class="">view </b>the history of your <b class="">transactional documents</b>.</span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- whatsapp -->
  <div class="whatsapp_div">
    <a href="https://wa.me/17867029996?texto=Buen%20dia" target="_blank">
      <img class="whatsapp_image" src="../../imagen/whatsapp.png" alt="whatsapp Button">
    </a>
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
