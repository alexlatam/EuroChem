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
  <title>ServiElectra- Administración</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="text-center">
      <img src="/imagen/es/logo_texto.png" alt="" width="15%">
    </div>
    <div class="row text-center mt-4">
      <div class="card mx-auto mt-3 col-md-6 col-sm-10">
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
