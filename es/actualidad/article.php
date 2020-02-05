<?php require '../common/conexion.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
  $id_articulo=$_GET['id'];
  $sql="SELECT * FROM ARTICLESBLOG WHERE IDARTICULO='$id_articulo' LIMIT 1";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $id_articulo=$row['IDARTICULO'];
      $titulo=ucwords($row['TITLE']);
      $descripcion=ucwords($row['DESCRIPTION']);
      $meta_description=substr($descripcion,0,150);
      $contenido=ucwords($row['CONTENT']);
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
  <link rel="icon" type="image/png" href="../images/favicon.png" />
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>
</head>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
<?php $section="blog";?>
 	<?php include '../common/menu.php'; include '../common/2domenu.php';?>
  <div class="container pb-4">
    <div class="row mt-5">
      <h2 class="titulos"><?php echo $titulo;?></h2>
    </div>
    <div class="row">
      <p class="contenido_blog"><?php echo $descripcion;?> </p>
    </div>
    <div class="row justify-content-center">
      <img class="img_blog_article" src="/admin/blog/img/<?php echo $imagen;?>" width="100%">
    </div>
    <div class="row">
      <p class="contenido_blog"><?php echo nl2br($contenido);?></p>
    </div>
  </div>
  <?php include '../common/footer.php';?>
  <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
