<?php
session_start();
if(isset($_SESSION['USER'])){header ('Location:../index.php');}
include '../common/conexion.php';
include '../common/datosGenerales.php';
$iscreated=false;
$carrito=false;
if(isset($_GET['c']) && $_GET['c']==1){$carrito=true;}
if(isset($_POST['out']) && $_POST['out']==1){
  unset($_SESSION['ACCESO_USER']);
  unset($_SESSION['USER']);
  unset($_SESSION['NAME_USER']);
}
if(isset($_POST['name'],$_POST['apellido'],$_POST['tipoIdentidad'],$_POST['identidad'],$_POST['correo'],$_POST['password'])){
  $name=$_POST['name'];
  $apellido=$_POST['apellido'];
  $identidad=$_POST['tipoIdentidad'].$_POST['identidad'];
  $correo=$_POST['correo'];
  $password=$_POST['password'];
  $sql="INSERT INTO `USUARIOS` (`NOMBRE`,`APELLIDO`,`DOCUMENTOID`,`CORREO`,`CLAVE`) VALUES ('$name','$apellido','$identidad','$correo','$password')";
  if($conn->query($sql)===TRUE){
    $iscreated=true;
    $idproducto=mysqli_insert_id($conn);
  }
}
$pass=0;
//inicio de sesion
if(isset($_POST['user'],$_POST['clave'])){
  $correo=$_POST['user'];
  $password=$_POST['clave'];
  $sql="SELECT * FROM USUARIOS WHERE CORREO='$correo'";
  $res=$conn->query($sql);
  if($row=$res->fetch_assoc()){//usuario registrado
    //$password=md5($password);
    if($password==$row['CLAVE']){//usuario loggeado
      session_start();
      $_SESSION['ACCESO_USER']=TRUE;
      $_SESSION['USER']=$row['CORREO'];
      $_SESSION['NAME_USER']=$row['NOMBRE']." ".strtoupper(substr($row['APELLIDO'],0,1)).".";
      if($_POST['carrito']){
        header ('Location:../carrito/datos_compra.php');
      }else{
        header ('Location:../index.php');
      }
    }else{$pass=1;}
  }
}
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
  <?php if($iscreated): ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto p-3" style="border:1px solid #00ca23; background-color:#c0ffbd;border-radius:5px;">
          <strong>¡Tu cuenta fue creada exitosamente!</strong>
          <br>
          <small>Inicia sesión con tu cuenta, y disfruta de todos los productos.</small>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if($carrito): ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto py-3 px-4" style="border:1px solid #00ca23; background-color:#c0ffbd;border-radius:5px;">
          <strong>Debes iniciar sesión para completar tu compra</strong>
          <br>
          <small>Tranquilo ya guardamos los articulos que solicitaste.</small>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if($pass==1): ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto p-3" style="border:1px solid #c30000; background-color:#ffc8a7;border-radius:5px;">
          <strong>¡Tu clave no es la correcta!</strong>
          <br>
          <small>Intentalo de nuevo.</small>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="card card-login mx-auto mt-3 col-md-4 col-sm-8 col-10">
        <div class="card-body">
          <h4 class="my-2">Iniciar sesión</h4>
          <form action="index.php" method="POST" onsubmit="return enviar();" id="myform">
            <div class="form-group mt-5" id="correo">
              <input class="form-control" type="email" name="user" placeholder="Ingresa el correo" required id="email">
            </div>
            <div class="form-group" id="pass">
            </div>
            <?php if ($carrito): ?>
              <input type="hidden" name="carrito" value="<?php echo $carrito;?>">
            <?php endif; ?>
            <div class="form-group" id="buttons">
              <button class="btn btn-outline-success btn-block" type="button" id="continuar">Continuar</button>
            </div>
            </form>
            <div class="text-center mt-5">
              <a class="d-block small" href="#">¿Olvido el Password?</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="mt-3">
          <div class="linea">&nbsp;</div>
          <small class="leyenda">¿Eres nuevo en Rouxa?</small>
          <div class="linea">&nbsp;</div>
        </div>
      </div>
      <div class="row justify-content-center">
        <a href="new.php">Crea tu cuenta</a>
      </div>
  </div>
  <script>
    $(document).on('click','#continuar',function(){
      var e=$("#email").val();
      $.get('ajax_email.php',{e:e},verificar,'text');
      function verificar(respuesta){
        if(respuesta==1){
          $("#email").attr("hidden","hidden");
          $("#continuar").attr("hidden","hidden");
          $("#correo").append("<div class='alert alert-dismissible fade show' role='alert'><small><strong>Correo:</strong></small><br><span class='text-muted'><strong>"+e+"</strong></span><button type='button' class='close' data-dismiss='alert' aria-label='Close' id='close_alert'><span aria-hidden='true'>&times;</span></button></div>");
          $("#pass").append("<input class='form-control' name='clave' type='password' placeholder='Password' required id='input_pass'>");
          $("#buttons").append("<button class='btn btn-outline-success btn-block' type='submit' id='entrar'>Iniciar Sesión</button>");
        }else{
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:3500});
          toast({type:'error',title:'¡Este usuario no se encuentra registrado!'});
        }
      }
    });
    $(document).on('click','#close_alert',function(){
      $("#input_pass").remove();
      $("#entrar").remove();
      $("#email").removeAttr("hidden");
      $("#continuar").removeAttr("hidden");
    });
  </script>
  <script>
    $("#email").keyup(function(event){
      if(event.keyCode == 13){
        $("#continuar").click();
      }
    });
  </script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
