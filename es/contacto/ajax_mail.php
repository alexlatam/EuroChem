<?php
$to="info@eurochemus.com";
if ($_GET['subject']=="") {
  $subject = "Solicitud de contacto - EuroChemUs";
}else {
  $subject = $_GET['subject'];
}
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$text=$_GET['message'];
$name=$_GET['name'];
$email=$_GET['email'];
$company=$_GET['company'];
$message = "
<html>
<head>
<title>Solicitud de contacto - EuroChemUs</title>
</head>
<body>
<h1>Solicitud de Contacto de la pagina web - eurochemus.com</h1>
<hr>
<h3>Nombre: <strong>$name</strong></h6>
<h3>Correo de contacto: <strong>$email</strong></h6>
<h3>Compañia: <strong>$company</strong></h6>
<br>
<h3>Mensaje enviado por el cliente</h5>
<p>$text</p>
</body>
</html>";
mail($to,$subject,$message,$headers);
$respuesta=1;
echo "$respuesta";
 ?>
