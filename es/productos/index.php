<?php
session_start();
include '../common/conexion.php';
//divisiones
$sql="SELECT * FROM DIVISIONES";
$id_divisiones=array();
$divisiones=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_divisiones,$row['ID']);
    array_push($divisiones,$row['DIVISION']);
  }
}
$section="productos";
if(isset($_GET['productos'])){
  $producto=$_GET['productos'];
}else if(isset($_GET['industrias'])){
  $industrias=$_GET['industrias'];
}
$sql_ppal="";
if(isset($_GET['id_div'])){
  $id_division_get=$_GET['id_div'];
  $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDDIVISION=$id_division_get ";
  if(isset($_GET['id_ind'])){
    $id_industria_get=$_GET['id_ind'];
    $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p INNER JOIN PRODUCTOS_INDUSTRIAS i ON p.ID=i.IDPRODUCTO WHERE p.IDDIVISION=$id_division_get AND i.IDINDUSTRIA=$id_industria_get ";
  }
}
if(isset($_GET['id_ind'])){
  $id_industria_get=$_GET['id_ind'];
  if($sql_ppal==""){
    $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p INNER JOIN PRODUCTOS_INDUSTRIAS i ON p.ID=i.IDPRODUCTO WHERE i.IDINDUSTRIA=$id_industria_get ";
  }
}
if(isset($_GET['id_tipo'])){
  $id_tipo_producto_get=$_GET['id_tipo'];
  if($sql_ppal!=""){
    $sql_ppal.="AND p.IDTIPOPRODUCTO=$id_tipo_producto_get";
  }else{
    $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDTIPOPRODUCTO=$id_tipo_producto_get";
  }
}
if(isset($_GET['id_unid'])){
  $id_unidad_get=$_GET['id_unid'];
  $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDUNIDAD=$id_unidad_get";
}elseif (isset($_GET['id_pres'])) {
  $id_presentacion_get=$_GET['id_pres'];
  $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.IDPRESENTACION=$id_presentacion_get";
}elseif (isset($_GET['search'])){
  $search=$_GET['search'];
  $sql_ppal="SELECT p.IDDIVISION,p.ID,p.TITULO,p.SUBTITULO FROM PRODUCTOS p WHERE p.TITULO LIKE '%$search%' OR p.SUBTITULO LIKE '%$search%' OR p.DESCRIPCION LIKE '%$search%'";
}
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
  <div class="container px-5 pb-4">
    <div class="row mt-3">
      <!-- Menu lateral -->
      <div class="col-12 col-md-4 col-lg-3 mt-2">
        <div class="row pr-4">
          <div class="col-12 d-md-block d-none">
            <h2 class="titulos_blog lead">BUSCADOR</h2>
          </div>
          <div class="col-12">
            <form action="" method="get">
              <div class="row">
                <div class="col-12 px-1 mb-2 mt-3">
                  <div class="input-group">
                    <input type="text" class="input_search form-control" name="search" placeholder="Buscar" >
                    <div class="input-group-append">
                      <button class="btn btn-danger input_search" type="submit"><i class="fas fa-search mx-2"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-4 pr-4">
          <div class="col-10">
            <h2 class="titulos_blog lead">DIVISIONES </h2>
          </div>
          <div class="col-2">
          <h2 class="titulos_blog lead">
            <a onclick="mostrar_divisiones()" class="text-primary cursor" id="mas-division" type="button"  <?php if (isset($_GET['id_div'])){ echo 'style="display:none"';} ?>> <i class="fas fa-plus-circle"></i></a>
            <a onclick="ocultar_divisiones()" class="text-danger cursor" id="menos-division" type="button" <?php if (!isset($_GET['id_div'])){ echo 'style="display:none"';}  ?>><i class="fas fa-minus-circle"></i></a>
          </h2>
          </div>
          <?php
          $sqld="SELECT * FROM DIVISIONES";
          $result=$conn->query($sqld);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $id_division=$row['ID'];
              $division=$row['DIVISION'];
                if($id_division_get==$id_division){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active division"   <?php if (!isset($_GET['id_div'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1 division" <?php if (!isset($_GET['id_div'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral" href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><?php echo $division;?></a>
                  </div>
                  <?php
                }
              }
            }
           ?>
        </div>
        <hr class="text-muted">
        <div class="row mt-4 pr-4">
            <div class="col-10">
              <h2 class="titulos_blog lead">INDUSTRIAS</h2>
            </div>
            <div class="col-2">
            <h2 class="titulos_blog lead">
              <a onclick="mostrar_industrias()" class="text-primary cursor" id="mas-industria" type="button" <?php if (isset($_GET['id_ind'])){ echo 'style="display:none"';}?>><i class="fas fa-plus-circle"></i></a>
              <a onclick="ocultar_industrias()" class="text-danger cursor" id="menos-industria" type="button" <?php if (!isset($_GET['id_ind'])){ echo 'style="display:none"';}?>><i class="fas fa-minus-circle"></i></a>
            </h2>
            </div>
            <?php
            $sqld="SELECT * FROM INDUSTRIAS";
            $result=$conn->query($sqld);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_industria=$row['ID'];
                $industria=$row['INDUSTRIA'];
                $complemento_enlace="?id_ind=$id_industria";
                if(isset($_GET['id_div'])){
                  $complemento_enlace.="&id_div=$id_division_get";
                }
                if(isset($_GET['id_tipo'])){
                  $complemento_enlace.="&id_tipo=$id_tipo_producto_get";
                }
                if($id_industria_get==$id_industria){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active industria" <?php if (!isset($_GET['id_ind'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $industria;?></a>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1 industria" <?php if (!isset($_GET['id_ind'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $industria;?></a>
                  </div>
                  <?php
                }
              }
            }
            ?>
        </div>
        <hr class="text-primary my-1">
        <?php if (isset($_GET['id_div']) || isset($_GET['id_ind']) || isset($_GET['id_tipo'])): ?>
        <div class="row mt-4 pr-4">
            <div class="col-10">
              <h2 class="titulos_blog lead">TIPOS DE PRODUCTOS</h2>
            </div>
            <div class="col-2">
            <h2 class="titulos_blog lead">
              <a onclick="mostrar_tipos()" class="text-primary cursor" id="mas-tipo" type="button" <?php if (isset($_GET['id_tipo'])){ echo 'style="display:none"';}?>><i class="fas fa-plus-circle"></i></a>
              <a onclick="ocultar_tipos()" class="text-danger cursor" id="menos-tipo" type="button" <?php if (!isset($_GET['id_tipo'])){ echo 'style="display:none"';}?>><i class="fas fa-minus-circle"></i></a>
            </h2>
            </div>
            <?php
            $sqld="SELECT * FROM TIPO_PRODUCTOS";
            $result=$conn->query($sqld);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_tipo_producto=$row['ID'];
                $tipo_producto=$row['TIPO_PRODUCTO'];
                $complemento_enlace="?id_tipo=$id_tipo_producto";
                if(isset($_GET['id_div'])){
                  $complemento_enlace.="&id_div=$id_division_get";
                }
                if(isset($_GET['id_ind'])){
                  $complemento_enlace.="&id_ind=$id_industria_get";
                }
                if($id_tipo_producto_get==$id_tipo_producto){
                  ?>
                  <div class="col-12 mt-2 mb-1 div_menu_lateral_active tipo" <?php if (!isset($_GET['id_tipo'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral_active" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $tipo_producto;?></a>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="col-12 mt-2 mb-1 tipo" <?php if (!isset($_GET['id_tipo'])){ echo 'style="display:none"';}?>>
                    <a class="enlace_menu_lateral" href="/es/productos/index.php<?php echo $complemento_enlace;?>"><?php echo $tipo_producto;?></a>
                  </div>
                  <?php
                }
              }
            }
            ?>
        </div>
        <hr class="text-muted">
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-8 col-lg-9">
        <!-- Divisiones e industrias imagenes -->
        <?php if(isset($producto) && $producto==1){ ?>
          <div class="container mt-3">
            <div class="gallery_f_inner row">
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/divisiones/food.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_div=1">
                      <h4>Alimentos</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/divisiones/especialidades.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_div=2">
                      <h4>Especialidades</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/divisiones/genericos.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_div=3">
                      <h4>Genéricos</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/divisiones/plastico.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_div=4">
                      <h4>Plásticos</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }else if(isset($industrias) && $industrias==1){ ?>
          <div class="container mt-3">
            <div class="gallery_f_inner row imageGallery1">
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/adhesivos.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=1">
                      <h4>Adhesivos y pegantes</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/construccion.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=3">
                      <h4>Construcción y vías</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/farma.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=4">
                      <h4>Farma y cosmética</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/ingenios.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=5">
                      <h4>Ingenios</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/petroleos.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=6">
                      <h4>Petróleos</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/telas.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=8">
                      <h4>Textil y prendas</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/agro.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=9">
                      <h4>Agro</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/aseo.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=10">
                      <h4>Aseo</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/cuero.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=11">
                      <h4>Cuero</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/impresion.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=12">
                      <h4>Impresión</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/otras.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=13">
                      <h4>Otras industrias</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/plasticos.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=14">
                      <h4>Plásticos</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/recubrimientos.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=15">
                      <h4>Recubrimientos</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/tratamiento.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=16">
                      <h4>Tratamiento de aguas</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/animal.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=17">
                      <h4>Alimentación animal</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/comercializadores.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=18">
                      <h4>Comercializadores</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/industria.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=20">
                      <h4>Industria Química</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/papel.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=21">
                      <h4>Papel y Cartón</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item2">
                  <img src="/imagen/industrias/metal.jpg" alt="">
                  <div class="hover">
                    <a href="/es/productos/index.php?id_ind=22">
                      <h4>Productos de metal</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="row mb-2 p-2 p-sm-4" style= "place-content: center;">
          <?php if(isset($_GET['id_div']) && $_GET['id_div']=="1"){ ?>
            <h1 class="text-danger">ALIMENTOS</h1>
          <p class="text-muted text-justify">
            La División de Alimentos de EuroChem está enfocada en la atención de los principales sectores de la industria de Alimentos (Cárnicos, Lácteos, Bebidas, Nutracéuticos, Salsas, etc.) y cuenta con un amplio portafolio de ingredientes dirigidos a la mejora de atributos tales como: textura, conservación, sabor, entre otros. Disponemos de un equipo técnico y comercial especializado para proporcionar soluciones integrales a nuestros clientes en el mejoramiento y desarrollo de sus productos. Nuestra labor se fundamenta en las alianzas estratégicas con prestigiosas casas productoras, las cuales mantienen los más altos estándares de calidad, servicio, innovación y responsabilidad con el consumidor final.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="2"){ ?>
          <h1 class="text-danger">ESPECIALIDADES</h1>
          <p class="text-muted text-justify">
            Ofrecemos un portafolio integral de especialidades químicas para múltiples sectores industriales, como recubrimientos, polimerización, formuladores, aseo, plásticos, petróleos, construcción, entre otros. En nuestra extensa gama de productos se destacan pigmentos, resinas, aditivos de formulación para recubrimientos y tensoactivos para variadas aplicaciones. Trabajamos con casas productoras reconocidas por su calidad y tecnología. Contamos con un laboratorio de aplicaciones que nos permite ofrecer acompañamiento en la homologación, uso de nuestros productos y asesoría en el desarrollo de formulaciones.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="3"){ ?>
          <h1 class="text-danger">GENÉRICOS</h1>
          <p class="text-muted text-justify">
            En esta división de negocios, EuroChem agrupa una amplia oferta de insumos químicos para diversas industrias, con mayor énfasis en recubrimientos, aseo, fabricación de intermediarios químicos, alimentos y bebidas, adhesivos y pegantes, textiles, petróleos, farma, cosméticos, agro, construcción, nutrición animal, cuero y papel. Los productos de esta división se presentan en formas líquidas y sólidas, representan un amplio espectro de la química inorgánica (ácidos, bases, sales, pigmentos, etc.) y de la química orgánica (solventes alifáticos, aromáticos, clorados, alcoholes, cetonas, acetatos, tensoactivos aniónicos y no iónicos, entre otros).
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="4"){ ?>
          <h1 class="text-danger">PLÁSTICOS</h1>
          <p class="text-muted text-justify">
            Proveemos soluciones integrales para la industria del plástico, ofreciendo un amplio portafolio de resinas genéricas y especializadas para la transformación por procesos de inyección, soplado, extrusión y expansión. Contamos con proveedores que son nuestros aliados para llevar a los clientes un producto con altos estándares de calidad, soporte técnico y oportunidad en la entrega.
          </p>
        <?php } ?>
        </div>
        <!-- Listado de productos-->
        <?php
        if($sql_ppal!=""){
          $result=$conn->query($sql_ppal);
          if($result->num_rows>0){
            ?>
            <div><h2 class="titulos">PRODUCTOS</h2></div>
            <?php
            while($row=$result->fetch_assoc()){
              $id_producto=$row['ID'];
              $titulo=$row['TITULO'];
              $subtitulo=$row['SUBTITULO'];
              $id_division_bd=$row['IDDIVISION'];
              ?>
              <div class="row mb-2 align-items-center">
                <div class="col-sm-10 col-md-4 col-lg-4">
                  <b>
                    <a class='productos' href="detalles.php?id_prod=<?php echo $id_producto;?>"><?php echo $titulo;?></a>
                  </b>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-muted">
                  <?php echo $subtitulo;?>
                </div>
                <div class="d-none d-lg-block col-sm-1">
                  <div class="row">
                    <small class= "text-primary">
                      <b>
                        Categoria
                      </b>
                      </small>
                  </div>
                  <?php
                  $sqlaux="SELECT IDDIVISION FROM PRODUCTOS WHERE ID=$id_producto";
                  $resultaux=$conn->query($sqlaux);
                  if($resultaux->num_rows>0){
                    while($rowaux=$resultaux->fetch_assoc()){
                      $id_division=$rowaux['IDDIVISION'];
                      $key=array_search($id_division,$id_divisiones);
                      $division=$divisiones[$key];
                      ?>
                      <div class="row">
                        <a href="/es/productos/index.php?id_div=<?php echo $id_division;?>"><small><?php echo $division;?></small></a>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
                <div class="col-6 col-sm-1">
                  <a class="btn btn-sm btn-outline-danger px-3" href="detalles.php?id_prod=<?php echo $id_producto;?>">Ver</a>
                </div>
                <div class="col-4"></div>
                <div class="col-8 px-0 pt-3">
                  <hr class="bg-muted m-0 mb-2">
                </div>
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
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
