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
  <meta name="desciption" content="Mavic es una nueva E-commerce Venezolana, creyente de la nueva era digital de venta por internet.">
  <meta name="keywords" content="Suminstros Mavic, Mavic, Mavic vzla">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content="Suministros Mavic."/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="admin/img/<?php echo $imageLogo;?>">
  <link rel="stylesheet" href="admin/assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/new.css">
  <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <div class="div_top"></div>
  <div class="div_ppal">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-auto align-self-center">
          <svg width="13px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" class="svg-inline--fa fa-phone-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#000066" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg>
          <span class="text_menu_1" style="font-family: 'Roboto Condensed', sans-serif;">Teléfono: (021) 50 658 212</span>
          <span class="ml-2"><svg width="17px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#000066" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg></span>
          <span class="text_menu_1" style="font-family: 'Roboto Condensed', sans-serif;">ventas@eurochem.com</span>
        </div>
        <div class="col-auto" style="font-family: 'Roboto Condensed', sans-serif;">
          <span class="border_rigth px-1"><a class="enlace_menu" href="#">Certificaciones</a> </span>
          <span class="border_rigth px-1"><a class="enlace_menu" href="#">Sustentabilidad</a> </span>
          <span class="border_rigth px-1"><a class="enlace_menu" href="#">Trabaje con nosotros</a> </span>
          <span class="border_rigth px-1"><a class="enlace_menu" href="#">Actualidad</a> </span>
        </div>
        <div class="col-auto ml-auto">
          <input type="search" name="" value="" placeholder="Buscar productos...">
        </div>
      </div>
    </div>
  </div>
  <?php// include 'common/menu.php'; include 'common/2domenu.php';?>
  <!--Colores #cc0033 #000066 -->
  <!--Corousel Library-->
  <div class="owl-carousel owl-theme" id="carousel">
    <?php
        $result=$conn->query("SELECT * FROM `IMAGENES` WHERE `TIPO`='1'");
        if($result->num_rows>0){
          while($rowImg=$result->fetch_assoc()){
            $imagenBanner=$rowImg['URLIMAGEN'];
            $enlace=$rowImg['ENLACE'];
            $target=$rowImg['TARGET'];
            if($enlace!=''){
              ?>
              <a href="<?php echo $enlace;?>" target="<?php echo $target;?>">
                <div class="imagenPpal"><img class="d-block d-sm-none" src="admin/img/<?php echo $imagenBanner;?>" alt=""><img class="img-fluid d-none d-sm-block" src="<?php echo "admin/img/$imagenBanner";?>" alt=""></div>
              </a>
            <?php }else{ ?>
              <div class="imagenPpal"><img class="d-block d-sm-none" src="admin/img/<?php echo $imagenBanner;?>" alt=""><img class="img-fluid d-none d-sm-block" src="<?php echo "admin/img/$imagenBanner";?>" alt=""></div>
            <?php } ?>
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
      //movimiento del carousel
      autoplay:true,
      autoplayHoverPause:true,
      autoplayTimeout:4000,
      smartSpeed:1000,
      margin:0,
      responsive:{0:{items:1}}
    })
  </script>
  <?php// include 'common/footer.php';?>
  <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
