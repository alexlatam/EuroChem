<?php
session_start();
include 'common/conexion.php';
include 'common/datosGenerales.php';
$section="home";
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
  <?php include 'common/menu.php'; include 'common/2domenu.php';?>
  <!--Colores #cc0033 #000066 -->
  <!--Corousel Library-->
  <div class="owl-carousel owl-theme" id="carousel">
    <div class="imagenPpal"><img class="img-fluid" src="/imagen/principal1.jpg" alt=""></div>
    <div class="imagenPpal"><img class="img-fluid" src="/imagen/principal3.jpg" alt=""></div>
    <div class="imagenPpal"><img class="img-fluid" src="/imagen/principal2.jpg" alt=""></div>
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
        0:{items:1}
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
            <img src="/imagen/facebook.png" width="25px" alt="">
          </a>
        </span>
      </div>
    </div>
  </section>
  <!-- Imagenes de productos -->
  <section class="container my-5 px-md-5 pb-2">
    <div class="row px-3 px-md-4">
      <h2 class="titulos">Product Divisions</h2>
    </div>
    <div class="row px-3 px-md-4">
      <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">We have four lines of business with serving the principle sectors of industry.</p>
    </div>
    <div class="row px-3 px-md-4 mt-3">
      <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
        <a class="imagen_divisiones_home" href="#">
          <img src="/imagen/division_alimentos.png" alt="" width="100%">
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
        <a class="imagen_divisiones_home" href="#">
          <img src="/imagen/division_especializadas.png" alt="" width="100%">
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
        <a class="imagen_divisiones_home" href="#">
          <img src="/imagen/division_genericos.png" alt="" width="100%">
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-4 text-center">
        <a class="imagen_divisiones_home" href="#">
          <img src="/imagen/division_plasticos.png" alt="" width="100%">
        </a>
      </div>
    </div>
  </section>
  <!-- Imagenes de industrias -->
  <section class="container-fluid mt-5 bg-euro pb-5">
    <div class="container pt-5 pb-3 px-5">
      <div class="row mt-3 px-4">
        <h2 class="titulos">Industries</h2>
      </div>
      <div class="row justify-content-center align-items-center mt-2">
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/comercializadores.jpg" alt="">
            <div class="div_text_industria">
              <div class="text_span text-white">Food and Beverages</div>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/recubrimientos.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Coverings</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/comercializadores.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Retail</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/aseo.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Cleaning</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/telas.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Textiles and Garments</span>
            </div>
          </div>
        </a>
      </div>
      <div class="row justify-content-center align-items-center mt-2">
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/industria.jpg" alt="">
            <div class="div_text_industria">
              <div class="text_span text-white">Chemical Industry</div>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/plasticos.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Plastics</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/adhesivos.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Adhesives and Glue</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/impresion.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Printing</span>
            </div>
          </div>
        </a>
        <a class="enlace_img_industrias mx-1" href="#">
          <div class="contenedor_img_industrias mt-3">
            <img class="img_industrias" src="/imagen/industrias/petroleos.jpg" alt="">
            <div class="div_text_industria">
              <span class="text_span text-white">Pretroleum</span>
            </div>
          </div>
        </a>
      </div>
      <div class="row justify-content-center mt-5">
        <a class="btn btn-primary px-4" href="/en/products/index.php?industrias=1">See all</a>
      </div>
    </div>
  </section>
  <!-- Seccion de Video -->
  <section class="container px-md-5 my-5">
    <div class="row px-3 px-md-4">
      <div class="col-12 col-md-6">
        <div class="row mt-3">
          <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">Our Company</h2>
        </div>
        <div class="row text-muted">
          EuroChem S.A. is a company with experience in the retail of raw materials for diverse productive sectors of the country: coverings, cleaning, plastics, ingredients for the food and beverage industry, agro, adhesives and glues, pharmaceuticals, cosmetics, petroleum fabrication of intermediary chemicals, among others.
        </div>
        <div class="row justify-content-center mt-5 mb-4">
          <a class="btn btn-primary px-5" href="/en/our-company/">See more</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <iframe width="100%" height="250vh" src="https://www.youtube.com/embed/ZOV-7f3aofM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
  <!-- Seccion Prodcuto del mes -->
  <section class="container px-md-5 mb-5">
    <div class="row px-3 px-md-4">
      <div class="col-12 col-md-8">
        <div class="row">
          <h2 class="titulos">Featured product</h2>
        </div>
        <div class="row mt-4">
          <img src="/imagen/producto_del_mes.jpg" alt="" width="90%">
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="row justify-content-center">
          <h2 class="titulos">Business portal</h2>
        </div>
        <div class="row contenedor_pagos mt-4 justify-content-center align-items-center">
          <div class="text-white px-5 text-center text_pagos_home mt-3">
            Now you can pay online quickly, easily and safely.
          </div>
          <div class="text-center">
            <a class="btn btn-secondary px-5 py-2" href="/en/pay/">Pay</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Seccion Actualidad -->
  <section class="container px-md-5 mb-5">
    <div class="row px-4">
      <h2 class="titulos">In the News</h2>
    </div>
    <div class="row px-4 mt-4">
      <?php
      $sql="SELECT IDARTICULO,TITLE,CONTENT,IMAGE FROM ARTICLESBLOG LIMIT 3;";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $id_articulo=$row['IDARTICULO'];
          $titulo=ucwords($row['TITLE']);
          $contenido=ucfirst($row['CONTENT']);
          $imagen=$row['IMAGE'];
          ?>
          <div class="col-12 col-md-4" style="padding:0 2%;">
            <div class="row" style="background-color:#f7f7f7;">
              <div class="container-img-blog">
                <a class="d-flex" href="#">
                  <div class="imagen-blog">
                    <img class="img-blog" src="/admin/blog/img/<?php echo $imagen;?>">
                  </div>
                </a>
              </div>
            </div>
            <div class="row px-2" style="background-color:#f7f7f7;">
              <h4 class="titulos_blog pt-3"><?php echo $titulo;?></h4>
            </div>
            <div class="row text-muted px-2" style="background-color:#f7f7f7;">
              <p><?php echo substr($contenido,0,335)."[...]";?></p>
            </div>
            <div class="row px-2 pb-4" style="background-color:#f7f7f7;">
              <a class="btn btn-primary px-4" href="/en/in-the-news/article.php?id=<?php echo $id_articulo;?>">Leer más</a>
            </div>
          </div>
          <?php
        }
      }
       ?>
    </div>
  </section>
  <!-- Carousel Clientes -->
  <section class="container-fluid bg-euro mt-4">
    <div class="container px-5 py-5">
      <div class="row px-4 align-items-center">
        <div class="owl-carousel owl-theme" id="carouselclients">
          <div class="img_clients"><img class="img-fluid" src="/imagen/client1.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client2.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client3.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client4.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client6.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client7.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client8.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client9.png" alt=""></div>
          <div class="img_clients"><img class="img-fluid" src="/imagen/client10.png" alt=""></div>
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
        0:{items:2},
        768:{items:3},
        992:{items:5}
      }
    })
  </script>
  <!-- Footer -->
  <?php include 'common/footer.php';?>
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
