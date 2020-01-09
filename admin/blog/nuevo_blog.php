<?php
include '../../common/sesion.php';
require '../../common/conexion.php';
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
                <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-btn-sidebar active">
                  <i class="mdi mdi-book"></i>
                  <span class="hide-menu">Blog </span>
                </a>
                <div class="dropdown-container-sidemenu" style="display:none;" id="dropdown1">
                  <a class="d-block sidebar-link waves-effect waves-dark sidebar-link ml-5 active" href="nuevo_blog.php"><span class="hide-menu">Nuevo Blog </span></a>
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
              <h4 class="page-title">Nuevo Blog</h4>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <form action="addArticle.php" method="POST" enctype="multipart/form-data" id="formulario">
            <div class="row mt-1">
              <div class="input-group mb-3 col-12">
                <div class="input-group-append">
                  <span class="input-group-text"><b>Titulo del articulo</b></span>
                </div>
                <input type="text" name="title" class="form-control text-dark" required maxlength="255">
              </div>
              <div class="input-group mb-3 col-12">
                <div class="input-group-append">
                  <span class="input-group-text"><b>Autor</b></span>
                </div>
                <input type="text" name="autor" class="form-control text-secondary" required maxlength="255">
              </div>
              <div class="input-group mb-3 col-12">
                <div class="input-group-append">
                  <span class="input-group-text" title="Serviran para el posicionamiento(SEO), deberan estar separadas por comas(,)" data-toggle="tooltip"><b>Palabras Clave</b></span>
                </div>
                <input type="text" name="keywords" class="form-control text-dark" required maxlength="255" placeholder="Ej. casas, apartamentos, casa en alquiler">
              </div>
              <span class="ml-3 mb-2"><b>Resumen del artículo</b><small class="text-muted ml-2">Descripcion corta de máx 255 caracteres</small></span>
              <div class="input-group col-12">
                <textarea class="form-control" name="description" rows="3" type="text" required id="resumen" maxlength="255"></textarea>
              </div>
              <div class="col-12 mb-2">
                <small class="text-muted">Quedan <span id="numero">255</span> caracteres.</small>
              </div>
              <script>
                $(document).ready(function(){
                  var total_letras=255;
                  $('#resumen').keyup(function(){
                    var longitud=$(this).val().length;
                    var resto=total_letras - longitud;
                    $('#numero').html(resto);
                    if(resto <= 0){$('#resumen').attr("maxlength",255);}
                  });
                });
              </script>
              <span class="ml-3 mb-2"><b>Contenido</b></span>
              <div class="input-group mb-3 col-12">
                <textarea class="form-control" name="content" rows="20" type="text" required placeholder="Escriba aqui el contenido del blog..."></textarea>
              </div>
              <div class="col-12">
                <small>La imagen debe ser de máximo 2 Megas</small>
              </div>
              <div class="col-12">
                <label class="btn btn-link" for="file-upload">Seleccionar Imagen</label>
                <input id="file-upload" type="file" accept="image/*" hidden="hidden" name='imagen' onchange="ValidarImagen(this);" required/>
              </div>
              <div class="col-12 text-center" id="file-preview-zone">
              </div>
              <!-- Preview Imagen -->
              <script>
                var fileUpload=document.getElementById('file-upload');
                fileUpload.onchange=function(e){
                  var limite_kb=2000*1024;
                  var imgPath=$(this)[0].value;
                  var peso=$(this)[0].files[0].size;
                  var extn=imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                  if (extn=="png" || extn=="jpg" || extn=="jpeg") {
                    if(peso>limite_kb){
                      const toast=swal.mixin({toast:true,position:'bottom',showConfirmButton:false,timer:4000});
                      toast({type:'error',title:"¡Desbes subir una imagen menor de 2 Megas!"})
                    }else{readFile(e.srcElement);}
                  }else{
                    const toast=swal.mixin({toast:true,position:'bottom',showConfirmButton:false,timer:4000});
                    toast({type:'error',title:"¡Desbes subir imagenes tipo jpg, jpge o png"})
                  }
                }
                function readFile(input){
                  $("#file-preview-zone").empty();
                  if(input.files && input.files[0]){
                    var reader=new FileReader();
                    reader.onload=function(e){
                      var filePreview=document.createElement('img');
                      filePreview.id='file-preview';
                      filePreview.setAttribute("width","60%");
                      filePreview.src=e.target.result;
                      var previewZone=document.getElementById('file-preview-zone');
                      previewZone.appendChild(filePreview);
                    }
                    reader.readAsDataURL(input.files[0]);
                  }
                }
              </script>
            </div>
            <div class="row justify-content-center my-3">
              <button type="submit" class="btn btn-outline-primary px-5">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $("#formulario").submit(function(event){
        $("#loader_now").click();
        $(this).submit();
      });
    </script>
    <!-- Modal end-sesion -->
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
    <!-- Modal esperar -->
    <input type="hidden" data-toggle="modal" data-target="#loader_modal" id="loader_now">
    <div class="modal fade" id="loader_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="loader_real">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-transparent mt-5 pt-5" style="border:0px;">
          <button type="button" class="close bg-transparent" data-dismiss="modal" aria-label="Close" id="close_loader"></button>
          <div class="container mt-5 text-center text-white">
            <p>
              Espere <br>
              ¡¡Puede tardar unos segundos!!
            </p>
          </div>
        </div>
      </div>
    </div>
    <script>
      var dropdown=document.getElementsByClassName("dropdown-btn-sidebar");
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
