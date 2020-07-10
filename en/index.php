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
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/assets/libs/magnific/magnific-popup.css">
  <link href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include 'common/menu.php'; include 'common/2domenu.php';?>
  <!--Corousel Library-->
  <div class="owl-carousel owl-theme" id="carousel">
    <?php
        $result=$conn->query("SELECT URLIMAGEN FROM `IMAGENES` WHERE `TIPO`='1'");
        if($result->num_rows>0){
          $cont=0;
          while($rowImg=$result->fetch_assoc()){
            ++$cont;
            $imagenBanner=$rowImg['URLIMAGEN'];
            ?>
            <div class="imagenPpal" style="background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.5)),url('../imagen/<?php echo $imagenBanner;?>');background-repeat: no-repeat!important;background-size: cover;">
                <?php if($cont==1){ ?>
                  <div class="texto_carousel d-none d-sm-block">
                    <p class="title_ppal_banner mb-0" data-aos="fade-up" data-aos-duration="2000">WE ARE SUPPLIERS</p>
                    <p class="title_ppal_banner" data-aos="fade-up" data-aos-duration="2000">OF CHEMICAL PRODUCTS</p>
                    <p class="text_ppal_banner" data-aos="fade-left" data-aos-duration="2000">We commercialize raw materials for the industry</p>
                  </div>
                <?php }elseif($cont==2){ ?>
                  <div class="texto_carousel2 d-none d-sm-block">
                    <p class="title_ppal_banner2 mb-0">WE PROVIDE RELIABLE SOLUTIONS</p>
                    <p class="title_ppal_banner2">FOR THE SUPPLY OF PRODUCTS</p>
                  </div>
                <?php }?>
            </div>
          <?php
          if($cont==2){break;}
          }
        }
    ?>
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
  <!-- Imagenes de Divisiones -->
  <section class="my-5 py-5">
    <div class="container mb-5 mt-4">
      <div class="row px-3 px-md-4 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="titulos">PRODUCT DIVISIONS</h2>
      </div>
      <div class="row px-3 px-md-4 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">We have four business divisions with which we serve the main industry sectors</p>
      </div>
    </div>
    <div class="container">
      <div class="gallery_f_inner row imageGallery1">
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item2">
            <img src="../imagen/divisiones/food.jpg" alt="">
            <div class="hover">
              <a href="/en/products/index.php?id_div=1">
                <h4>Food</h4>
                <span class="text-white">Main sectors of the food industry</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item2">
            <img src="../imagen/divisiones/especialidades.jpg" alt="">
            <div class="hover">
              <a href="/en/products/index.php?id_div=2">
                <h4>Especialty</h4>
                <span class="text-white">Chemical specialties for multiple industrial sectors</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item2">
            <img src="../imagen/divisiones/genericos.jpg" alt="">
            <div class="hover">
              <a href="/en/products/index.php?id_div=3">
                <h4>Commodities</h4>
                <span class="text-white">Chemical inputs for various industries</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
          <div class="h_gallery_item2">
            <img src="../imagen/divisiones/plastico.jpg" alt="">
            <div class="hover">
              <a href="/en/products/index.php?id_div=4">
                <h4>Plastics</h4>
                <span class="text-white">Focused on solutions from all types of industries</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
          <p class="text_general" style="font-family: 'Roboto Condensed', sans-serif;">You can search all our products. We will show you a list of articles related to all our industries.</p>
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
  <!-- Imagenes de industrias -->
  <seciton class="builder_area my-5 py-5">
    <div class="row justify-content-center mb-1" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="titulos">INDUSTRIES</h2>
    </div>
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-duration="1000">
      <p style="font-family: 'Roboto Condensed', sans-serif;">We provide products for all kinds of industries.</p>
    </div>
    <div class="row m0 builder_inner">
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=6">
          <img src="/imagen/industrias/petroleos.jpg" alt="">
          <div class="hover">
            <h4>Petroleum</h4>
            <p>Acetate de Ethyl. Acid Acetic Natural. Acid Hydrochloric. Acid Sulfuric. Aluminate of Sodium. Butanol. Many more...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="100" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=8">
          <img src="/imagen/industrias/telas.jpg" alt="">
          <div class="hover">
            <h4>Textiles and Garments</h4>
            <p>Acetate of Butilo. Acetate of Isobutyl. Acid Acetic Glacial. Acid Citric (FG). Acid Formic. Acid Nitric. Many more...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="200" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=3">
          <img src="/imagen/industrias/construccion.jpg" alt="">
          <div class="hover">
            <h4>Building</h4>
            <p>Acid Acetic Glacial. Acid Hydrochloric. Acid Formic. Acid Nitric. Acid Sulfuric. Butanol. Butilglicol. Many more...</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=14">
          <img src="/imagen/industrias/plasticos.jpg" alt="">
          <div class="hover">
            <h4>Plastics</h4>
            <p>Acetate of butilo. Acetate of Ethyl. Acetate of Isoamilo. Acetate of Isobutyl. Acid Acetic Glacial. Many more... </p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="100" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=5">
          <img src="/imagen/industrias/ingenios.jpg" alt="">
          <div class="hover">
            <h4>Sugar Mills</h4>
            <p>Acid Sulfuric. Water Ammoniacal. Acid Phosphoric (FG). Baking soda of Sodium (FG). Denatured Anhydrous Ethyl Alcohol. Hydrosal. Bactol Q80.</p>
          </div>
        </a>
      </div>
      <div class="builder_item" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="200" data-aos-duration="500">
        <a href="/es/productos/index.php?id_ind=13">
          <img src="/imagen/industrias/otras.jpg" alt="">
          <div class="hover">
            <h4>Other Industries</h4>
            <p>Formol. Baking soda of Sodium(FG). Acid Stearic (1852). Acid Sulphonic Linear. Hypochlorite de Sodium. Titanium dioxide KRONOS 1171.</p>
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
        <h2 class="titulos" style="font-family: 'Roboto Condensed', sans-serif;">OUR COMPANY</h2>
      </div>
      <div class="col-12">
        <div class="row justify-content-center">
          <div class="col-6 text-muted text-center" style="font-family: 'Roboto Condensed', sans-serif;">
            Eurochemus is a company with experience in the commercialization of
            raw materials for various productive sectors in the country.
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-5 mb-4">
        <a class="btn btn-outline-danger px-5" href="/es/nuestra_compania/">See more</a>
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
					<h1>Learn more about us </h1>
          <?php
          $sql="SELECT VALOR FROM CONFIGURACION WHERE `ATRIBUTO`='video'";
          $result=$conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $url_video=$row['VALOR'];
              $aux=mb_strrchr($url_video,"=");//ultima ocurrencia del simbolo =
              $cont=strlen($aux);//longitud del string
              $url_aux=substr($aux,1,($cont-1)); //codigo del enlace
              $url_video="https://www.youtube.com/embed/".$url_aux;
            }
          }else{$url_video="";}
           ?>
					<a id="play-home-video" class="video-play-button" href="/en/our-company/index.php">
						<span></span>
					</a>
					<!--p class="px-5">Eurochemus</p-->
				</div>
			</div>
		</div>
	</section>
  <!-- Seccion Prodcuto del mes -->
  <!--section class="container px-md-5 mb-5">
    <div class="row px-3 px-md-4">
      <div class="col-12 col-md-8">
        <div class="row">
          <h2 class="titulos">Featured product</h2>
        </div>
        <div class="row mt-4">
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
            <img src="/imagen/<?php echo $productoMes;?>" alt="" width="90%">
          </div>
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
  </section-->
  <!-- Seccion Actualidad -->
  <section class="container px-md-5 my-5 py-5">
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-duration="1000">
      <div class="col-md-8 text-center">
        <h2 class="mb-4 titulos">IN THE NEWS</h2>
        <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">News of interest, referring to the fastest growing international industries.</p>
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
              <a href="/en/in-the-news/article.php?id=<?php echo $id_articulo;?>">
                <img class="img-fluid" src="/admin/blog/img/<?php echo $imagen;?>">
              </a>
            </div>
            <div class="row">
              <div class="service_item mb-0">
                <a href="/en/in-the-news/article.php?id=<?php echo $id_articulo;?>"><h4><?php echo $titulo;?></h4></a>
                <p style="font-family: 'Roboto Condensed', sans-serif;"><?php echo substr($contenido,0,335)."[...]";?></p>
                <a class="btn btn-outline-danger px-5 mt-5" href="/en/in-the-news/article.php?id=<?php echo $id_articulo;?>">See more</a>
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
      <h2 class="titulos">OUR SUPPLIERS</h2>
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
      <img class="whatsapp_image" src="../imagen/whatsapp.png" alt="whatsapp Button">
    </a>
  </div>
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
  <script src="/assets/libs/magnific/jquery.magnific-popup.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
