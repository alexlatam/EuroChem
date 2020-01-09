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
  <link href="../../libraries/admin/css/style.min.css" rel="stylesheet">
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="../../libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../js/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
          <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
              <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
              <a href="index.php" class="logo">
                Administración - Balita
              </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="ti-more"></i>
            </a>
          </div>
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
            <ul class="navbar-nav float-left mr-auto">
              <li class="nav-item search-box">
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <div class="scroll-sidebar">
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-btn-sidebar">
                  <i class="mdi mdi-book"></i>
                  <span class="hide-menu">Blog </span>
                </a>
                <div class="dropdown-container-sidemenu" style="display:none;" id="dropdown1">
                  <a class="d-block sidebar-link waves-effect waves-dark sidebar-link ml-5" href="nuevo_blog.php"><span class="hide-menu">Nuevo Blog </span></a>
                  <a class="d-block sidebar-link waves-effect waves-dark sidebar-link ml-5" href="ver_blogs.php"><span class="hide-menu">Ver Blogs </span></a>
                </div>
              </li>
              <li class="sidebar-item active">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"  data-toggle="modal" data-target="#closeSesion">
                  <i class="mdi mdi-home"></i>
                  <span class="hide-menu">Salir</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-auto align-self-center">
              <h4 class="page-title">Página administrativa de Balita</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="closeSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="closeSesionLabel">Cerrar sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea cerrar sesión?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="../../common/end_sesion.php" class="btn btn-primary">Salir</a>
          </div>
        </div>
      </div>
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
    <script src="../../libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../libraries/admin/js/custom.min.js"></script>
</body>
</html>
