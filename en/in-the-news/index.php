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
$section="actualidad";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="desciption" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content=""/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/">
  <link rel="stylesheet" href="/css/style.css">
  <link href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/owlcarousel/owl.carousel.min.js"></script>
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
            <h2 class="titulos_blog lead">Search</h2>
          </div>
          <div class="col-12">
            <input type="search" name="" value="" placeholder="Search products...">
            <button type="button" name="button">Search</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h2 class="titulos_blog lead">Divisions</h2>
          </div>
          <div class="col-12 mt-2 mb-1">
            <a class="enlace_menu_lateral" href="">Food</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Specialty</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Commodities</a>
            <hr class="my-0">
          </div>
          <div class="col-12 my-1">
            <a class="enlace_menu_lateral" href="">Plastics</a>
            <hr class="my-0">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="container">
              <?php
              $sql="SELECT * FROM ARTICLESBLOG LIMIT $empezar_desde,$tamagno_paginas";
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
                   <div class="row mb-5">
                     <div class="col-12 col-md-6">
                       <div class="container-img-blog">
                         <a class="d-flex" href="article.php?id=<?php echo $id_articulo;?>">
                           <div class="imagen-blog">
                             <img class="img-blog" src="../admin/blog/img/<?php echo $imagen;?>">
                           </div>
                         </a>
                       </div>
                     </div>
                     <div class="col-12 col-md-6">
                       <div class="row">
                         <?php $stingDate=substr($fecha,8,2)." ".$array_meses[intval(substr($fecha,5,2))].", ".substr($fecha,0,4);?>
                         <small class="fecha_blog"><i><?php echo $stingDate;?></i></small><br>
                       </div>
                       <div class="row">
                         <h4 class="titulos_blog mt-3"><?php echo $titulo;?></h4>
                       </div>
                       <div class="row mt-2">
                         <p class="text-muted ">
                           <?php echo substr($contenido,0,335)."[...]";?>
                         </p>
                       </div>
                       <div class="row">
                         <a class="btn btn-primary px-5" href="article.php?id=<?php echo $id_articulo;?>">Ver más</a>
                       </div>
                     </div>
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
  <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
