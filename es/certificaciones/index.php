<?php
#Quitar el comentario para entrar en mantenimiento.
#header('Location: mantenimiento/');
session_start();
include '../common/conexion.php';
$section="certificaciones";
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
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5">
    <div class="row px-4">
      <div class="col-auto">
        <h2 class="titulos mt-4">CERTIFICACIONES</h2>
      </div>
    </div>
    <div class="row px-4 mt-3">
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-lg-6 mt-3">
            <div class="row">
              <div class="col-4 container_certification">
                <img class="img_certification img-fluid" src="../../imagen/certificacion1.png" alt="">
              </div>
              <div class="col-4 container_certification">
                <img class="img_certification img-fluid" src="../../imagen/certificacion2.png" alt="">
              </div>
              <div class="col-4 container_certification">
                <img class="img_certification img-fluid" src="../../imagen/certificacion3.png" alt="">
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 mt-3">
            <p class="text_general">
              Los elementos de nuestra oferta de valor concurren en la mejora continua de los
              distintos procesos que se desarrollan en nuestro sistema de gestión integral.
              La proactividad con la cual hemos enfocado la gestión, nos ha valido el otorgamiento
              de los certificados de los sistemas de gestión Calidad, Seguridad, Salud y Ambiente.
            </p>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-12 col-lg-6">
            <h2 class="titulos">DIVISIONES DE PRODUCTOS</h2>
            <p class="text_general">
              Eurochem es una empresa que provee soluciones confiables para el abastecimiento de productos químicos, la cual establece su compromiso de gestión integral a través de: <br><br>
              1. El mejoramiento continuo de los procesos para el desarrollo sostenible de la organización. <br> <br>
              2. El suministro de productos y la prestación de servicios que cumplan con los acuerdos establecidos con proveedores y clientes. <br> <br>
              3. La gestión y control  de los procesos para el cuidado del medio ambiente, la salud y la seguridad del personal.*2 <br> <br>
              4. El cumplimiento de los requisitos legales y reglamentarios aplicables.<br> <br>
              5. La formación y entrenamiento del personal con el fin de mantener un equipo competente para el cumplimiento de los objetivos.<br> <br>
              NOTAS: <br>
              *1  El desarrollo sostenible es el equilibrio entre los ámbitos económico, social y ambiental. <br> <br>
              *2 Protección del medio ambiente (programas y prácticas para evitar la contaminación u otros impactos/daños).  Protección de la seguridad y salud de todos (trabajadores directos/misión, contratistas, comunidad y visitantes) .
            </p>
          </div>
          <div class="col-12 col-lg-6 mt-4">
            <img class="img-fluid" src="../../imagen/certificacion4.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Seccion Actualidad -->
  <section class="container px-md-5 py-5">
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
                <img class="img-fluid" src="/admin/blog/img/<?php echo $imagen;?>">
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
