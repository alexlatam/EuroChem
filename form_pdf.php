<?php include 'common/conexion.php';
$iscreated=0;
if(isset($_POST['producto'],$_POST['formula'],$_POST['nombre_comercial'],$_POST['peso_mol'],$_POST['sinonimos'],$_POST['descripcion'],$_POST['usos'],$_POST['pie_pagina'])){
  $id_producto=$_POST['producto'];
  $formula_quimica=$_POST['formula'];
  $nombre_comercial=$_POST['nombre_comercial'];
  $peso_mol=$_POST['peso_mol'];
  $sinonimos=$_POST['sinonimos'];
  $descripcion=$_POST['descripcion'];
  $usos=$_POST['usos'];
  $pie_pagina=$_POST['pie_pagina'];
  //insertar ficha Tecnicas
  $sql="INSERT INTO `FICHA_TECNICA` (`IDPRODUCTO`,`FORMULA`,`NOMBRE_COMERCIAL`,`PESO_MOLECULAR`,`SINONIMOS`,`DESCRIPCION`,`USOS`,`PIE_PAGINA`)
  VALUES ('$id_producto','$formula_quimica','$nombre_comercial','$peso_mol','$sinonimos','$descripcion','$usos','$pie_pagina')";
  if($conn->query($sql)===TRUE){$id_ficha_tecnica=mysqli_insert_id($conn);$iscreated=1;}else{$iscreated=2;}
  //tabla Especificaciones_tecnicas
  $propiedades=$_POST['propiedad'];
  $metodos=$_POST['metodo'];
  $unidades=$_POST['unidad'];
  $especificaciones=$_POST['especificacion'];
  for($i=0;$i<count($propiedades);$i++){
    $propiedad=$propiedades[$i];
    $metodo=$metodos[$i];
    $unidad=$unidades[$i];
    $especificacion=$especificaciones[$i];
    //insertar Especificaciones_tecnicas
    $sql="INSERT INTO `ESPECIFICACIONES_TECNICAS` (`IDFICHATECNICA`,`PROPIEDAD`,`METODO`,`UNIDAD`,`ESPECIFICACION`)
    VALUES ('$id_ficha_tecnica','$propiedad','$metodo','$unidad','$especificacion')";
    if($conn->query($sql)===TRUE){$iscreated=1;}else{$iscreated=2;}
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario - Pdf</title>
    <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Formulario </h1>
    </div>
    <form class="container" action="" method="post">
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Producto</span>
          </div>
          <select class="form-control" name="producto" id="select_p" required>
            <option value=""></option>
            <?php $sql="SELECT ID,TITULO FROM PRODUCTOS;";
            $result=$conn->query($sql);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_producto=$row['ID'];
                $titulo=$row['TITULO'];
                ?>
                <option value="<?php echo $id_producto;?>"><a target="_blank" href="<?php echo $url_temp;?>"><?php echo $titulo;?></a> </option>
                <?php
              }
            }
            ?>
          </select>
        </div>
        <span id="url_p"></span>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white">Formula Quimica</span>
          </div>
          <input type="text" class="form-control" name="formula" maxlength="100" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Nombre Comercial</span>
          </div>
          <input type="text" class="form-control" name="nombre_comercial" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white">Peso Molecular</span>
          </div>
          <input type="text" class="form-control" name="peso_mol" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Sinonimos</span>
          </div>
          <input type="text" class="form-control" name="sinonimos" required>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Descripcion</span>
          </div>
          <textarea class="form-control" name="descripcion" required></textarea>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white">Usos</span>
          </div>
          <textarea class="form-control" name="usos" required></textarea>
        </div>
      </div>
      <div class="row">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Pie de Pagina</span>
          </div>
          <input type="text" class="form-control" name="pie_pagina" required>
        </div>
      </div>
      <div class="container-fluid" id="contenedor_especif">
        <div class="row">
          <h4>Especificaicones Tecnicas</h4> <span class="col-auto ml-auto" style="cursor:pointer;" id="agregar_especf">Agregar Especificacion</span>
        </div>
        <div class="row">
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text">Propiedad</span>
            </div>
            <input type="text" class="form-control" name="propiedad[]">
          </div>
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text">Metodo</span>
            </div>
            <input type="text" class="form-control" name="metodo[]">
          </div>
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text bg-dark text-white">Unidad</span>
            </div>
            <input type="text" class="form-control" name="unidad[]">
          </div>
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text bg-dark text-white">Especificacion</span>
            </div>
            <input type="text" class="form-control" name="especificacion[]">
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center mb-3">
        <button class="btn btn-primary px-5" type="submit"> Enviar</button>
      </div>
    </form>
    <script>
      $(document).on('change','#select_p',function(){
        $("#url_p").empty();
        var id_producto=$(this).val();
        if (id_producto!="") {
          $.get('ajax_form.php',{id:id_producto},verificar,'text');
          function verificar(respuesta){
            $("#url_p").append("Enlace: <a target='_blank' href='"+respuesta+"'>"+respuesta+"</a>");
          }
        }
      });
      $(document).on('click','#agregar_especf',function(){
        $("#contenedor_especif").append("<hr><div class='row'><div class='input-group input-group-sm mb-3 col-6'><div class='input-group-prepend'><span class='input-group-text'>Propiedad</span></div><input type='text' class='form-control' name='propiedad[]'></div><div class='input-group input-group-sm mb-3 col-6'><div class='input-group-prepend'><span class='input-group-text'>Metodo</span></div><input type='text' class='form-control' name='metodo[]'></div><div class='input-group input-group-sm mb-3 col-6'><div class='input-group-prepend'><span class='input-group-text bg-dark text-white'>Unidad</span></div><input type='text' class='form-control' name='unidad[]'></div><div class='input-group input-group-sm mb-3 col-6'><div class='input-group-prepend'><span class='input-group-text bg-dark text-white'>Especificacion</span></div><input type='text' class='form-control' name='especificacion[]'></div></div>");
      });
    </script>
    <script>
      $(document).ready(function() {
        var creado=<?php echo $iscreated;?>;
        if(creado==1){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:3500});
          toast({type:'success',title:'¡Se ha creado Exitosamente!'})
        }else if (creado==2){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:3500});
          toast({type:'error',title:'¡Hubo un error! \n Inténtalo de nuevo'})
        }
      });
    </script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  </body>
</html>
