<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="contacto";
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
  <style media="screen">
  .input_text{
    border: 0px;
    border-bottom: 1px solid #cc0033;
    outline: none;
    font-family: 'Roboto Condensed', sans-serif;
    min-width:100%;
    transition: padding-left 0.5s;
  }
  .input_text:focus{
    border-bottom: 2px solid #ff505c;
    background-color: #ffeaeb;
    padding-left: 10px;
  }
  .title_input{
    color: #444;
  }
  </style>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5 pb-4 mb-4">
    <div class="row px-4 mt-5">
      <div class="col-12 col-lg-6 mt-3">
        <div class="row justify-content-center">
          <h3 class="titulos text-center">Our branches</h3>
        </div>
        <div class="row mt-4">
          <div class="col-12 col-sm-4">
            <h4 class="titulos"><strong>Florida</strong></h4>
          </div>
          <div class="col-12 col-sm-6">
            <p class="text-muted">
              1359 SW 1st Street <br>
              Miami-Fl <br>
              33135 <br>
              USA <br>
              Phone: +1 786 702 9996<br>
            </p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-sm-4">
            <h4 class="titulos"><strong>Florida</strong></h4>
          </div>
          <div class="col-12 col-sm-6">
            <p class="text-muted">
              P.O box <br>
              1825 Ponce de León <br>
              Suite 266 <br>
              Coral Gables-Fl <br>
              33134 <br>
              USA
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 pr-0 mt-3">
        <div class="row justify-content-center">
          <h3 class="titulos text-center">¡Contact us now!</h3>
        </div>
        <div class="row text-muted mb-2 mt-4">
          <span class="title_input">Name </span> *
        </div>
        <div class="row">
          <input class="input_text" type="text" id="name" placeholder="Your Name" required>
        </div>
        <div class="row text-muted mb-2 mt-4">
          <span class="title_input">E-Mail </span> *
        </div>
        <div class="row">
          <input class="input_text" type="text" id="email" placeholder="Your e-mail" required>
        </div>
        <div class="row text-muted mb-2 mt-4">
          <span class="title_input">Company </span> *
        </div>
        <div class="row">
          <input class="input_text" type="text" id="company" placeholder="Your company name">
        </div>
        <div class="row text-muted mb-2 mt-4">
          <span class="title_input">Subject </span>
        </div>
        <div class="row">
          <input class="input_text" type="text" id="subject" placeholder="Subject">
        </div>
        <div class="row text-muted mb-2 mt-4">
          <span class="title_input">Message </span> *
        </div>
        <div class="row">
          <textarea class="input_text" id="message" rows="6" cols="80" required></textarea>
        </div>
        <div class="row mt-3">
          <button class="btn btn-outline-primary py-3" type="button" id="enviar" style="min-width:100%;">Send</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#enviar").click(function(){
      var name=$("#name").val();
      var email=$("#email").val();
      var subject=$("#subject").val();
      var company=$("#company").val();
      var message=$("#message").val();
      if (name=="" || email=="" || message=="" || company=="") {
        const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
        toast({type:'info',title:'Fill in the fields that are required'});
      }else {
        $.get('ajax_mail.php',{name:name,email:email,subject:subject,company:company,message:message},verificar,'text');
        function verificar(respuesta){
          if (respuesta==1) {
            const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3000});
            toast({type:'success',title:'The message was sent successfully \n  We will be communicating with you soon.'});
            $("#name").val("");$("#email").val("");$("#subject").val("");$("#company").val("");$("#message").val("");
          }else {
            const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
            toast({type:'info',title:'¡There was a little problem! \n Try again'});
          }
        }
      }
    });
  </script>
  <!-- Seccion de buscar productos y facebook -->
  <section class="container-fluid pt-3 py-4" style="background-color:#00003b;">
    <div class="container py-5 px-5" data-aos="fade-up" data-aos-duration="1000">
      <form action="/es/productos" method="get">
      <div class="row pt-3">
        <div class="col-12">
          <h2 class="title_axuiliar">OUR PRODUCTS</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-7 mt-3">
          <p class="text_general" style="font-family:'Roboto Condensed',sans-serif !important;">You can search all our products. We will show you a list of articles related to all our industries.</p>
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
          <img src="/imagen/client9.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client8.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client7.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client6.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client5.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client4.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client3.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client2.png" alt="">
        </div>
        <div class="img_clients">
          <img src="/imagen/client1.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#carouselclients').owlCarousel({
      loop:true,
      dots:false,
      center:true,
      autoplay:true,
      autoplayHoverPause:true,
      smartSpeed:1000,
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
  <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
