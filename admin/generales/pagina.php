<?php
include '../common/sesion.php';
require '../../common/conexion.php';
$facebook="";
$twitter="";
$linkedin="";
$instagram="";
$sql="SELECT * FROM `CONFIGURACION`";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row['ATRIBUTO']=="facebook"){
      $facebook=$row['VALOR'];
    }else if($row['ATRIBUTO']=="twitter"){
      $twitter=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }else if($row['ATRIBUTO']=="linkedin"){
      $linkedin=$row['VALOR'];
    }else if($row['ATRIBUTO']=="video"){
      $url_video=$row['VALOR'];
    }
  }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Eutuxia Web, C.A.">
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <title>EuroChem - Administración</title>
  <link href="/assets/admin/css/style.min.css" rel="stylesheet">
  <link href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <?php include '../common/navbar.php';?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Página Web</h4>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <!-- Imagenes Banner ppal -->
                <form enctype="multipart/form-data" id="formBanner" method="post">
                <div class="container mb-3">
                  <div class="row align-items-center">
                    <div class="col-4">
                      <h4 class="card-title mb-0">Imagenes Banner Principal</h4>
                      <span class="card-subtitle">Van en la imagen principal de la pagina.</span>
                    </div>
                      <div class="col-4">
                        <div class="input-group">
                          <?php
                          $sql="SELECT * FROM CONFIGURACION WHERE `ATRIBUTO`='cantidadBanner'";
                          $result=$conn->query($sql);
                          if($result->num_rows>0){
                            $rowConfig=$result->fetch_assoc();
                            $cantidadBanner=$rowConfig['VALOR'];
                          }
                          ?>
                          <div class="input-group-append">
                            <span class="input-group-text" data-toggle="tooltip" title="cantidad de imagenes en el banner"><b>Nro Imagenes en el Banner</b></span>
                          </div>
                          <input type="number" class="form-control" step="1" value="<?php echo $cantidadBanner;?>" style="max-width: 100px" id='cantidad-img-banner' name="cantidadBanner" max="8" min="1">
                        </div>
                      </div>
                      <div class="col-auto ml-auto">
                        <button type="submit" class="btn btn-outline-primary">Guardar Imagenes</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-auto">
                        <label class="btn btn-link" for="filesBanner">Seleccionar Imagenes</label>
                        <input type="file" name="images[]" id="filesBanner" multiple hidden="hidden"/>
                      </div>
                    </div>
                    <div class="row mt-2" id="image-holder">
                      <?php
                      $result=$conn->query("SELECT * FROM IMAGENES WHERE `TIPO`='1'");
                      if($result->num_rows>0){
                        while($rowImg = $result->fetch_assoc()){
                          $imagenBanner= $rowImg['URLIMAGEN'];
                          ?>
                          <div class='container-img-banner-admin col-12 mb-2'>
                            <img class='img-banner-admin' src='<?php echo "/imagen/$imagenBanner";?>' width="100%"/>
                          </div>
                          <?php
                        }
                      }
                      ?>
                    </div>
                </div>
              </form>
                <hr>
                </div>
                <hr>
                <!-- Video -->
                <div class="container mb-3">
                  <div class="row mb-2">
                    <h4 class="card-title mb-0 ml-3">Video de  compañia </h4>
                  </div>
                  <div class="row mb-2">
                    <div class="col-12">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Enlace del video</b></span>
                        </div>
                        <input type="url" class="form-control text-secondary" placeholder="Enlace del video" id="url_video" value="<?php echo $url_video?>">
                      </div>
                    </div>
                  </div>
                  <button type="button mr-auto" class="btn btn-outline-primary" id="submit_video">Guardar Video</button>
                </div>
                <hr>
                <!-- Producto del mes -->
                <div class="container mb-3">
                  <div class="row align-items-center">
                    <div class="col-12">
                      <h4 class="card-title mb-0 d-inline">Producto del mes </h4>
                    </div>
                    <div class="col-12 text-center" id="divInputLoad">
                      <form enctype="multipart/form-data" id="formProduct" method="post">
                        <div id="file-preview-zone">
                          <?php
                          $sql="SELECT * FROM CONFIGURACION WHERE `ATRIBUTO`='productoMes'";
                          $result=$conn->query($sql);
                          if($conn->query($sql)===TRUE){
                            if($result->num_rows>0){
                              $row=$result->fetch_assoc();
                            ?>
                            <img class="p-0 m-0" width="75%" src="/imagen/<?php echo $row['VALOR'];?>" id="file-preview"/>
                            <?php }
                           } ?>                          
                        </div>
                        <div id="divFileUpload">
                          <label class="btn btn-link" for="file-upload">Seleccionar Imagen</label>
                          <input class="form-group" id="file-upload" type="file" accept="image/*" hidden="hidden" name='product'/>
                        </div>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-outline-primary">Guardar Producto del Mes</button>
                    </form>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Preview Imagen Producto -->
                <script>
                  function readFile(input) {
                    $("#file-preview").remove();
                    if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                        var filePreview = document.createElement('img');
                        filePreview.id = 'file-preview';
                        filePreview.setAttribute("width", "50%");
                        //e.target.result contents the base64 data from the image uploaded
                        filePreview.src = e.target.result;
                        var previewZone = document.getElementById('file-preview-zone');
                        previewZone.appendChild(filePreview);
                      }
                      reader.readAsDataURL(input.files[0]);
                    }
                  }
                  var fileUpload = document.getElementById('file-upload');
                  fileUpload.onchange = function (e) {
                    var imgPath=$(this)[0].value;
                    var extn=imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                    if (extn=="png" || extn=="jpg" || extn=="jpeg") {
                      readFile(e.srcElement);
                    }else {
                      const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
                      toast({type:'error',title:"¡Desbes subir imagenes tipo jpg, jpge o png"})
                    }
                  }
                </script>
                <!-- Enviar Producto -->
                <script>
                  $(document).ready(function(e){
                    $("#formProduct").on('submit', function(e){
                      e.preventDefault();
                      $.ajax({
                        type: 'POST',
                        url: 'ajax_product_mes.php',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(respuesta){
                          if(respuesta=='1'){
                            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
                            toast({type:'success',title:"¡El producto fue guardado exitosamente!"})
                          }else{
                            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
                            toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
                          }
                        }
                      });
                    });
                  });
                </script>
                <!-- redes sociales -->
                <div class="container mb-3">
                  <div class="row mb-2">
                    <h4 class="card-title mb-0 ml-3">Redes sociales </h4>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Facebook</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Facebook" id="facebook" value="<?php echo $facebook?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Linkedin</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Linkedin" id="linkedin" value="<?php if (isset($linkedin)) echo $linkedin; else echo '';?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip"><b>Twitter</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de twitter" id="twitter" value="<?php if (isset($twitter)) echo $twitter; else echo '';?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip"><b>Instagram</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Instagram" id="instagram" value="<?php if (isset($instagram)) echo $instagram; else echo '';?>">
                      </div>
                    </div>
                  </div>
                  <button type="button mr-auto" class="btn btn-outline-primary" id="submit_redes">Guardar Redes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <input type="hidden" data-toggle="modal" data-target="#loader_modal" id="loader_now">
  <div class="modal fade" id="loader_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="loader_real">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-transparent no_border mt-5 pt-5">
        <button type="button" class="close bg-transparent" data-dismiss="modal" aria-label="Close" id="close_loader"></button>
        <div class="container mt-5">
          <div class="row justify-content-center"><div class="col-auto background_loader"><div class="loader algin-self-middle"></div></div></div>
          <b class="row justify-content-center text-white">¡¡Puede tardar unos segundos!!</b>
        </div>
      </div>
    </div>
  </div>
  <!-- Redes Sociales -->
  <script>
    $(document).on('click',"#submit_redes",function(){
      var facebook=$("#facebook").val();
      var twitter=$("#twitter").val();
      var linkedin=$("#linkedin").val();
      var instagram=$("#instagram").val();
      $.post('ajax_redes.php',{facebook:facebook,twitter:twitter,linkedin:linkedin,instagram:instagram},verificar,'text');
      function verificar(text){
        if(text=="1"){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡Se actualizarón exitosamentelas redes sociales!"})
        }else{
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
        }
      }
    });
  </script>
  <!-- Video -->
  <script>
    $(document).on('click',"#submit_video",function(){
      var url_video=$("#url_video").val();
      $.post('ajax_video.php',{url_video:url_video},verificar,'text');
      function verificar(text){
        if(text=="1"){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡El video se guardó correctamente !"})
        }else{
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
        }
      }
    });
  </script>
  <!-- Imagenes Banner -->
  <script>
    $("#filesBanner").on('change',function(){
      var cant_images=$("#cantidad-img-banner").val();
      var countFiles=$(this)[0].files.length;
      var imgPath=$(this)[0].value;
      var extn=imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder=$("#image-holder");image_holder.empty();
      if(extn=="png" || extn=="jpg" || extn=="jpeg"){
        if(typeof (FileReader)!='undefined'){
          if(countFiles>cant_images){countFiles=cant_images;}
          for(var i=0;i<countFiles;i++){
            var reader=new FileReader();
            reader.onload=function(e){
              let aux=Math.floor(Math.random() * (50 - 2)) + 2;
              var enlace="<div class='input-group mb-3 contenedor-enlaces-banner"+aux+"'><div class='input-group-prepend'></div><div class='input-group-prepend'></div></div>";
              $("<div class='container-img-banner-admin col-12 mb-2'><img class='img-banner-admin' src='"+e.target.result+"' width='100%'/></div>"+enlace).appendTo(image_holder);
            }
            reader.readAsDataURL($(this)[0].files[i]);
          }
        }else{alert("This browser does not support FileReader.");}
      }else{
        const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
        toast({type:'error',title:"¡Desbes subir imagenes tipo jpg, jpge o png"})
      }
    });
    //al cambiar la cantidad de imagenes
    $("#cantidad-img-banner").on('change', function(e){
      $("#image-holder").empty();
    });
  </script>
  <!-- Enviar Banner -->
  <script>
    $(document).ready(function(e){
      $("#formBanner").on('submit',function(e){
        $("#loader_now").click();
        e.preventDefault();
        var formData=new FormData(this)
        var array_enlaces= new Array();
        var array_targets=new Array();
        $.ajax({
          type: 'POST',
          url: 'ajax_images_banner.php',
          data: formData,
          contentType: false,
          cache: false,
          processData:false,
          success: function(respuesta){
            if (respuesta=='1') {
              setTimeout ("$('button#close_loader').click();", 500);
              const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
              toast({type:'success',title:"¡Fueron actualizadas las imagenes exitosamente!"})
            }else {
              setTimeout ("$('button#close_loader').click();", 500);
              const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
              toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
            }
          }
        });
      });
    });
  </script>
</div>
</div>
<script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/admin/js/custom.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
</body>
</html>
