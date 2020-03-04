<?php
include '../../common/conexion.php';
$resp=0;
$id_producto=$_GET['id'];
$sql="SELECT URL_TEMP FROM PRODUCTOS WHERE ID=$id_producto;";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $resp=$row['URL_TEMP'];
  }
}
echo "$resp";
 ?>
