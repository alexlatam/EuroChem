<?php require '../common/conexion.php';
if(isset($_GET['page'])){
  if($_GET['page']==1){
    header('Location: index.php');
  }else{
    $page=$_GET['page'];
  }
}else{
  $page=1;
}
$tamagno_paginas=12;
$empezar_desde=($page-1)*$tamagno_paginas;
$sql="SELECT * FROM articlesblog";
$result=$conn->query($sql);
$rows=$result->num_rows;
$total_paginas=ceil($rows/$tamagno_paginas);
$array_meses=array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BALITA</title>
  <link rel="icon" type="image/png" href="../images/favicon1.png"/>
  <!-- For iPhone 4 Retina display:
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-icon-114x114.png">
  <!-- For iPad:
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-icon-72x72.png">
  <!-- For iPhone:
  <link rel="apple-touch-icon-precomposed" href="images/apple-icon-57x57.png"> -->
  <link rel="stylesheet" type="text/css" href="../libraries/lib.css">
  <link rel="stylesheet" type="text/css" href="../libraries/Stroke-Gap-Icon/stroke-gap-icon.css">
  <link rel="stylesheet" type="text/css" href="../css/plugins.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation-menu.css">
  <link rel="stylesheet" type="text/css" href="../libraries/lightslider-master/lightslider.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../css/shortcode.css">
  <link rel="stylesheet" type="text/css" href="../css/gallery.css">
  <!--[if lt IE 9]>
  <script src="js/html5/respond.min.js"></script>
  <![endif]-->
