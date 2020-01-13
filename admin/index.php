<?php
include '../common/conexion.php';
if(isset($_POST['correo'])){
  $pass=0;
  $usua=0;
  if($_POST['correo']!=null && $_POST['clave']!=null){
    $user=$_POST['correo'];
    $clave=$_POST['clave'];
    $sql="SELECT * FROM USUARIOS WHERE CORREO='$user';";
    $res=$conn->query($sql);
    if($row=$res->fetch_assoc()){//usuario registrado
      $clave=md5($clave);
      if($clave==$row['CLAVE']){//usuario loggeado
        session_start();
        $_SESSION['ACCESO']=TRUE;
        $_SESSION['USUARIO']=$_POST['correo'];
        header ('Location:principal.php');
      }else{ $pass=1; }
    }else{ $usua=1; }
  }
}
session_start();
if(isset($_SESSION['USUARIO'])){
  header('Location:principal.php');
}else{session_destroy();}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EuroChem- Administración</title>
  <link rel="icon" type="image/png" href="../images/favicon1.png"/>
  <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <div class="text-center">
      <img src="../images/logo-balita-3.png" onerror="this.remove()" style="max-width:200px;">
    </div>
    <div class="row text-center mt-4">
      <div class="card card-login mx-auto mt-3 col-md-6 col-sm-10">
        <div class="card-header">Iniciar sesión</div>
        <div class="card-body">
          <form action="index.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1" id="usuario">Correo</label>
              <input class="form-control" id="exampleInputEmail1" name="correo" type="text" aria-describedby="emailHelp" placeholder="Coloque el correo" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" id="pass">Password</label>
              <input class="form-control" id="exampleInputPassword1" name="clave" type="password" placeholder="Password" required>
            </div>
              <button class="btn btn-outline-success btn-block" id="inicar" type="submit">Iniciar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    var passw = <?php echo $pass;?>;
    var usuario = <?php echo $usua;?>;
    $("#iniciar").click(function(){
      if(passw == 1){ document.getElementById("pass").innerHTML = "Password "+" <span class='text-danger'>¡Contraseña Incorrecta!</span>"; }
      if(usuario == 1){ document.getElementById("usuario").innerHTML = "Correo "+" <span class='text-danger'>Correo Incorrecto!</span>"; }
    });
  </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
