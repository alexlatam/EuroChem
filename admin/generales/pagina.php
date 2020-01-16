<?php
include '../common/sesion.php';
if($_SESSION['nivel']==6 || $_SESSION['nivel']==1){
}else{header('Location: ../principal.php');}
require '../../common/conexion.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Eutuxia Web, C.A.">
  <link rel="icon" type="image/jpg" sizes="16x16" href="../img/">
  <title>EuroChem - Administración</title>
  <link href="../assets/admin/css/style.min.css" rel="stylesheet">
  <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
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
                <div class="container mb-3">
                  <div class="row align-items-center">
                    <div class="col-4">
                      <h4 class="card-title mb-0">Imagenes Banner Principal</h4>
                      <span class="card-subtitle">Van en la imagen principal de la pagina.</span>
                    </div>
                    <div class="col-3">
                      <form enctype="multipart/form-data" id="formBanner" method="post">
                        <label class="btn btn-link" for="filesBanner">Seleccionar Imagenes</label>
                        <input type="file" name="images[]" id="filesBanner" multiple hidden="hidden"/>
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
                            <span class="input-group-text" data-toggle="tooltip" title="cantidad de imagenes en el banner"><b>Imagenes</b></span>
                          </div>
                          <input type="number" class="form-control" step="1" value="<?php echo $cantidadBanner;?>" style="max-width: 100px" id='cantidad-img-banner' name="cantidadBanner" max="8" min="1">
                        </div>
                      </div>
                      <div class="col-1">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                      </div>
                    </div>
                    <div class="row mt-2" id="image-holder">
                      <?php
                      $result=$conn->query("SELECT * FROM IMAGENES WHERE `TIPO`='1'");
                      if($result->num_rows>0){
                        $h=0;
                        while($rowImg = $result->fetch_assoc()){
                          $imagenBanner= $rowImg['URLIMAGEN'];
                          $enlace=$rowImg['ENLACE'];
                          $target=$rowImg['TARGET'];
                          $active_button="";
                          $disabled='';
                          if ($enlace=='') {
                            $active_button='active';
                            $disabled='disabled';
                          }
                          ?>
                          <div class='container-img-banner-admin col-12 mb-2'>
                            <img class='img-banner-admin' src='<?php echo "../img/$imagenBanner";?>'/>
                          </div>
                          <div class='input-group mb-3 contenedor-enlaces-banner<?php echo $h;?>'>
                            <div class='input-group-append'>
                              <button class='btn btn-outline-secondary boton-sin-enlace <?php echo $active_button;?>' type='button'>Sin enlace</button>
                            </div>
                            <div class='input-group-prepend'>
                              <label class='input-group-text'>Enlace de redirección</label>
                            </div>
                            <input type='text' name='enlaces[]' class='form-control' placeholder='Ej. www.enlace.com' value="<?php echo $enlace;?>" <?php echo $disabled;?>/>
                            <select name='target[]' class='custom-select' style='max-width: 170px!important;' <?php echo $disabled;?>>
                              <?php if ($target=='1') {?>
                                <option value="0">Abrirá..</option>
                                <option value='1' selected>En misma pestaña</option>
                                <option value='_blank'>En otra pestaña</option>
                              <?php }else if($target=='_blank') {?>
                                <option value="0">Abrirá..</option>
                                <option value='1'>En misma pestaña</option>
                                <option value='_blank' selected>En otra pestaña</option>
                              <?php }else{ ?>
                                <option value="0" selected>Abrirá..</option>
                                <option value='1'>En misma pestaña</option>
                                <option value='_blank'>En otra pestaña</option>
                              <?php } ?>
                            </select>
                          </div>
                          <?php
                          ++$h;
                        }
                      }
                      ?>
                    </div>
                  </form>
                </div>
                <hr>
                </div>
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
                        <input type="text" class="form-control text-secondary" placeholder="Link de Facebook" id="facebook" value="<?php if(isset($facebook )) echo $facebook; else echo '';?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Instagram</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Instagram" id="instagram" value="<?php if (isset($instagram)) echo $instagram; else echo '';?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Twitter</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Twitter" id="twitter" value="<?php if(isset($twitter)) echo $twitter; else echo '';?>">
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
                  <button type="button mr-auto" class="btn btn-outline-primary" id="submit_redes">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <!-- Redes Sociales -->
  <script>
    $(document).on('click',"#submit_redes",function(){
      var facebook=$("#facebook").val();
      var instagram=$("#instagram").val();
      var twitter=$("#twitter").val();
      var linkedin=$("#linkedin").val();
      if (facebook!='' && instagram!='' && twitter!='' && linkedin!='') {
        $.post('ajax_redes.php',{facebook:facebook,instagram:instagram,twitter:twitter,linkedin:linkedin},verificar,'text');
        function verificar(text){
          if (text=="1") {
            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
            toast({type:'success',title:"¡Se actualizarón exitosamentelas redes sociales!"})
          }else {
            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
            toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
          }
        }
      }else {
        const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
        toast({type:'info',title:"¡Desbes colocar alguna red social!"})
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
              var enlace="<div class='input-group mb-3 contenedor-enlaces-banner"+aux+"'><div class='input-group-prepend'><button class='btn btn-outline-secondary boton-sin-enlace' type='button'>Sin enlace</button></div><div class='input-group-prepend'><label class='input-group-text'>Enlace de redirección</label></div><input type='text' name='enlaces[]' class='form-control' placeholder='Ej. www.enlace.com'><select name='target[]' class='custom-select' style='max-width: 170px!important;'><option selected value='0'>Abrirá..</option><option value='1'>En misma pestaña</option><option value='_blank'>En otra pestaña</option></select></div>";
              $("<div class='container-img-banner-admin col-12 mb-2'><img class='img-banner-admin' src='"+e.target.result+"'/></div>"+enlace).appendTo(image_holder);
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
    //boton sin enlace
    $(document).on('click','.boton-sin-enlace',function(){
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
      }else {
        $(this).addClass("active");
      }//contenedor-enlaces-banner
      var aux=$(this).parent().parent().attr('class').split(" ")[2];
      if ($("."+aux+" input").attr('disabled')) {
        $("."+aux+" input").removeAttr("disabled");
        $("."+aux+" select").removeAttr("disabled");
      }else {
        $("."+aux+" input").val("").attr("disabled","");
        $("."+aux+" select").attr("disabled","");
      }
    });
  </script>
  <!-- Enviar Banner -->
  <script>
    $(document).ready(function(e){
      $("#formBanner").on('submit',function(e){
        e.preventDefault();
        var formData=new FormData(this)
        var array_enlaces= new Array();
        var array_targets=new Array();
        //agrego los campos adicionales
        let enlaces = $('input[name^="enlaces"]');
        let targets = $('select[name^="target"]');
        //Recorremos los inputs y por cada input guardamos el valor en el array creado
        $(enlaces).each(function(){
          array_enlaces.push($(this).val());
        });
        $(targets).each(function(){
          array_targets.push($(this).val());
        });
        formData.append("array_enlaces", array_enlaces);
        formData.append("array_targets", array_targets);
        $.ajax({
          type: 'POST',
          url: 'ajax_images_banner.php',
          data: formData,//
          contentType: false,
          cache: false,
          processData:false,
          success: function(respuesta){
            if (respuesta=='1') {
              const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
              toast({type:'success',title:"¡Fueron actualizadas las imagenes exitosamente!"})
            }else {
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
<script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/admin/js/custom.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
</body>
</html>
