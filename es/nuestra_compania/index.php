<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
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
  <link rel="stylesheet" href="../../assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../assets/icons/css/all.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/filtros.js"></script>
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Source+Sans+Pro&display=swap" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-4 pb-4">
    <div class="row px-4 mt-3">
      <div class="col-12 mt-2">
        <div class="row">
          <div class="col-12 col-lg-6 px-0">
            <div class="row px-0 mx-0">
              <h2 class="titulos">NUESTRA COMPAÑIA</h2>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <p class="text_general pr-3">
                En Eurochem tenemos el propósito de suministrar materias primas a la industria nacional.
                Desde entonces, nos hemos fortalecido como un aliado estratégico de empresas
                pertenecientes a diversas industrias, gracias a nuestro completo portafolio de
                productos, a los altos estándares de calidad, servicio, seguridad industrial y
                al establecimiento de relaciones perdurables con importantes proveedores
                nacionales e internacionales.
              </p>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <h4 class="titulos_blog">Misión</h4>
              <p class="text_general pr-3">
                Proveer soluciones confiables para el abastecimiento de productos químicos. <br>
                Confiabilidad: Red amplia de proveedores nacionales e internacionales, personal
                con alto conocimiento de la industria química, sistemas de almacenamiento y
                transporte seguros y modernos, cumplimiento de los requerimientos acordados
                con el cliente, ejecución de los procesos en el marco del desarrollo sostenible.
              </p>
            </div>
            <div class="row mt-4 px-0 mx-0">
              <h4 class="titulos_blog">Visión</h4>
              <p class="text_general pr-3">
                Estar en los primeros lugares de liderazgo en la distribución
                de productos químicos, al ser reconocida por la Gestión
                Integral* de los procesos, la amplia cobertura nacional de las operaciones,
                los altos niveles de servicio y la amplitud del portafolio de productos. <br>
                *Gestión Integral: procesos comprometidos con la Calidad, Seguridad, cuidado
                de la Salud y del medio Ambiente.
              </p>
            </div>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img class="img-fluid" src="../../imagen/certificacion4.jpg" alt="" width="100%">
          </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="d-lg-none">
            <h4 class="titulos_blog pt-5">Transporte</h4>
            <p class="text_general">
              60 vehículos de diversas especificaciones y categorías, carro-tanques,
              tractocamiones y camiones, para dar cumplimiento a las regulaciones de
              seguridad y manejo en cada una de las industrias: <br>
              <b>-</b> Transporte de producto a granel y empacado</br>
              <b>-</b> Decreto único 1079 de 2015 (antes Decreto 1609 de 2002): Transporte de mercancías peligrosas</br>
              <b>-</b> Decreto 3075 de 1997: Transporte de ingredientes y materias primas para el sector de alimentos
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="../../imagen/nuestra_compania_transporte_conquimica.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 d-none d-lg-block">
            <h4 class="titulos_blog pt-4">Transporte</h4>
            <p class="text_general px-0">
              60 vehículos de diversas especificaciones y categorías, carro-tanques,
              tractocamiones y camiones, para dar cumplimiento a las regulaciones de
              seguridad y manejo en cada una de las industrias: <br>
              <b>-</b> Transporte de producto a granel y empacado</br>
              <b>-</b> Decreto único 1079 de 2015 (antes Decreto 1609 de 2002): Transporte de mercancías peligrosas</br>
              <b>-</b> Decreto 3075 de 1997: Transporte de ingredientes y materias primas para el sector de alimentos
            </p>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="col-12 col-lg-6 px-0">
            <h4 class="titulos_blog pt-4">Logística</h4>
            <p class="text_general pr-3">
              La logística es fundamental para ofrecer ventajas competitivas
              a nuestros clientes, disponemos de una infraestructura moderna,
              con una capacidad adecuada para el manejo de productos líquidos y
              sólidos, en instalaciones especializadas en la operación de
              almacenamiento, envasado y embalaje de productos químicos y con
              un alto desempeño en seguridad, calidad y ambiente. Entregamos
              los productos en la puerta de nuestros clientes, asegurando la
              cadena de transporte y cumpliendo con los estándares de seguridad
              para esta actividad.
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="../../imagen/nuestra_compania_logistica_conquimica.jpg" alt="" width="100%">
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="d-lg-none">
            <h4 class="titulos_blog pt-5">Instalaciones</h4>
            <p class="text_general">
              Contamos en cada sede con bodegas adecuadas para el almacenamiento
              de nuestros productos y oficinas con personal idóneo para atender
              todos los requerimientos de nuestros clientes.
            </p>
          </div>
          <div class="col-12 col-lg-6 px-0">
            <img src="../../imagen/instalaciones.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 d-none d-lg-block">
            <h4 class="titulos_blog pt-4">Instalaciones</h4>
            <p class="text_general px-0">
              Contamos en cada sede con bodegas adecuadas para el almacenamiento
              de nuestros productos y oficinas con personal idóneo para atender
              todos los requerimientos de nuestros clientes.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Seccion de buscar productos y facebook -->
  <section class="container-fluid pt-3 py-4" style="background-color:#00003b;">
    <div class="container py-5 px-5" data-aos="fade-up" data-aos-duration="1000">
      <form action="/es/productos" method="get">
      <div class="row pt-3">
        <div class="col-12">
          <h2 class="title_axuiliar">NUESTROS PRODUCTOS</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-7 mt-3">
          <p class="text_general" style="font-family:'Roboto Condensed',sans-serif !important;">Te mostraremos una lista de articulos relacionados con todas nuestras industrias.</p>
        </div>
        <div class="col-12 col-lg-5 px-1 mb-2 mt-3">
          <div class="input-group mb-5">
            <input type="text" class="input_search form-control" name="search" placeholder="Buscar productos...">
            <div class="input-group-append">
              <button class="btn btn-danger input_search" type="submit">Buscar</button>
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
      <h2 class="titulos">NUESTROS PROVEEDORES</h2>
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
  <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
