<?php
session_start();
include 'common/conexion.php';
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
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <link rel="stylesheet" href="assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/libs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/libs/magnific/magnific-popup.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include 'es/common/menu.php'; include 'es/common/2domenu.php';?>
  <!--Colores #cc0033 #000066 -->
  <!--Corousel Library-->
  <div class="owl-carousel owl-theme" id="carousel">
    <?php
        $result=$conn->query("SELECT URLIMAGEN FROM `IMAGENES` WHERE `TIPO`='1' LIMIT 2");
        if($result->num_rows>0){
          $cont=0;
          while($rowImg=$result->fetch_assoc()){
            ++$cont;
            $imagenBanner=$rowImg['URLIMAGEN'];
            ?>
            <div class="imagenPpal" style="background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.5)),url('imagen/<?php echo $imagenBanner;?>');background-repeat: no-repeat!important;background-size: cover;">
                <?php if($cont==1){ ?>
                  <div class="texto_carousel">
                    <p class="title_ppal_banner mb-0" data-aos="fade-up" data-aos-duration="2000">SOMOS PROVEEDORES</p>
                    <p class="title_ppal_banner" data-aos="fade-up" data-aos-duration="2000">DE PRODUCTOS QUÍMICOS</p>
                    <p class="text_ppal_banner" data-aos="fade-left" data-aos-duration="2000">Comercializamos materias primas para la industria</p>
                  </div>
                <?php }elseif($cont==2){ ?>
                  <div class="texto_carousel2">
                    <p class="title_ppal_banner2 mb-0">PROVEEMOS SOLUCIONES CONFIABLES</p>
                    <p class="title_ppal_banner2">PARA EL ABASTECIMIENTO DE PRODUCTOS</p>
                  </div>
                <?php }?>
            </div>
          <?php
          }
        }
    ?>
  </div>
  <script>
    $('#carousel').owlCarousel({
      loop:true,
      dots:true,
      mouseDrag: false,
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
  <!-- Imagenes de Divisiones -->
  <section class="my-5 py-5">
    <div class="container mb-5 mt-4">
      <div class="row px-3 px-md-4 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="titulos">DIVISIONES DE PRODUCTOS</h2>
      </div>
      <div class="row px-3 px-md-4 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Contamos con cuatro divisiones de negocio con las cuales atendemos a los principales sectores de la industria</p>
      </div>
    </div>
    <div class="container">
      <div class="gallery_f_inner row imageGallery1">
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item">
            <img src="imagen/divisiones/food.jpg" alt="">
            <div class="hover">
              <a href="/es/productos/index.php?id_div=1">
                <h4>Alimentos</h4>
                <span class="text-white">Principales sectores de la industria de alimentos</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item">
            <img src="imagen/divisiones/especialidades.jpg" alt="">
            <div class="hover">
              <a href="/es/productos/index.php?id_div=2">
                <h4>Especialidades</h4>
                <span class="text-white">Especialidades químicas para múltiples sectores industriales</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item">
            <img src="imagen/divisiones/genericos.jpg" alt="">
            <div class="hover">
              <a href="/es/productos/index.php?id_div=3">
                <h4>Genéricos</h4>
                <span class="text-white">Insumos químicos para diversas industrias</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item">
            <img src="imagen/divisiones/plastico.jpg" alt="">
            <div class="hover">
              <a href="/es/productos/index.php?id_div=4">
                <h4>Plásticos</h4>
                <span class="text-white">Enfocado en soluciones de todo tipo de industrias</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
  <!-- Imagenes de industrias -->
  <seciton class="builder_area my-5 py-5">
    <div class="row justify-content-center mb-1" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="titulos">INDUSTRIAS</h2>
    </div>
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-duration="1000">
      <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Proveemos productos para todo tipo de industrias.</p>
    </div>
    <div class="row m0 builder_inner">
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=6">
          <img src="imagen/industrias/petroleos.jpg" alt="">
          <div class="hover">
            <h4>Petróleos</h4>
            <p>Acetato de Etilo. Ácido Acético Natural. Ácido Clorhídrico. Ácido Sulfúrico. Aluminato de Sodio. Butanol. Muchos más...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="100" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=8">
          <img src="imagen/industrias/telas.jpg" alt="">
          <div class="hover">
            <h4>Textiles y Prendas</h4>
            <p>Acetato de Butilo. Acetato de Isobutilo. Ácido Acético Glacial. Ácido Cítrico (FG). Ácido Fórmico. Ácido Nítrico. Muchos más...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=14">
          <img src="imagen/industrias/plasticos.jpg" alt="">
          <div class="hover">
            <h4>Plásticos</h4>
            <p>Acetato de Butilo. Acetato de Etilo. Acetato de Isoamilo. Acetato de Isobutilo. Ácido Acético Glacial. Muchos más... </p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="200" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=3">
          <img src="imagen/industrias/construccion.jpg" alt="">
          <div class="hover">
            <h4>Construcción y Vías</h4>
            <p>Ácido Acético Glacial. Ácido Clorhídrico. Ácido Fórmico. Ácido Nítrico. Ácido Sulfúrico. Butanol. Butilglicol. Muchos más...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="100" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=5">
          <img src="imagen/industrias/ingenios.jpg" alt="">
          <div class="hover">
            <h4>Ingenios</h4>
            <p>Ácido Sulfúrico. Agua Amoniacal. Ácido Fosfórico (FG). Bicarbonato de Sodio (FG). Alcohol Etílico Anhidro Desnaturalizado. Hidrosal. Bactol Q80.</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="200" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=13">
          <img src="imagen/industrias/otras.jpg" alt="">
          <div class="hover">
            <h4>Otras Industrias</h4>
            <p>Formol. Bicarbonato de Sodio(FG). Ácido Esteárico (1852). Ácido Sulfónico Lineal. Hipoclorito de Sodio.  Dióxido Titanio KRONOS 1171.</p>
          </div>
        </a>
      </div>
    </div>
  </seciton>
  <!-- Nuestra compañia -->
  <div class="container py-5 mb-5">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
      <div class="" style="border-left: 3px solid #cc0033;border-right: 3px solid #cc0033;height: 30px;"></div>
    </div>
    <div class="row justify-content-center my-4" data-aos="fade-up" data-aos-offset="300" data-aos-duration="1000">
      <div class="col-auto">
        <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">NUESTRA COMPAÑIA</h2>
      </div>
      <div class="col-12">
        <div class="row justify-content-center">
          <div class="col-6 text-muted text-center" style="font-family: 'Roboto Condensed', sans-serif;">
            Eurochemus es una empresa con experiencia en la comercialización
            de materias primas para diversos sectores productivos en el país.
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-5 mb-4">
        <a class="btn btn-outline-danger px-5" href="/es/nuestra_compania/">Ver Más</a>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="" style="border-left: 3px solid #cc0033;border-right: 3px solid #cc0033;height: 30px;"></div>
    </div>
  </div>
  <!-- Seccion de Video -->
  <section class="callto-area section-gap" style="position:relative;">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="call-wrap mx-auto">
					<h1>Conoce más de nosotros </h1>
          <?php
          $url_video="";
          $sql="SELECT VALOR FROM CONFIGURACION WHERE `ATRIBUTO`='video'";
          $result=$conn->query($sql);
          if($result===TRUE){
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $url_video=$row['VALOR'];
                $aux=mb_strrchr($url_video,"=");//ultima ocurrencia del simbolo =
                $cont=strlen($aux);//longitud del string
                $url_aux=substr($aux,1,($cont-1)); //codigo del enlace
                $url_video="https://www.youtube.com/embed/".$url_aux;
              }
            }
          }
          ?>
          <?php if ($url_video==""){ ?>
            <a id="play-home-video" class="video-play-button" href="/es/nuestra_compania/index.php">
              <span></span>
            </a>
          <?php }else { ?>
            <a id="play-home-video" class="video-play-button" href="#" data-toggle="modal" data-target="#videoModal">
              <span></span>
            </a>
          <?php } ?>
				</div>
			</div>
		</div>
	</section>
  <!-- Modal Video -->
  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <iframe width="560" height="315" src="<?php echo $url_video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <!--section class="container px-md-5 my-5 pt-5">
    <div class="row px-3 px-md-4">
      <div class="col-12 col-md-6">
        <iframe width="100%" height="250vh" src="<?php echo $url_video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section-->
  <!-- Seccion Prodcuto del mes -->
  <!--section class="container px-md-5 mb-5">
    <div class="row px-3 px-md-4">
      <div class="col-12 col-md-8">
        <div class="row">
          <h2 class="titulos">PRODUCTOS DEL MES</h2>
        </div>
        <div class="row mt-4">
          <?php
          $sql="SELECT VALOR FROM CONFIGURACION WHERE `ATRIBUTO`='productoMes'";
          $result=$conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $productoMes=$row['VALOR'];
            }
          }else{$productoMes="";}
                 ?>
          <img src="imagen/<?php echo $productoMes;?>" alt="" width="90%">
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="row justify-content-center">
          <h2 class="titulos">Portal Empresarial</h2>
        </div>
        <div class="row contenedor_pagos mt-4 justify-content-center align-items-center">
          <div class="text-white px-5 text-center text_pagos_home mt-3">
            Ahora puedes realizar tus pagos por internet de forma ágil, fácil y segura.
          </div>
          <div class="text-center">
            <a class="btn btn-secondary px-5 py-2" href="/es/pagos/">Pagar</a>
          </div>
        </div>
      </div>
    </div>
  </section-->
  <!-- Seccion Actualidad -->
  <section class="container px-md-5 my-5 py-5">
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-duration="1000">
      <div class="col-md-8 text-center">
        <h2 class="mb-4 titulos">ACTUALIDAD</h2>
        <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Noticias de interés, referentes a las industrias internacionales de mayor crecimiento.</p>
      </div>
    </div>
    <div class="row mt-4">
      <?php
      $sql="SELECT IDARTICULO,TITLE,CONTENT,DATE,IMAGE FROM ARTICLESBLOG LIMIT 3";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        $meses=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        while($row=$result->fetch_assoc()){
          $id_articulo=$row['IDARTICULO'];
          $titulo=ucwords(strtolower($row['TITLE']));
          if(strlen($titulo)>40){$titulo=substr($titulo,0,40)."...";}
          $contenido=ucfirst(strtolower($row['CONTENT']));
          $imagen=$row['IMAGE'];
          $fecha=$row['DATE'];
          $aux=substr($fecha,5,2);
          if($aux<10){$aux="0".$aux;}
          $fecha=$meses[intval($aux)]." ".substr($fecha,8,2).","." ".substr($fecha,0,4);
          ?>
          <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-duration="2000">
            <div class="row justify-content-center">
              <a href="/es/actualidad/article.php?id=<?php echo $id_articulo;?>">
                <img class="img-fluid" src="admin/blog/img/<?php echo $imagen;?>">
              </a>
            </div>
            <div class="row">
              <div class="service_item mb-0">
                <a href="/es/actualidad/article.php?id=<?php echo $id_articulo;?>"><h4><?php echo $titulo;?></h4></a>
                <p style="font-family: 'Roboto Condensed', sans-serif;"><?php echo substr($contenido,0,335)."[...]";?></p>
                <a class="btn btn-outline-danger px-5 mt-5" href="/es/actualidad/article.php?id=<?php echo $id_articulo;?>">Leer más</a>
              </div>
            </div>
          </div>
          <?php
        }
      }
       ?>
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
          <img src="imagen/client9.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client8.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client7.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client6.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client5.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client4.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client3.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client2.png" alt="">
        </div>
        <div class="img_clients">
          <img src="imagen/client1.png" alt="">
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
      <img class="whatsapp_image" src="imagen/whatsapp.png" alt="whatsapp Button">
    </a>
  </div>
  <!-- Footer -->
  <?php include 'es/common/footer.php';?>
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
  <script>
    $('#play-home-video').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
  </script>
  <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/magnific/jquery.magnific-popup.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
