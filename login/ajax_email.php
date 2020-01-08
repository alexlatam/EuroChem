<?php
require '../common/conexion.php';
$respuesta=0;
if(isset($_GET['e'])){
  $email=$_GET['e'];
  $sql="SELECT CORREO FROM USUARIOS";
  $res=$conn->query($sql);
  if($res->num_rows>0){while(
    $row=$res->fetch_assoc()){
      if($row['CORREO']==$email){
        $respuesta=1;
      }
    }
  }
}
echo "$respuesta";