</head>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
<?php $seccion="blog";?>
 	<div id="site-loader" class="load-complete">
 		<div class="loader">
 			<div class="loader-inner ball-clip-rotate">
 				<div></div>
 			</div>
 		</div>
 	</div>
 	<header class="header-main container-fluid no-padding">
 		<div class="top-header container-fluid no-padding">
 			<div class="container">
 				<div class="row">
 					<div class="col-md-4 col-sm-4 col-xs-6 social">
 						<ul>
 							<li><a title="Facebook" href="https://Facebook.com/balita" target="_blank"><i class="fa fa-facebook"></i></a></li>
 							<li><a title="Twitter" href="#"><i class="fa fa-twitter" target="_blank"></i></a></li>
 							<li><a title="Instagram" href="#"><i class="fa fa-linkedin" target="_blank"></i></a></li>
 						</ul>
 					</div>
 					<div class="col-md-4 col-sm-4 col-xs-6 register" style="text-align: right;">
 						<a href="../catalogo/catalogo2020.pdf"  target="_blank" title="Catálogo">Catálogo 2020</a>
 						<a href="../en/index.php" title="Idioma">English</a>
 					</div>
 					<div class="col-md-4 col-sm-4 col-xs-12 logo-block">
 						<a href="../index.php" title="Logo">
 							<img src="../images/logo-balita-3.png" alt="logo" height="70px"/>
 						</a>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="menu-block container-fluid no-padding">
 			<div class="container">
 				<a class="user" title="Menú">
 					<i class="fa fa-navicon"></i>
 				</a>
 				<div class="menu-search">
 					<div id="sb-search" class="sb-search">
 						<form>
 							<input class="sb-search-input" />
 							<button class="sb-search-submit">
 						</form>
 					</div>
 				</div>
 				<div class="col-md-10 col-sm-12">
 					<nav class="navbar ow-navigation">
 						<div class="navbar-header">
 							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
 								<span class="sr-only">Toggle navigation</span>
 								<span class="icon-bar"></span>
 								<span class="icon-bar"></span>
 								<span class="icon-bar"></span>
 							</button>
 							<a title="Logo" href="#" class="navbar-brand"><img src="../images/logo-balita-3.png" alt="logo"/><span></span></a>
 						</div>
 						<div class="navbar-collapse collapse" id="navbar">
 							<ul class="nav navbar-nav menubar">
 								<li><a title="Home" href="../index.php">HOME</a></li>
 								<li><a title="Empresa" href="../empresa.php">NOSOTROS</a></li>
 								<li><a title="Calidad" href="../calidad.php">CALIDAD</a></li>
 								<li ><a title="Proyectos" href="../proyectos.php">PROYECTOS</a></li>
                <li class="dropdown">
                  <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Productos" href="../productos.php">PRODUCTOS</a>
                  <i class="ddl-switch fa fa-angle-down"></i>
                  <ul class="dropdown-menu">
                  </ul>
                </li>
 								<li class="active"><a title="Blog" href="index.php">BLOG</a></li>
 								<li <?php if ($seccion=='contacto') echo 'class="active"' ?>><a title="Contacto" href="contacto.php">CONTACTANOS</a></li>
 							</ul>
 						</div>
 					</nav>
 				</div>
 			</div>
 		</div>
 	</header>
	<div class="container-fluid page-banner blogpost no-padding">
		<div class="section-padding"></div>
			<div class="container">
				<div class="banner-content-block">
					<div class="banner-content">
						<h3>BLOG</h3>
						<ol class="breadcrumb">
							<li><a href="../index.php">Home</a></li>
							<li class="active">BLOG</li>
						</ol>
					</div>
				</div>
			</div>
		<div class="section-padding"></div>
	</div>
  <div class="container" style="margin-top:15px;">
        <?php
        $sql="SELECT * FROM articlesblog LIMIT $empezar_desde,$tamagno_paginas";
        $result=$conn->query($sql);
        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            $id_articulo=$row['IDARTICULO'];
            $titulo=ucwords($row['TITLE']);
            $descripcion=ucwords($row['DESCRIPTION']);
            $contenido=ucfirst($row['CONTENT']);
            $fecha=$row['DATE'];
            $imagen=$row['IMAGE'];
            $autor=$row['AUTOR'];
             ?>
             <div class="col-12 col-sm-6 col-md-4" style="margin-top:25px;">
               <div class="container-img-blog">
                 <a class="d-flex" href="article.php?id=<?php echo $id_articulo;?>">
                   <div class="imagen-blog">
                     <img class="img-blog" src="../admin/blog/img/<?php echo $imagen;?>">
                   </div>
                 </a>
               </div>
               <?php $stingDate=substr($fecha,8,2)." ".$array_meses[intval(substr($fecha,5,2))].", ".substr($fecha,0,4);?>
               <small class="fecha_blog"><i><?php echo $stingDate;?></i></small><br>
               <a class="title_blog" href="article.php?id=<?php echo $id_articulo;?>">
                 <strong title="<?php echo $titulo;?>"><?php echo strtoupper($titulo);?></strong>
               </a>
               <br>
               <p class="contenido_blog_vitrina">
                 <?php echo substr($contenido,0,350)."...";?>
               </p>
               Por <a class="autor_blog" href="#"><?php echo $autor;?></a>
             </div>
              <?php
            }
          }
         ?>
  </div>
  <!-- Paginacion -->
  <section class="text-center">
    <?php for($i=1;$i<=$total_paginas;$i++){ ?>
      <?php if($page>5){
        $inicio=$page-2;
        $final=$page+2;
        ?>
        <a class="btn btn-link btn-sm ml-2 text_paginacion" href="?page=<?php echo ($inicio-1);?>">...</a>
        <?php
        for($i=$inicio;$i<$final;$i++){
          if($page==$i){ ?>
            <a class="btn btn-link btn-sm ml-2 text_paginacion_active" href="?page=<?php echo $i;?>"><?php echo $i;?></a>
          <?php }elseif($i>$total_paginas){
            break 2;
            }else { ?>
            <a class="btn btn-link btn-sm ml-2 text_paginacion" href="?page=<?php echo $i;?>"><?php echo $i;?></a>
          <?php } ?>
        <?php } ?>
        <?php if($i<$total_paginas){ ?>
          <a class="btn btn-link btn-sm ml-2 text_paginacion" href="?page=<?php echo ($final+1);?>">...</a>
        <?php } ?>
        <?php break; ?>
      <?php }else{ ?>
        <?php if($i>5){ ?>
          <a class="btn btn-link btn-sm ml-2 text_paginacion" href="?page=<?php echo $i;?>">...</a>
          <?php break; ?>
        <?php }else{ ?>
          <?php if($page==$i){ ?>
            <a class="btn btn-link btn-sm ml-2 text_paginacion_active" href="?page=<?php echo $i;?>"><?php echo $i;?></a>
          <?php }else{ ?>
            <a class="btn btn-link btn-sm ml-2 text_paginacion" href="?page=<?php echo $i;?>"><?php echo $i;?></a>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  </section>
  <footer class="footer-main container-fluid no-padding" style="margin-top: 50px;">
    <div class="container">
      <div class="row">
        <aside class="col-md-3 col-sm-6 col-xs-6 widget widget_customer_services">
          <img src="../images/logobalita.png" alt="logo" height="70px"/>
        </aside>
        <aside class="col-md-5 col-sm-6 col-xs-6 widget widget_contactus">
          <h3 class="block-title">CONTACTANOS</h3><hr>
          <div class="contactinfo-box">
            <i class="fa fa-map-marker"></i> <p>C/ Castellón de la Plana, 10, Local Bajo, C.P.: 03660. Novelda, Alicante (ESPAÑA).</p>
          </div>
          <div class="contactinfo-box">
            <i class="fa fa-phone"></i>
            <p><a title="+34966272813" href="tel:+34966272813"> (+34) 966 272 813</a></p>
          </div>
          <div class="contactinfo-box">
            <i class="fa fa-envelope-o"></i>
            <p><a href="mailto:info@cremamarfil.es" title="info@cremamarfil.es"> info@cremamarfil.es</a></p>
          </div>
        </aside>
        <aside class="col-md-4 col-sm-6 col-xs-6 widget widget_newsletter">
          <h3 class="block-title">Redes Sociales</h3><hr>
          <ul>
            <li><a title="Facebook" data-toggle="tooltip" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a title="Twitter" data-toggle="tooltip" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a title="Linkedin" data-toggle="tooltip" href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </aside>
      </div>
    </div>
    <div class="container">
      <div class="footer-menu">
        <div class="copyrights ow-pull-left">
          <p>&copy; 2020 | All rights reserved.</p>
        </div>
        <nav class="navbar ow-navigation ow-pull-right">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar2" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar2">
            <ul class="nav navbar-nav">
              <li><a title="Home" href="../index.php">Home</a></li>
                <li><a title="Empresa" href="../empresa.php">NOSOTROS</a></li>
                <li><a title="Calidad" href="../calidad.php">CALIDAD</a></li>
                <li><a title="Proyectos" href="../proyectos.php">PROYECTOS</a></li>
                <li><a title="Productos" href="../productos.php">PRODUCTOS</a></li>
                <li><a title="Productos" href="index.php">BLOG</a></li>
                <li><a title="Contacto" href="../contacto.php">CONTACTANOS</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </footer>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/gallery.js"></script>
	<script src="../libraries/lib.js"></script>
	<script src="../libraries/jquery.countdown.min.js"></script>
	<script src="../libraries/lightslider-master/lightslider.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn3Z6i1AYolP3Y2SGis5qhbhRwmxxo1wU"></script>
	<script src="../js/functions.js"></script>
</body>
</html>
