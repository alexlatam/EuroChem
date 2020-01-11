<?php
  include '../common/conexion.php';
  include '../common/datosGenerales.php';
  //include 'common/sesion.php';
  /*$email=$_SESSION['USUARIO'];
  $sql="SELECT NIVEL FROM ADMIN_USUARIOS WHERE CORREO='$email'";
  $result_nivel=$conn->query($sql);
  if($row=$result_nivel->fetch_assoc()){
    $_SESSION['nivel']=$row['NIVEL'];
  }*/
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Página administrativa de Eurochem">
  <meta name="author" content="Eutuxia Web">
  <link rel="icon" type="image/jpg" sizes="16x16" href="/admin/img/">
  <title>EuroChem - Administración</title>
  <link href="../assets/admin/css/style.min.css" rel="stylesheet">
  <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <?php include 'common/navbar.php';?>
        <div class="page-wrapper">
          <div class="page-breadcrumb">
            <div class="row">
              <div class="col-5 align-self-center">
                <h4 class="page-title">Principal <a href="../admin/principal.php" class="m-2" ><i title="Actualizar" data-toggle="tooltip" class="ti-loop"></i></a></h4>
              </div>
              <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="principal.php">Inicio</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Principal</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-lg-11">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Página Administrativa de la Empresa EuroChem</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/admin/js/custom.min.js"></script>
</body>
</html>
