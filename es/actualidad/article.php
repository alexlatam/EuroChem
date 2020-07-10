<?php require '../common/conexion.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
  $id_articulo=$_GET['id'];
  $sql="SELECT * FROM ARTICLESBLOG WHERE IDARTICULO='$id_articulo' LIMIT 1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $id_articulo=$row['IDARTICULO'];
      $titulo=ucfirst(strtolower($row['TITLE']));
      $descripcion=ucfirst(strtolower($row['DESCRIPTION']));
      $meta_description=substr($descripcion,0,150);
      $contenido=ucfirst(strtolower($row['CONTENT']));
      $fecha=$row['DATE'];
      $imagen=$row['IMAGE'];
      $autor=$row['AUTOR'];
      $keywords=$row['KEYWORDS'];
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $meta_description;?>">
  <meta name="author" content="<?php echo $autor;?>">
  <meta name="news_keywords" content="<?php echo $keywords;?>"/>
  <title>EuroChem</title>
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
<?php $section="blog";?>
 	<?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container pb-4 px-5">
    <div class="row mt-5">
      <h2 class="titulos"><?php echo $titulo;?></h2>
    </div>
    <div class="row">
      <p class="contenido_blog"><?php echo $descripcion;?> </p>
    </div>
    <div class="row justify-content-center align-items-center">
      <img src="/admin/blog/img/<?php echo $imagen;?>">
    </div>
    <div class="row">
      <p class="contenido_blog"><?php echo nl2br($contenido);?></p>
    </div>
  </div>
  <!-- Seccion Actualidad -->
  <section class="container px-md-5 my-5 py-5">
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-duration="1000">
      <div class="col-md-8 text-center">
        <h2 class="mb-4 titulos">MÁS ARTÍCULOS DE ACTUALIDAD</h2>
        <p class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Noticias de interés, referentes a las industrias internacionales de mayor crecimiento.</p>
      </div>
    </div>
    <div class="row mt-4">
      <?php
      $sql="SELECT IDARTICULO,TITLE,CONTENT,DATE,IMAGE FROM ARTICLESBLOG WHERE NOT IDARTICULO='$id_articulo' LIMIT 3";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        $meses=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        while($row=$result->fetch_assoc()){
          $id_articulo=$row['IDARTICULO'];
          $titulo=ucfirst(strtolower($row['TITLE']));
          $contenido=ucfirst(strtolower($row['CONTENT']));
          if(strlen($titulo)>40){$titulo=substr($titulo,0,40)."...";}
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
                <p><?php echo substr($contenido,0,335)."[...]";?></p>
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
  <?php include '../common/footer.php';?>
  <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>
</body>
</html>
