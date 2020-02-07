<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="nuestra_company";
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
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
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
  <div class="container px-5 pb-4">
    <div class="row px-4 mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-md-3 mt-2">
        <div class="row">
          <div class="col-12">
            <h2 class="titulos_blog lead">Search</h2>
          </div>
          <div class="col-12">
            <form action="/en/products/index.php" method="get">
              <input type="search" name="search" placeholder="Search products...">
              <button type="submit">Search</button>
            </form>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisions</h2>
          </div>
          <div class="col-12 mt-2 mb-1">
            <a class="enlace_menu_lateral" href="/en/products/index.php?id_prod=1">Food</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="/en/products/index.php?id_prod=2">Specialty</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="/en/products/index.php?id_prod=3">Commodities</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="/en/products/index.php?id_prod=4">Plastics</a>
            <hr class="my-0">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9 mt-2">
        <div class="row">
          <h2 class="titulos">Our company</h2>
        </div>
        <div class="row mt-4">
          <img src="/imagen/nuestra_compania_conquimica.jpg" alt="" width="100%">
        </div>
        <div class="row mt-4">
          <p class="text-muted text-justify">
            EuroChem S.A. is 100% national company founded in 1977 with the goal to supply raw materials to national industries. Since then, we have grown as a strategic ally of relevant companies in diverse industries, thanks to our complete product portfolio, with the highest standards of quality, service, industrial safety and durable relationships with important national and international suppliers.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Mission</h4>
          <p class="text-muted text-justify">
            Provide trustworthy solutions for the supply of chemical products. <br>
            Trustworthiness: Wide network of national and international suppliers, staff with a vast knowledge of the chemical industry, a safe and state-of-the-art sustem of storage and transportation, compliance with the requierements agreed upon with the client, execution of the processes in light of sustainable development.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Vision</h4>
          <p class="text-muted text-justify">
            To be leaders in the distribution of chemical products in Colombia as an organization recognized for safety and agility in our logistic processes, wide national coverage of our operations, high-quality service and wide product portfolio.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Corporate Values</h4>
        </div>
        <div class="row">
          <p class="text-muted">
            Honesty <br>
            Respect <br>
            Responsibility <br>
            Commitment<br>
            Service
          </p>
        </div>
        <div class="row mt-4">
          <div class="col-12 col-md-6 px-0">
            <h4 class="titulos_blog">Logistics</h4>
            <p class="text-muted text-justify">
              Logistics is fundamental in order to offer a competitive advantage to our clients. We have state-of-the-art infrastructure with an adequate capacity to administrate liquid and solid products in installations specialized in the storage, bottling and packaging operations of chemical chemical products and with a high performance in security, quality and atmosphere. We deliver products to our client’s door, assuring the transport chain and achieving the safety standards of this activity.
            </p>
          </div>
          <div class="col-12 col-md-6">
            <img src="/imagen/nuestra_compania_logistica_conquimica.jpg" alt="" width="100%">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6">
            <img src="/imagen/nuestra_compania_transporte_conquimica.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-md-6 pl-3">
            <h4 class="titulos_blog">Transportation</h4>
            <p class="text-muted text-justify">
              59-vehicle fleet with diverse specifications and categories, tank-trucks, semi-trailer truck and trucks, to fulfil the safety and handling regulations in each one of the industries: <br>
              – Transportation of product in bulk  and packaged <br>
              – Decreto único 1079 of 2015 (formerly Decreto 1609 of 2002): Transportation of dangerous products. <br>
              – Dereto 3075 of 1997: Transportation of ingredients and raw material for the food sector. <br>
            </p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6">
            <h4 class="titulos_blog">Installations</h4>
            <p class="text-muted text-justify">
              Currently we have 4 branches located in the principle cities of the country: Cali, Bogotá, Bucuramanga, Medellín from which we can ship to all the regions of the country. <br>
              Each branch has adequate warehouses for the storage of our products and offices with expert personnel to answer all of our client’s  demands and questions.
            </p>
          </div>
          <div class="col-12 col-md-6">
            <img src="/imagen/trabaja_nosotros.jpg" alt="" width="100%">
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
