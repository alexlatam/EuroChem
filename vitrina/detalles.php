<?php
session_start();
include '../common/conexion.php';
include '../cambioDolar/index.php';
include '../common/datosGenerales.php';
$array_favoritos=array();
if(isset($_SESSION['USER'])){
  $user=$_SESSION['USER'];
  $sql="SELECT * FROM FAVORITOS WHERE USERID='$user'";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      array_push($array_favoritos,$row['MODELOID']);
    }
  }
}
$lista_tallas='';
if(isset($_GET['idmodelo'])){
  $idmodelo=$_GET['idmodelo'];
  $sql="SELECT IDPRODUCTO,IMAGEN,COLOR1,COLOR2 FROM MODELOS WHERE IDMODELO='$idmodelo'";
  $res=$conn->query($sql);
  if($res->num_rows>0){
    while($f=$res->fetch_assoc()){
      $id_producto=$f['IDPRODUCTO'];
      $imagen=$f['IMAGEN'];
      $color1=$f['COLOR1'];
      $color2=$f['COLOR2'];
    }
  }
  $sql="SELECT NOMBRE_P,DESCRIPCION,PRECIO,CATEGORIAID,MARCAID,ESTATUS FROM PRODUCTOS WHERE IDPRODUCTO='$id_producto'";
  $res=$conn->query($sql);
  if($res->num_rows>0){
    while($f=$res->fetch_assoc()){
      $estatus=$f['ESTATUS'];
      $titulo=$f['NOMBRE_P'];
      $descripcion=$f['DESCRIPCION'];
      $precio=$f['PRECIO'];
      $id_categ=$f['CATEGORIAID'];
      $id_marca=$f['MARCAID'];
      $sql2="SELECT NOMBRE FROM CATEGORIAS WHERE IDCATEGORIA=$id_categ";
      $result2=$conn->query($sql2);
      if($result2->num_rows>0){
        while($row2=$result2->fetch_assoc()){$categ=$row2['NOMBRE'];}
      }
      $sql2="SELECT * FROM MARCAS WHERE IDMARCA=$id_marca";
      $res2=$conn->query($sql2);
      if($res2->num_rows>0){
        while($row2=$res2->fetch_assoc()){$nombre_marca=$row2['NOMBREMARCA'];}
      }
    }
  }
  //si el producto esta disponible busco todas las caracteristicas
  if($estatus==0){
    //total de cantidades, para ver si aun hay cantidades disponibles
    $cantidad_total_bd=0;
    //buscar las tallas del modelo
    $id_inventario=array();
    $id_tallas_stock=array();
    $cantidades_tallas=array();
    $sql="SELECT * FROM INVENTARIO WHERE IDMODELO=$idmodelo";
    $res=$conn->query($sql);
    if($res->num_rows>0){
      while($row=$res->fetch_assoc()){
        array_push($id_inventario,$row['IDINVENTARIO']);
        array_push($id_tallas_stock,$row['TALLAID']);
        array_push($cantidades_tallas,$row['CANTIDAD']);
        $cantidad_total_bd +=$row['CANTIDAD'];
      }
    }
    //buscar los nombres de las tallas
    $nombre_tallas=array();
    $id_tallas_bd=array();
    $sql="SELECT * FROM TALLAS";
    $res=$conn->query($sql);
    if($res->num_rows>0){
      while($row=$res->fetch_assoc()){
        array_push($nombre_tallas,$row['TALLA']);
        array_push($id_tallas_bd,$row['IDTALLA']);
      }
    }
    //verifico si el modelo tiene tallas con cantidades disponibles
    if($cantidad_total_bd==0){
      //en caso de que si, actualizo el estatus del producto, lo pauso.
      $sql="UPDATE `PRODUCTOS` SET `ESTATUS`=1 WHERE IDPRODUCTO='$id_producto';";
      if($conn->query($sql)===TRUE){header('Location: detalles.php?idmodelo='.$idmodelo);}
    }
  }
}else{header('Location: ../vitrina');}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
  <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="../admin/img/<?php echo $imageLogo;?>">
  <link rel="stylesheet" href="../css/new.css">
  <link rel="stylesheet" href="../admin/assets/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../admin/assets/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../admin/assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <title><?php echo $nombrePagina;?></title>
