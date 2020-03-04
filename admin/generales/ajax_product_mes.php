<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_FILES['product'])){
  //elimino la imagen anterior
  $result = $conn->query("SELECT VALOR FROM CONFIGURACION WHERE `ATRIBUTO`='productoMes'");
  if($result->num_rows>0) {
    $row=$result->fetch_assoc();
    $ruta_imagen=$row['VALOR'];
    unlink("../../imagen/$ruta_imagen");
  }
    $limite_kb=1000;
    if ($_FILES["product"]["size"]<= $limite_kb*1024){
      $valid_extensions = array("jpeg", "jpg", "png");
      $ruta='../../imagen/';
      $extension = substr(strrchr($_FILES["product"]["name"], "."), 1);
      $name_archivo='producto_mes.'.$extension;
      $archivo=$ruta.$name_archivo;
      if((($_FILES["product"]["type"]=="image/png") || ($_FILES["product"]["type"]=="image/jpg") || ($_FILES["product"]["type"]=="image/jpeg")) && in_array($extension,$valid_extensions)){
        $resultado=move_uploaded_file($_FILES["product"]["tmp_name"],$archivo);
        if($resultado){$response=1;}else{$response=3;}
      }else{$response=4;}
    }else{$response=5;}
    if ($response==1) {
      $atributo='productoMes';
      //Consulto si la imagen ya estaba cargada en la BD
      $result = $conn->query("SELECT * FROM CONFIGURACION WHERE `ATRIBUTO`='$atributo'");
      if($result->num_rows>0) {
        $sql="UPDATE CONFIGURACION SET `VALOR`='$name_archivo' WHERE `ATRIBUTO`='$atributo'";
      }else {
        $sql="INSERT INTO CONFIGURACION (ATRIBUTO,VALOR) VALUES ('$atributo','$name_archivo')";
      }
      if ($conn->query($sql) === FALSE) {$response=0;}
    }
}
echo $response;
