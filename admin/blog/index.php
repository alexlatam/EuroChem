<?php
include '../../common/sesion.php';
require '../../common/conexion.php';
#paginacion
$perpage=25;
if(isset($_GET['page']) & !empty($_GET['page'])){$curpage=$_GET['page'];}else{$curpage=1;}
$start=($curpage*$perpage) - $perpage;
#necesito el total de elementos
$PageSql="SELECT * FROM articlesblog";
$pageres=mysqli_query($conn,$PageSql);
$totalres=mysqli_num_rows($pageres);
$endpage=ceil($totalres/$perpage);
$startpage=1;
$nextpage=$curpage + 1;
$previouspage=$curpage - 1;
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Página administrativa de Balita">
  <meta name="author" content="Eutuxia Web">
  <link rel="icon" type="image/png" href="../../images/favicon1.png"/>
  <title>Administración - Balita</title>
  <link href="../../assets/admin/css/style.min.css" rel="stylesheet">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    </div>
    <script>
      var dropdown = document.getElementsByClassName("dropdown-btn-sidebar");
      var i;
      for(i=0;i<dropdown.length;i++){
        dropdown[i].addEventListener("click",function(){
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if(dropdownContent.style.display==="block"){
            dropdownContent.style.display="none";
          }else{dropdownContent.style.display="block";}
        });
      }
    </script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/admin/js/custom.min.js"></script>
</body>
</html>
