<?php
require '../common/conexion.php';
$respuesta=0;
if(isset($_GET['id_talla'],$_GET['id_modelo'])){
  $id_talla=$_GET['id_talla'];
  $id_modelo=$_GET['id_modelo'];
  $sql="SELECT * FROM INVENTARIO WHERE IDMODELO=$id_modelo AND TALLAID=$id_talla";
  $res=$conn->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $respuesta=$row['CANTIDAD']."%".$row['PESO'];
    }
  }
}
echo "$respuesta";
