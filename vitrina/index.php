<?php
session_start();
include '../common/conexion.php';
include '../cambioDolar/index.php';
include '../common/datosGenerales.php';
if(isset($_SESSION['USER'])){
  $user=$_SESSION['USER'];
  $sql="SELECT * FROM FAVORITOS WHERE USERID='$user'";
  $result=$conn->query($sql);
  $array_favoritos=array();
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      array_push($array_favoritos,$row['MODELOID']);
    }
  }
}
//categorias
$sql="SELECT * FROM CATEGORIAS WHERE PADRE=0 AND ESTATUS=0;";
$id_categorias=array();
$categorias_padre=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_categorias,$row['IDCATEGORIA']);
    array_push($categorias_padre,$row['NOMBRE']);
  }
}
//marcas
$sql="SELECT * FROM MARCAS WHERE ESTATUS=0 LIMIT 8 ";
$id_marcas=array();
$nombres_marcas=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_marcas,$row['IDMARCA']);
    array_push($nombres_marcas,$row['NOMBREMARCA']);
  }
}
//Colores
$sql="SELECT * FROM COLOR LIMIT 16";
$id_colores=array();
$nombres_colores=array();
$hex_colores=array();
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    array_push($id_colores,$row['IDCOLOR']);
    array_push($nombres_colores,$row['COLOR']);
    array_push($hex_colores,$row['HEX']);
  }
}
$publicidad="¡Compra los mejores productos con nosotros!";
$publicidad2="¡Compra los mejores productos!";
#busqueda por categoria
if(isset($_GET['categ'])){$categoria=$_GET['categ'];}else{$categoria="";}
#busqueda con marca
if(isset($_GET['marca'])){$marca=$_GET['marca'];}else{$marca=NULL;}
#busqueda con color
if(isset($_GET['color'])){$color=$_GET['color'];}else{$color=NULL;}
#conseguir URL
$url=$_SERVER["REQUEST_URI"];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
  <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="<?php echo $root_folder;?>/admin/img/<?php echo $imageLogo;?>">
  <title><?php echo $nombrePagina;?></title>
  <link href="../css/new.css" rel="stylesheet">
  <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-8952175764108741",
      enable_page_level_ads: true
    });
  </script>
  <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body style="background-color:#f0f0f0;">
  <?php include '../common/menu.php';?>
  <?php include '../common/2domenu.php';?>
  <div class="container-fluid mb-3" style="background-color:#f0f0f0;">
    <div class="container text-center py-2" style="font-family: 'Playfair Display', serif;">
      <div class="row d-block d-sm-none">
        <h2 class="display-5"><?php echo $publicidad2;?></h2>
      </div>
      <div class="row d-none d-sm-block">
        <h2 class="display-5"><?php echo $publicidad;?></h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="d-none d-sm-block col-2">
        <div class="container">
          <h5 title="Revisar" data-toggle="tooltip">Filtros</h5>
          <hr class="d-none d-sm-block">
          <div class="row">
            <div class="col-12 d-none d-sm-block"><b>Categorias</b></div>
            <?php
            $x=count($id_categorias);
            for($i=0;$i<$x;$i++){
              $id_categ=$id_categorias[$i];
              $nombr_categ=$categorias_padre[$i];
              if($categoria==$id_categ){ ?>
                <div class="col-12 d-none d-sm-block active2"><small><a class="enlace2" href="index.php?categ=<?php echo $id_categ;?>"><?php echo $nombr_categ;?></a></small></div>
              <?php }else{ ?>
                <div class="col-12 d-none d-sm-block"><small><a class="enlace2" href="index.php?categ=<?php echo $id_categ;?>"><?php echo $nombr_categ;?></a></small></div>
              <?php } ?>
            <?php } ?>
          </div>
          <hr class="d-none d-sm-block">
          <div class="row">
              <div class="col-12 d-none d-sm-block"><b>Marca</b></div>
              <?php
              if(isset($_GET['categ'])){
                $cat_string="categ=$categoria";
              }else{
                $cat_string="";
              }
                $x=count($id_marcas);
                for($i=0;$i<$x;$i++){
                  $marca_array=$id_marcas[$i];
                  $nombre_marca=$nombres_marcas[$i];
                  if($marca==$marca_array){
                   ?>
                   <div class="col-12 d-none d-sm-block active2"><small><a class="enlace2" href="?<?php echo $cat_string;?>&marca=<?php echo $marca_array;?>"><?php echo $nombre_marca;?></a></small></div>
                  <?php }else{ ?>
                   <div class="col-12 d-none d-sm-block"><small><a class="enlace2" href="?<?php echo $cat_string;?>&marca=<?php echo $marca_array;?>"><?php echo $nombre_marca;?></a></small></div>
                  <?php } ?>
                <?php } ?>
            </div>
          <hr class="d-none d-sm-block">
          <div class="row mb-5">
              <div class="col-12 d-none d-sm-block"><b>Colores</b></div>
              <?php
                $x=count($id_colores);
                for($i=0;$i<$x;$i++){
                  $id_color=$id_colores[$i];
                  $nombre_color=$nombres_colores[$i];
                  $hex_color=$hex_colores[$i];
                  if($color==$id_color){
                   ?>
                    <div class="col-3 mt-2"><a href="?color=<?php echo $id_color;?>" title="<?php echo $nombre_color;?>" data-toggle="tooltip"><span class="dot4" style="background-color:<?php echo $hex_color;?>;"></span></a></div>
                  <?php }else { ?>
                    <div class="col-3 mt-2"><a href="?color=<?php echo $id_color;?>" title="<?php echo $nombre_color;?>" data-toggle="tooltip"><span class="dot3" style="background-color:<?php echo $hex_color;?>;"></span></a></div>
                  <?php } ?>
                <?php } ?>
            </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-10">
            <div class="container-fluid">
              <div class="row justify-content-between">
                <div class="col-auto align-self-center">
                  <b><span class="d-none d-sm-inline-block" id="cantidadProductos"></span></b>
                </div>
              </div>
              <div class="row">
                <?php
                $offset=0;
                $void=false;
                $numProd=4;
                $rand=rand();
                $total=0;
                while(!$void){
                  $sql="SELECT p.NOMBRE_P,p.PRECIO,m.IDMODELO,m.IMAGEN FROM PRODUCTOS p INNER JOIN MODELOS m ON p.IDPRODUCTO=m.IDPRODUCTO WHERE p.ESTATUS=0 ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
                  $filtro="WHERE p.ESTATUS=0 ";
                  #busqueda por genero
                  if(isset($_GET['genero']) && !empty($_GET['genero'])){
                    $filtro="AND p.GENERO=".$_GET['genero'];
                  }
                  #busqueda por categoria
                  if(isset($_GET['categ'])){
                    $filtro.="AND p.CATEGORIAID=".$_GET['categ'];
                  }
                  #busqueda por marca
                  if(isset($_GET['marca'])){
                    $filtro.=" AND p.MARCAID=".$_GET['marca'];
                  }
                  #busqueda por color
                  if(isset($_GET['color'])){
                    $filtro.=" AND m.COLOR1=".$_GET['color']." OR m.COLOR2=".$_GET['color'];
                  }
                  $sql="SELECT p.NOMBRE_P,p.PRECIO,m.IDMODELO,m.IMAGEN FROM PRODUCTOS p INNER JOIN MODELOS m ON p.IDPRODUCTO=m.IDPRODUCTO ".$filtro." ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
                  #busqueda por el buscador
                  if(isset($_GET['busqueda']) && !empty($_GET['busqueda'])){
                    $busqueda=$_GET['busqueda'];
                    $sql="SELECT p.NOMBRE_P,p.PRECIO,m.IDMODELO,m.IMAGEN FROM PRODUCTOS p INNER JOIN MODELOS m ON p.IDPRODUCTO=m.IDPRODUCTO WHERE p.NOMBRE_P LIKE '%$busqueda%' AND p.ESTATUS=0 ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
                  }
                  $result=$conn->query($sql);
                  $cant_products=$result->num_rows;
                  if($cant_products>0){
                    ?>
                    <article class="container px-2">
                      <div class="row">
                        <?php while($row=$result->fetch_assoc()){
                          $idmodelo=$row['IDMODELO'];
                          $titulo=$row['NOMBRE_P'];
                          $imagen=$row['IMAGEN'];
                          $precio=$row['PRECIO'];
                          ?>
                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 my-3">
                            <div class="container-img-product-vitrina vitrina-item-borde-top">
                              <a class="d-flex" href="detalles.php?idmodelo=<?php echo $idmodelo;?>">
                                <div class="imagen-vitrina-centrar">
                                  <img class="img-product-vitrina" src="../admin/inventario/img/<?php echo $imagen;?>" alt="<?php echo $titulo;?>">
                                </div>
                              </a>
                              <?php if(isset($_SESSION['ACCESO_USER'])){ ?>
                                <?php if(in_array($idmodelo,$array_favoritos)){$select="-select";$class="svg-heart-select";}else{$select="";$class="svg-heart";} ?>
                                <span class="favorito-vitrina-imagen<?php echo $select;?>" id="<?php echo $idmodelo;?>">
                                  <svg class="<?php echo $class;?>" width="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
                                </span>
                              <?php } ?>
                            </div>
                            <div class="pb-3 vitrina-item-borde-bottom" style="background-color:#ffffff;">
                              <a href="detalles.php?idmodelo=<?php echo $idmodelo;?>"><div class="title-product px-2" title="<?php echo $titulo;?>"><?php echo $titulo;?></div></a>
                              <div class="px-2 mt-2 precio-items">Bs. <?php echo number_format($precio*round($dolar),2, ',', '.');?></div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </article>
                    <?php
                    $offset=$offset+$numProd;
                    $total+=$cant_products;
                  }else{$void=true;}
                }
                ?>
              </div>
            </div>
          </div>
    </div>
  </div>
  <script>
    window.onload=function(){
      var cantidadProductos=<?php echo $total;?>;
      if(cantidadProductos==0){
        document.getElementById("cantidadProductos").innerHTML = "No se encontraron productos.";
      }else{
        document.getElementById("cantidadProductos").innerHTML = "Se encontraron <span class='text-muted'><?php echo $total;?> productos</span>.";
      }
      $(".container-img-product-vitrina").hover(function(e){
        $(this).find(".cantidad-vitrina-imagen").fadeIn(100);
        $(this).find(".favorito-vitrina-imagen").fadeIn(100);
      },function(e){
        $(this).find(".cantidad-vitrina-imagen").fadeOut(50);
        $(this).find(".favorito-vitrina-imagen").fadeOut(50);
      });
    };
  </script>
  <script>
    $(document).on('click',"span.favorito-vitrina-imagen",function(){
      var aux=$(this);
      var id=aux.attr("id");
      $.get('../ajax_favoritos.php',{id:id,e:1},v,'text');
      function v(r){
        aux.removeClass();
        aux.children("svg").removeClass();
        aux.addClass("favorito-vitrina-imagen-select");
        aux.children("svg").addClass("svg-heart-select");
      }
    });
    $(document).on('click',"span.favorito-vitrina-imagen-select",function(){
      var aux=$(this);
      var id=aux.attr("id");
      $.get('../ajax_favoritos.php',{id:id,e:2},v,'text');
      function v(r){
        aux.removeClass();
        aux.children("svg").removeClass();
        aux.addClass("favorito-vitrina-imagen");
        aux.children("svg").addClass("svg-heart");
      }
    });
  </script>
  <?php include '../common/footer.php';?>
  <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
