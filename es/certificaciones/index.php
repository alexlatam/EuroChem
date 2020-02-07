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
  <title>Eurochem-Us</title>
</head>
<body style="background-color:#ffffff;">
  <?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container px-5">
    <div class="row px-4 mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-md-3 mt-2">
        <div class="row">
          <div class="col-12">
            <h2 class="titulos_blog lead">Búsqueda</h2>
          </div>
          <div class="col-12">
            <form action="/es/productos/index.php" method="get">
              <input type="search" name="search" placeholder="Buscar productos...">
              <button type="submit">Buscar</button>
            </form>
          </div>
        </div>
        <div class="row mt-4 pr-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisiones</h2>
          </div>
          <?php
          $sqld="SELECT * FROM DIVISIONES";
          $result=$conn->query($sqld);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $id_division=$row['ID'];
              $division=$row['DIVISION'];
              ?>
              <div class="col-12 mt-2 mb-1">
                <a class="enlace_menu_lateral" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                <hr class="my-0">
              </div>
              <?php
              }
            }
           ?>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="row">
          <div class="col-12 col-lg-6 mt-3">
            <img src="/imagen/certificacion.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-lg-6 mt-3">
            <p class="text-muted">
              Los elementos de nuestra oferta de valor concurren en la mejora continua de los
              distintos procesos que se desarrollan en nuestro sistema de gestión integral.
              La proactividad con la cual hemos enfocado la gestión, nos ha valido el otorgamiento
              de los certificados de los sistemas de gestión Calidad, Seguridad, Salud y Ambiente.
            </p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12 col-lg-6">
            <h4 class="text-muted"><strong>Política de Gestión Integral</strong></h4>
            <p class="text-muted">
              EuroChem S.A. es una empresa que provee soluciones confiables para el abastecimiento de productos químicos, la cual establece su compromiso de gestión integral a través de: <br>
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
          <div class="col-12 col-lg-6">
            <img src="/imagen/certificacion2.jpg" alt="">
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
  <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
