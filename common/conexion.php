<?php
//servidor
/*$servername="db5000266937.hosting-data.io";
$username="dbu241881";
$dbname="dbs260499";
$password="Eurochem12345*";*/
//localhost
$servername="localhost";
$username="root";
$password="";
$dbname="eurochem";
// Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
$conn->set_charset("utf8");
if($conn->connect_error){die("Connection failed: ".$conn->connect_error);}
//defino una variable donde se guardara la direccion inicial del proyecto
//--local--
$root_folder="http://localhost/Rouxa/";
//--para servidor--
//$root_folder=""; // prints '/home/public_html/'
$nombrePagina="Eurochem";
$imageLogo="logo.png";
