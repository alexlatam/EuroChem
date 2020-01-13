<?php
require '../../common/conexion.php';
$respuesta=0;
$iscreated=false;
if(isset($_FILES['imagen'])){
  if($_FILES["imagen"]["error"]>0){
    $respuesta=2;
  }else{
    $limite_kb=500;
    if($_FILES["imagen"]["size"]<=$limite_kb*1024){
      $ruta="img/";
      $name_archivo=basename($_FILES["imagen"]["name"]);
      $archivo=$ruta.$name_archivo;
      $resultado=move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
      if($resultado){$iscreated=true;}else{$respuesta=3;}
    }else{$respuesta=5;}
  }
}
if($iscreated && isset($_POST['title'],$_POST['description'],$_POST['keywords'],$_POST['content'])){
$titulo=$_POST['title'];
$descripcion=$_POST['description'];
$contenido=$_POST['content'];
$keywords=$_POST['keywords'];
$autor=$_POST['autor'];
$sql="INSERT INTO `ARTICLESBLOG` (`TITLE`,`IMAGE`,`DESCRIPTION`,`CONTENT`,`KEYWORDS`,`AUTOR`) VALUES ('$titulo','$name_archivo','$descripcion','$contenido','$keywords','$autor');";
if($conn->query($sql)===TRUE){$respuesta=1;}else{$respuesta=6;}
}else{$respuesta=7;}
$conn->close();
header("Location: index.php?r=$respuesta");
