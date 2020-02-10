<?php
include '../common/sesion.php';
require '../../common/conexion.php';
$section="nuevo_blog";
//nuevo articulo
$nuevo=3;
if(isset($_GET['r'])){$nuevo=$_GET['r'];}else{$nuevo=3;}
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
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <title>Administración - Balita</title>
  <link href="../../assets/admin/css/style.min.css" rel="stylesheet">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
      <?php include '../common/navbar.php'; ?>
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
                <input type="text" name="title" class="form-control text-dark" required maxlength="255" id="titulo">
                <div class="col-12 mb-2">
                  <small class="text-muted">Quedan <span id="numero">255</span> caracteres.</small>
                </div>
                <script>
                  $(document).ready(function(){
                    var total_letras=255;
                    $('#titulo').keyup(function(){
                      var longitud=$(this).val().length;
                      var resto=total_letras - longitud;
                      $('#numero').html(resto);
                      if(resto <= 0){$('#titulo').attr("maxlength",255);}
                    });
                  });
                </script>
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
              <span class="ml-3 mb-2"><b>Resumen del artículo</b></span>
              <div class="input-group col-12">
                <textarea class="form-control" name="description" rows="5" type="text" required></textarea>
              </div>
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
    <!-- Nuevo Blog -->
    <script>
      $(document).ready(function(){
        var nuevo=<?php echo $nuevo;?>;
        if(nuevo==1){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡Fue creado exitosamente!"});
        }else if(nuevo!=1 && nuevo!=3){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
        }
      });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/admin/js/custom.min.js"></script>
</body>
</html>