</head>
<body>
  <?php
  include '../common/menu.php';
  include '../common/2domenu.php';
  $sql='SELECT * FROM MODELOS WHERE IDMODELO='.$idmodelo;
  $res=$conn->query($sql);
  while($f=$res->fetch_assoc()){
    ?>
    <div class="container-fluid my-5">
      <div class="row mt-5">
        <div class="col-1">
          <div class="row justify-content-center">
            <div class="col-12">
              <!-- Otras fotos del mismo modelo-->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container-img-product-detalles">
            <img class="img-product-detalles" src="../admin/inventario/img/<?=$imagen?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="container-fluid">
            <?php if($estatus==1){ ?>
              <div class="row justify-content-center mb-2">
                <h3 class="lead"><strong>El producto no se encuentra disponible</strong> </h3>
              </div>
            <?php } ?>
            <div class="row">
              <div class="col-10">
                <p class="text-muted"><?=ucfirst($categ)?>
                </p>
                <h2 class="lead" style="font-size:30px;color:#3d3d3d;font-weight:500;"><?=$titulo?></h2>
              </div>
              <div class="col-2">
                  <?php if(isset($_SESSION['ACCESO_USER'])){ ?>
                    <?php if(in_array($idmodelo,$array_favoritos)){ ?>
                      <svg width="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fc0303" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
                    <?php } ?>
                  <?php } ?>
              </div>
              <div class="col-12 mb-4">
                <h3 class="lead d-inline" style="font-size:35px;color:#3d3d3d;font-weight:500;">Bs. <?=number_format($precio*round($dolar), '2', ',', '.')?></h3>
              </div>
            </div>
            <?php if($estatus==0){ ?>
              <div class="row">
                <div class="col-8 mb-2">
                  Selecciona la Talla
                </div>
                <div class="col-4 mb-2">
                  Cantidad
                </div>
              </div>
              <form action="../carrito/index.php" method="post" onsubmit="return validacion()">
                <div class="row">
                  <div class="col-5">
                    <select class="lista-talla" name="talla" id="tallas" onchange="talla_dis()" required>
                      <?php
                      for($i=0;$i<count($id_tallas_stock);$i++){
                        if($cantidades_tallas[$i]!=0){
                          ?>
                          <option value="<?php echo $id_tallas_stock[$i]."|".$id_inventario[$i];?>">
                            <?php
                            $key=array_search($id_tallas_stock[$i],$id_tallas_bd);
                            echo $nombre_tallas[$key];
                            ?>
                          </option>
                          <?php
                        }
                      } ?>
                    </select>
                  </div>
                  <div class="col-2 offset-3" id="cantidad">
                    <?php
                      $key=array_search($id_tallas_stock[0],$id_tallas_bd);
                      if($cantidades_tallas[$key]>10){$cantidad_real=10;}else{$cantidad_real=$cantidades_tallas[$key];}
                    ?>
                    <select class="lista-talla" name="cantidad" id="input_cantidad" required>
                      <?php for($i=1;$i<=$cantidad_real;$i++){ ?>
                        <option value="<?php echo $i;?>">
                          <?php echo $i;?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <button class="btn btn-outline-dark" type="submit" >AÑADIR AL CARRITO</button>
                  </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $idmodelo;?>">
              </form>
            <?php } ?>
            <hr>
            <div class="row">
              <div class="col-12">
                <small class="text-muted"><span class="text-dark">¿Deseas comprar mas de 12 piezas?</span><br>
                  Ponte en <a href="../info/contacto.php" target="_blank">contacto</a> con nosotros, y obtén las mejores ofertas.
                </small>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <small class="text-muted"><span class="text-dark">¿No encuentras lo que deseas?</span><br>
                  Ponte en <a href="../info/contacto.php" target="_blank">contacto</a> con nosotros, y consultanos por lo que estabas buscando. ¡Con mucho gusto te atenderemos!
                </small>
              </div>
            </div>
            <hr class="my-3">
            <div class="row mt-3">
              <div class="col-12">
                <small class="text-muted"><b>¿Como hacemos los envíos?</b><br>
                  Los Envíos lo hacemos mediante agencias de encomiendas. <a href="../info/index.php?id=2" target="_blank">Ver más</a>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="container mb-4">
        <hr>
        <h5 style="font-size:27px;font-weight:500;">
          Características del Producto
        </h5>
        <div class="row mt-4 align-items-end">
          <div class="col-auto text-muted" style="font-size:20px;font-weight:400;">
            Categoria:
          </div>
          <div class="col-auto" style="font-size:15px;font-weight:550;">
            <?=strtoupper ($categ)?>
          </div>
        </div>
        <div class="row mt-2 align-items-end">
          <div class="col-auto text-muted" style="font-size:20px;font-weight:400;">
            Marca:
          </div>
          <div class="col-auto" style="font-size:15px;font-weight:550;">
            <?=strtoupper ($nombre_marca)?>
          </div>
        </div>
        <h5 class="mb-4 mt-5" style="font-size:27px;font-weight:500;">
          Descripción del producto
        </h5>
        <div class="row pt-2">
          <div class="col-12" style="font-size:20px;font-weight:470;color:#5f5f5f;">
            <?=nl2br($descripcion)?>
          </div>
        </div>
      </div>
      <!-- Otros Productos -->
      <div class="container">
        <hr>
        <div class="row">
          <h4 style="font-size:30px;font-weight:500;">Tambien te puede interesar.</h4>
        </div>
        <div class="row">
          <?php
          $rand=rand();
          $sql="SELECT p.NOMBRE_P,p.PRECIO,m.IDMODELO,m.IMAGEN FROM PRODUCTOS p INNER JOIN MODELOS m ON p.IDPRODUCTO=m.IDPRODUCTO WHERE p.CATEGORIAID=$id_categ AND p.ESTATUS=0 ORDER BY Rand($rand) LIMIT 6";
          $result=$conn->query($sql);
          $cant_products=$result->num_rows;
          if($cant_products>0){
            ?>
            <article class="container my-3">
              <div class="row">
                <?php
                while($row=$result->fetch_assoc()){
                  $idmodelo_seg=$row['IDMODELO'];
                  $titulo_seg=$row['NOMBRE_P'];
                  $imagen_seg=$row['IMAGEN'];
                  $precio=$row['PRECIO'];
                  ?>
                  <div class="col-sm-4 col-md-3 col-lg-2 container-product">
                    <div class="container-img-product-secundarias">
                      <a href="detalles.php?idmodelo=<?php echo $idmodelo_seg;?>"><img class="img-product-secundarias" src="../admin/inventario/img/<?php echo $imagen_seg;?>" alt="<?php echo $titulo_seg;?>"></a>
                    </div>
                    <div class="pb-3" style="background-color:#ffffff;">
                      <a href="detalles.php?idmodelo=<?php echo $idmodelo_seg;?>"><div class="title-product px-2" title="<?php echo $titulo_seg;?>"><?php echo $titulo_seg;?></div></a>
                      <div class="px-2 mt-2 precio-items-secundarios">
                        Bs. <?php echo number_format($precio*round($dolar),2,',','.');?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </article>
          <?php } ?>
        </div>
      </div>
      <script>
        $(document).on('change','#tallas',function(){
          $("#input_cantidad").empty();
          var id_talla=$("#tallas").val().split('|')[0];
          var id_modelo=<?php echo $idmodelo;?>;
          $.get('ajax_cantidad.php',{id_talla:id_talla,id_modelo:id_modelo},verificar,'text');
          function verificar(respuesta){
            var aux=respuesta.split("%");
            if(aux[0]>10){var cantidad=10;}else{var cantidad=aux[0];}
            for(var i=1;i<=cantidad;i++){
              $("#input_cantidad").append("<option value='"+i+"'>"+i+"</option>")
            }
          }
        });
        </script>
  <?php } ?>
  <?php include '../common/footer.php'; ?>
  <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
