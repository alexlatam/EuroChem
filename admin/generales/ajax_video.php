<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['url_video'])){
  $url_video=$_POST['url_video'];
}
$result=$conn->query("SELECT * FROM CONFIGURACION WHERE (ATRIBUTO='video');");
if($result->num_rows>0){
  $result=$conn->query("DELETE FROM CONFIGURACION WHERE (ATRIBUTO='video');");
  if($conn->query($sql)===TRUE){
    $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('video','$url_video');";
    if($conn->query($sql)===TRUE){$response=1;}
  }
}else{
  $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('video','$url_video');";
  if($conn->query($sql)===TRUE){$response=1;}
}
echo $response;
