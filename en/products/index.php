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
    array_push($divisiones,$row['DIVISION_EN']);
  }
}
$section="products";
if(isset($_GET['products'])){
  $producto=$_GET['products'];
}else if(isset($_GET['industries'])){
  $industrias=$_GET['industries'];
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
<html lang="en">
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
      <!-- Navbar -->
      <?php include '../common/navbar.php'; ?>
      <div class="col-12 col-md-8 col-lg-9">
        <!-- Divisiones e industrias imagenes -->
        <?php if(isset($producto) && $producto==1){ ?>
          <div class="container mt-3">
            <div class="gallery_f_inner row imageGallery1">
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/divisiones/food.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_div=1">
                      <h4>Foods</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/divisiones/especialidades.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_div=2">
                      <h4>Specialty</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/divisiones/genericos.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_div=3">
                      <h4>Commodities</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/divisiones/plastico.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_div=4">
                      <h4>Plastics</h4>
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
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/adhesivos.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=1">
                      <h4>Adhesives and glues</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/construccion.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=3">
                      <h4>Building</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/farma.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=4">
                      <h4>Pharma and cosmetics</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/ingenios.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=5">
                      <h4>Sugar mills</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/petroleos.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=6">
                      <h4>Petroleum</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/telas.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=8">
                      <h4>Textile and garments</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/agro.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=9">
                      <h4>Agro</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/aseo.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=10">
                      <h4>Cleanliness</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/cuero.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=11">
                      <h4>Leather</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/impresion.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=12">
                      <h4>Printing</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/otras.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=13">
                      <h4>Other industries</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/plasticos.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=14">
                      <h4>Plastics</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/recubrimientos.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=15">
                      <h4>Coatings</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/tratamiento.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=16">
                      <h4>Water treatment</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/animal.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=17">
                      <h4>Animal feeding</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/comercializadores.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=18">
                      <h4>Marketers</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/industria.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=20">
                      <h4>Chemical industry</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/papel.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=21">
                      <h4>Paper and paperboard</h4>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 px-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="h_gallery_item">
                  <img src="/imagen/industrias/metal.jpg" alt="">
                  <div class="hover">
                    <a href="/en/products/index.php?id_ind=22">
                      <h4>Metal products</h4>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="row mb-2">
          <?php if(isset($_GET['id_div']) && $_GET['id_div']=="1"){ ?>
            <h1 class="text-danger">FOOD</h1>
          <p class="text-muted">
          EuroChem's Food Division is focused on serving the main sectors of the Food industry (Meat, Dairy, Beverages, Nutraceuticals, Sauces, etc.) and has a broad portfolio of ingredients aimed at improving attributes such as : texture, conservation, flavor, among others. We have a specialized technical and commercial team to provide comprehensive solutions to our clients in the improvement and development of their products. Our work is based on strategic alliances with prestigious production houses, which maintain the highest standards of quality, service, innovation and responsibility with the final consumer.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="2"){ ?>
          <p class="text-muted">
          <h1 class="text-danger">SPECIALTY</h1>
          We offer a comprehensive portfolio of chemical specialties for multiple industrial sectors, such as coatings, polymerization, formulators, cleaning, plastics, oils, construction, among others. Pigments, resins, formulation additives for coatings and surfactants for various applications stand out in our extensive range of products. We work with production houses recognized for their quality and technology. We have an applications laboratory that allows us to offer support in the approval, use of our products and advice in the development of formulations.
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="3"){ ?>
          <h1 class="text-danger">COMMODITIES</h1>
          <p class="text-muted">
          In this business division, Eurochemus brings together a wide range of chemical inputs for various industries, with a greater emphasis on coatings, cleaning, chemical intermediates manufacturing, food and beverages, adhesives and glues, textiles, oil, pharma, cosmetics, agriculture, construction , animal nutrition, leather and paper. The products of this division are presented in liquid and solid forms, they represent a broad spectrum of inorganic chemistry (acids, bases, salts, pigments, etc.) and organic chemistry (aliphatic, aromatic, chlorinated solvents, alcohols, ketones, acetates, anionic and nonionic surfactants, among others).
          </p>
        <?php }elseif(isset($_GET['id_div']) && $_GET['id_div']=="4"){ ?>
          <h1 class="text-danger">PLASTICS</h1>
          <p class="text-muted">
          We provide comprehensive solutions for the plastics industry, offering a broad portfolio of generic and specialized resins for transformation by injection, blowing, extrusion and expansion processes. We have suppliers that are our allies to bring customers a product with high quality standards, technical support and delivery opportunity.
          </p>
        <?php } ?>
        </div>
        <!-- Listado de productos-->
        <?php
        if($sql_ppal!=""){
          $result=$conn->query($sql_ppal);
          if($result->num_rows>0){
            ?>
            <div><h2 class="titulos">PRODUCTS</h2></div>
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
                  <a class='productos' href="details.php?id_prod=<?php echo $id_producto;?>"><?php echo $titulo;?></a>
                </b>
              </div>
                <div class="col-12 col-md-6 col-lg-6 text-muted">
                  <?php echo $subtitulo;?>
                </div>
                <div class="d-none d-lg-block col-sm-1">
                  <div class="row">
                  <small class= "text-primary">
                      <b>
                      Category
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
                        <a href="/en/products/index.php?id_div=<?php echo $id_division;?>"><small><?php echo $division;?></small></a>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
                <div class="col-6 col-sm-1">
                  <a class="btn btn-sm btn-outline-danger px-3" href="details.php?id_prod=<?php echo $id_producto;?>">See</a>
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
