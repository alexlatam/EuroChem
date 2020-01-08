<?php
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="desciption" content="Mavic es una nueva E-commerce Venezolana, creyente de la nueva era digital de venta por internet.">
  <meta name="keywords" content="Suminstros Mavic, Mavic, Mavic vzla">
  <meta name="author" content="Eutuxia, C.A.">
  <meta name="application-name" content="Suministros Mavic."/>
  <link rel="icon" type="image/jpg" sizes="16x16" href="../admin/img/<?php echo $imageLogo;?>">
  <link rel="stylesheet" href="../css/new.css">
  <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <!--script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script-->
  <!--script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-8952175764108741",enable_page_level_ads: true});</script-->
  <title><?php echo $nombrePagina;?></title>
  <style media="screen">
    .linea{
      margin:0px 20px;
      width:90px;
      border-top:1px solid #999;
      position: relative;
      top:10px;
      float:left;
    }
    .leyenda {
      font-weight:bold;
      float:left;
    }
  </style>
</head>
<body style="background-color:#ffffff;">
  <div class="container mt-3">
    <div class="row justify-content-center align-items-center">
      <div class="col-auto p-0">
        <a href="../index.php" target="_blank" ><img src="../admin/img/<?php echo $imageLogo;?>" alt="Rouxa" width="70px"/></a>
      </div>
      <div class="col-auto lead p-0" style="font-size:50px;"><a class="text-dark" target="_blank" style="text-decoration:none;" href="../index.php">ROUXA</a></div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="card card-login mx-auto mt-3 col-md-4 col-sm-8 col-10">
        <div class="card-body">
          <h4 class="my-1">Crea tu cuenta</h4>
          <form action="index.php" method="POST" onsubmit="return enviar();" id="myform">
            <div class="form-group mt-3">
              <small><strong>Tu Nombre</strong></small>
              <input class="form-control" type="text" name="name" required/>
            </div>
            <div class="form-group mt-3">
              <small><strong>Tu Apellido</strong></small>
              <input class="form-control" type="text" name="apellido" required/>
            </div>
            <small><strong>Documento de identidad</strong></small>
            <div class="input-group">
              <select class="custom-select" name="tipoIdentidad">
                <option value="V" selected>V</option>
                <option value="E">E</option>
              </select>
              <div class="input-group-append">
                <input class="form-control" type="number" name="identidad" maxlength="8" required/>
              </div>
            </div>
            <div class="form-group mt-3">
              <small><strong>Correo</strong></small>
              <input class="form-control" type="email" name="correo" required/>
            </div>
            <div class="form-group mt-3">
              <small><strong>Clave</strong></small>
              <input class="form-control" type="password" name="password" placeholder="Al menos 6 caracteres" required id="password1" minlength="6"/>
            </div>
            <div class="form-group mt-3">
              <small><strong>Repite la Clave</strong></small>
              <input class="form-control" type="password" required id="password2" minlength="6"/>
            </div>
            <p><input type="checkbox" required> Yo, declaro haber leido y entendido los <a href="../info/terminos.php" target="_blank">términos, condiciones y politicas</a> que regulan esta tienda virtual.
              De igual manera declaro que la informacion suministrada mediante este fomulario es correcta.</p>
            <button class="btn btn-outline-success btn-block" id="crear" type="submit">Crear Cuenta</button>
          </form>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="mt-3">
          <div class="linea">&nbsp;</div>
          <small class="leyenda">¿Ya tienes cuenta en Rouxa?</small>
          <div class="linea">&nbsp;</div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="">
          <a href="index.php">Iniciar sesión</a>
        </div>
      </div>
  </div>
  <script>
    function enviar(){
      var p1=$("#password1").val();
      var p2=$("#password2").val();
      if(p1==p2){
        formulario.submit();
        return true;
      }else{
        const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:3500});
        toast({type:'error',title:'¡Las claves no coincidieron! \n Inténtalo de nuevo'});
        return false;
      }
    }
  </script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
