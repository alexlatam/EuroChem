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
  <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/">
  <link rel="stylesheet" href="../assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
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
            <h2 class="titulos_blog lead">Búsqueda</h2>
          </div>
          <div class="col-12">
            <input type="search" name="" value="" placeholder="Buscar productos...">
            <button type="button" name="button">Buscar</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisiones</h2>
          </div>
          <div class="col-12 mt-2 mb-1">
            <a class="enlace_menu_lateral" href="">Alimentos</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Especialidades</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Genericos</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Plásticos</a>
            <hr class="my-0">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9 mt-2">
        <div class="row">
          <h2 class="titulos">Nuestra Compañía</h2>
        </div>
        <div class="row mt-4">
          <img src="../imagen/nuestra_compania_conquimica.jpg" alt="" width="100%">
        </div>
        <div class="row mt-4">
          <p class="text-muted text-justify">
            CONQUIMICA S.A. es una compañía 100% nacional fundada en el año de 1977,
            con el propósito de suministrar materias primas a la industria nacional.
            Desde entonces, nos hemos fortalecido como un aliado estratégico de empresas
            pertenecientes a diversas industrias, gracias a nuestro completo portafolio de
            productos, a los altos estándares de calidad, servicio, seguridad industrial y
            al establecimiento de relaciones perdurables con importantes proveedores
            nacionales e internacionales.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Misión</h4>
          <p class="text-muted text-justify">
            Proveer soluciones confiables para el abastecimiento de productos químicos. <br>
            Confiabilidad: Red amplia de proveedores nacionales e internacionales, personal
             con alto conocimiento de la industria química, sistemas de almacenamiento y
             transporte seguros y modernos, cumplimiento de los requerimientos acordados
             con el cliente, ejecución de los procesos en el marco del desarrollo sostenible.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Visión</h4>
          <p class="text-muted text-justify">
            Estar en los primeros lugares de liderazgo en la distribución
            de productos químicos en Colombia, al ser reconocida por la Gestión
            Integral* de los procesos, la amplia cobertura nacional de las operaciones,
            los altos niveles de servicio y la amplitud del portafolio de productos. <br>
            *Gestión Integral: procesos comprometidos con la Calidad, Seguridad, cuidado
            de la Salud y del medio Ambiente.
          </p>
        </div>
        <div class="row mt-4">
          <h4 class="titulos_blog">Valores Corporativos</h4>
        </div>
        <div class="row">
          <p class="text-muted">
            Honestidad <br>
            Respeto <br>
            Responsabilidad <br>
            Compromiso<br>
            Servicio
          </p>
        </div>
        <div class="row mt-4">
          <div class="col-12 col-md-6 px-0">
            <h4 class="titulos_blog">Logística</h4>
            <p class="text-muted text-justify">
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
          <div class="col-12 col-md-6">
            <img src="../imagen/nuestra_compania_logistica_conquimica.jpg" alt="" width="100%">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6">
            <img src="../imagen/nuestra_compania_transporte_conquimica.jpg" alt="" width="100%">
          </div>
          <div class="col-12 col-md-6 pl-3">
            <h4 class="titulos_blog">Transporte</h4>
            <p class="text-muted text-justify">
              60 vehículos de diversas especificaciones y categorías, carro-tanques,
              tractocamiones y camiones, para dar cumplimiento a las regulaciones de
              seguridad y manejo en cada una de las industrias: <br>
              – Transporte de producto a granel y empacado <br>
              – Decreto único 1079 de 2015 (antes Decreto 1609 de 2002):
              Transporte de mercancías peligrosas <br>
              – Decreto 3075 de 1997: Transporte de ingredientes y materias primas para el sector de alimentos. <br>
            </p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6">
            <h4 class="titulos_blog">Instalaciones</h4>
            <p class="text-muted text-justify">
              Actualmente contamos con 4 sedes ubicadas en las principales
              ciudades del país: Cali, Bogotá, Bucaramanga, Medellín, desde
              las cuales atendemos a todas las regiones. <br>
              Contamos en cada sede con bodegas adecuadas para el almacenamiento
              de nuestros productos y oficinas con personal idóneo para atender
              todos los requerimientos de nuestros clientes.
            </p>
          </div>
          <div class="col-12 col-md-6">
            <img src="../imagen/trabaja_nosotros.jpg" alt="" width="100%">
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
  <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
