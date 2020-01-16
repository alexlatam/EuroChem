<?php
session_start();
require '../../common/conexion.php';
$response=0;
$array_enlaces=array();
if(isset($_POST['array_enlaces'])){
  $array_enlaces=explode(",",$_POST['array_enlaces']);
}
$array_targets=array();
if(isset($_POST['array_targets'])){
  $array_targets=explode(",",$_POST['array_targets']);
}
//agrego la cantidad de fotos del banner en la tabla configuracion
if(isset($_POST['cantidadBanner'])){
  $atributo='cantidadBanner';
  $cantidadImages=$_POST['cantidadBanner'];
  $result=$conn->query("SELECT VALOR FROM CONFIGURACION WHERE `ATRIBUTO`='$atributo'");
  if($result->num_rows>0){
    $sql="UPDATE CONFIGURACION SET `VALOR`='$cantidadImages' WHERE `ATRIBUTO`='$atributo'";
  }else{
    $sql="INSERT INTO CONFIGURACION (ATRIBUTO,VALOR) VALUES ('$atributo','$cantidadImages')";
  }
  if($conn->query($sql)===TRUE){$response=1;}
}
if(isset($_FILES['images'])){
  //elimino las imagenes anteriores
  $result = $conn->query("SELECT * FROM IMAGENES WHERE `TIPO`='1'");
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $ruta_imagen=$row['URLIMAGEN'];
      unlink("../img/$ruta_imagen");
      $eliminar = $conn->query("DELETE FROM IMAGENES WHERE `URLIMAGEN`='$ruta_imagen';");
      if ($conn->query($sql) === TRUE) {}
    }
  }
  $img=$_FILES['images'];
  if(!empty($img)){
    $limite_kb=1000;
    $picture_ids='';
    $k=1;
      foreach($img["error"] as $key => $error){
      if($error==UPLOAD_ERR_OK){
        $tmp_name=$img["tmp_name"][$key];
        $name=basename($img["name"][$key]);
        $info=new SplFileInfo($name);
        $extension=$info->getExtension();
          if($extension=='jpg' || $extension=='jpge' || $extension=='png'){
            $name_aux='imageBanner'.$k;
            $nombre_new=$name_aux.'.'.$extension;
            $mover=move_uploaded_file($tmp_name,"../img/$nombre_new");
            if($mover){
              $response=1;
              //subir las imagenes a la base de datos
              if (isset($array_enlaces[($k-1)])){
                $enlace=$array_enlaces[($k-1)];
              }else{$enlace='';}
              if (isset($array_targets[($k-1)]) && $array_targets[($k-1)]=="_blank"){
                $target=$array_targets[($k-1)];
              }else{$target=$array_targets[($k-1)];}
              $tipo='1';
              $result = $conn->query("SELECT * FROM IMAGENES WHERE `URLIMAGEN` LIKE '$name_aux%'");
              if($result->num_rows>0){
                $row=$result->fetch_assoc();
                $old_name=$row['URLIMAGEN'];
                $old_ruta_imagen = strstr($old_name,'.', true);
                if($name_aux==$old_ruta_imagen){
                  $sql="UPDATE IMAGENES SET `URLIMAGEN`='$nombre_new',`ENLACE`='$enlace',`TARGET`=`$target` WHERE `TIPO`='$tipo' AND `URLIMAGEN`='$old_name'";
                }else{$response=0;}
              }else{
                $sql="INSERT INTO IMAGENES (URLIMAGEN,ENLACE,TIPO,TARGET) VALUES ('$nombre_new','$enlace','$tipo','$target')";
              }
              if($conn->query($sql)===TRUE){$response=1;}
            }else{$response=0;}
          }
      }
      if($k==$cantidadImages){break;}else{++$k;}
    }
  }
}
echo $response;
