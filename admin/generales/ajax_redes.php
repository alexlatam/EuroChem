<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['facebook'])){$facebook=$_POST['facebook'];}
if (isset($_POST['youtube'])) {$youtube=$_POST['youtube'];}
if (isset($_POST['linkedin'])) {$linkedin=$_POST['linkedin'];}
$result=$conn->query("SELECT * FROM CONFIGURACION WHERE (ATRIBUTO='facebook') OR (ATRIBUTO='youtube') OR (ATRIBUTO='linkedin');");
if ($result->num_rows>0) {
  $result=$conn->query("DELETE FROM CONFIGURACION WHERE (ATRIBUTO='facebook') OR (ATRIBUTO='youtube') OR (ATRIBUTO='linkedin');");
  if ($conn->query($sql) === TRUE) {
    $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('facebook','$facebook'),('youtube','$youtube'),('linkedin','$linkedin');";
    if ($conn->query($sql) === TRUE) {$response=1;}
  }
}else {
  $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('facebook','$facebook'),('youtube','$youtube'),('linkedin','$linkedin');";
  if ($conn->query($sql) === TRUE) {$response=1;}
}
echo $response;
