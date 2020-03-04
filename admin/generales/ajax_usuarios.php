<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['nombre'])){$nombre=$_POST['nombre'];}
if (isset($_POST['nivel'])) {$nivel=$_POST['nivel'];}
if (isset($_POST['email'])) {$email=$_POST['email'];}
if (isset($_POST['clave'])) {$clave=$_POST['clave'];$clave=md5($clave);}
$sql="INSERT INTO USUARIOS (NOMBRE,CORREO,CLAVE,NIVEL) VALUES ('$nombre','$email','$clave','$nivel');";
if ($conn->query($sql) === TRUE) {$response=1;}
echo $response;
