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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5 pb-4">
    <div class="row px-4 mt-3">
      <div class="col-12 mt-2">
        <div class="row">
          <div class="col-12 col-lg-6 px-0">
            <div class="row px-0 mx-0">
              <h2 class="titulos">Our company</h2>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <p class="text_general pr-3">
                Eurochem is 100% national company founded in 1977 with the
                goal to supply raw materials to national industries.
                Since then, we have grown as a strategic ally of relevant
                companies in diverse industries, thanks to our complete
                product portfolio, with the highest standards of quality,
                service, industrial safety and durable relationships
                with important national and international suppliers.
              </p>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <h4 class="titulos_blog">Mission</h4>
              <p class="text_general pr-3">
                Provide trustworthy solutions for the supply of chemical products. <br>
                Trustworthiness: Wide network of national and international
                suppliers, staff with a vast knowledge of the chemical
                industry, a safe and state-of-the-art sustem of storage
                and transportation, compliance with the requierements
                agreed upon with the client, execution of the processes
                in light of sustainable development.
              </p>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <h4 class="titulos_blog">Vision</h4>
              <p class="text_general pr-3">
                At Eurochem we intend to supply raw materials to the
                national industry. Since then, we have become a strategic
                ally of companies belonging to various industries, thanks
                to our comprehensive product portfolio, high standards of
                quality, service, industrial safety, and the establishment
                of long-lasting relationships with important national and
                international suppliers.
              </p>
            </div>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img class="img-fluid" src="/imagen/certificacion4.jpg" alt="" width="100%">
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="d-lg-none">
            <h4 class="titulos_blog pt-5">Transportation</h4>
            <p class="text_general">
              59-vehicle fleet with diverse specifications and categories,
              tank-trucks, semi-trailer truck and trucks, to fulfil the
              safety and handling regulations in each one of the
              industries: <br>
              – Transportation of product in bulk  and packaged <br>
              – Decreto único 1079 of 2015 (formerly Decreto 1609 of 2002): Transportation of dangerous products. <br>
              – Dereto 3075 of 1997: Transportation of ingredients and raw material for the food sector. <br>
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="/imagen/nuestra_compania_transporte_conquimica.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 d-none d-lg-block">
            <h4 class="titulos_blog pt-4">Transportation</h4>
            <p class="text_general px-0">
              59-vehicle fleet with diverse specifications and
              categories, tank-trucks, semi-trailer truck and
              trucks, to fulfil the safety and handling
              regulations in each one of the industries: <br>
              – Transportation of product in bulk  and packaged <br>
              – Decreto único 1079 of 2015 (formerly Decreto 1609 of 2002): Transportation of dangerous products. <br>
              – Dereto 3075 of 1997: Transportation of ingredients and raw material for the food sector. <br>
            </p>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="col-12 col-lg-6 px-0">
            <h4 class="titulos_blog pt-4">Logistics</h4>
            <p class="text_general pr-3">
              Logistics is fundamental in order to offer a
              competitive advantage to our clients. We have
              state-of-the-art infrastructure with an adequate
              capacity to administrate liquid and solid
              products in installations specialized in the
              storage, bottling and packaging operations of
              chemical chemical products and with a high
              performance in security, quality and atmosphere.
              We deliver products to our client’s door,
              assuring the transport chain and achieving the
              safety standards of this activity.
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="../../imagen/nuestra_compania_logistica_conquimica.jpg" alt="" width="100%">
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="d-lg-none">
            <h4 class="titulos_blog pt-5">Installations</h4>
            <p class="text_general">
              Each branch has adequate warehouses for the
              storage of our products and offices with expert
              personnel to answer all of our client’s  demands
              and questions.
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="/imagen/instalaciones.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 d-none d-lg-block">
            <h4 class="titulos_blog pt-4">Installations</h4>
            <p class="text_general px-0">
              Each branch has adequate warehouses for the
              storage of our products and offices with expert
              personnel to answer all of our client’s  demands
              and questions.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Seccion de buscar productos  -->
  <section class="container-fluid pt-3 py-4" style="background-color:#00003b;">
    <div class="container py-5 px-5" data-aos="fade-up" data-aos-duration="1000">
      <form action="/en/products" method="get">
      <div class="row pt-3">
        <div class="col-12">
          <h2 class="title_axuiliar">OUR PRODUCTS</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-7 mt-3">
          <p class="text_general">You can search all our products. We will show you a list of articles related to all our industries.</p>
        </div>
        <div class="col-12 col-lg-5 px-1 mb-2 mt-3">
          <div class="input-group mb-5">
            <input type="text" class="input_search form-control" name="search" placeholder="Search products...">
            <div class="input-group-append">
              <button class="btn btn-danger input_search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </section>
  <!-- Carousel Clientes -->
  <section class="clients_logo_area py-5 my-5 px-0 mx-0">
    <div class="row px-0 mx-0 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="titulos">OUR SUPPLIERS</h2>
    </div>
    <div class="container py-5">
      <div class="clients_slider owl-carousel owl-theme" id="carouselclients">
        <div class="img_clients">
          <img src="../../imagen/client9.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client8.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client7.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client6.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client5.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client4.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client3.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client2.png" alt="">
        </div>
        <div class="img_clients">
          <img src="../../imagen/client1.png" alt="">
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
      autoplay:true,
      autoplayHoverPause:true,
      autoplayTimeout:4000,
      smartSpeed:1000,
      margin:0,
      responsive:{
        0:{items:2},
        768:{items:3},
        992:{items:5}
      }
    })
  </script>
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
