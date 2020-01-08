<?php
session_start();
include 'common/conexion.php';
$respuesta=0;
if(isset($_SESSION['USER'])){$user=$_SESSION['USER'];}
if(isset($_GET['id'],$_GET['e']) && !empty($_GET['id'])){
$idmodelo=$_GET['id'];
$aux=$_GET['e'];
if($aux=="2"){
  $sql="DELETE FROM `FAVORITOS` WHERE USERID='$user' AND  MODELOID='$idmodelo'";
  if($conn->query($sql)===TRUE){$respuesta=2;}
}elseif($aux=="1"){
  $sql="INSERT INTO `FAVORITOS` (`USERID`,`MODELOID`) VALUES ('$user','$idmodelo')";
  if($conn->query($sql)===TRUE){$respuesta=1;}
}
}
echo $respuesta;
?>
