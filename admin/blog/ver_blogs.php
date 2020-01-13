<?php
include '../common/sesion.php';
require '../../common/conexion.php';
$section="ver_blogs";
//edicion de articulo
$edicion=3;
if(isset($_GET['e'])){$edicion=$_GET['e'];}else{$edicion=3;}
#eliminar blog
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $id_articulo=$_GET['delete'];
  #consigue direcion de imagen de producto
  $sql="SELECT IMAGE FROM ARTICLESBLOG WHERE IDARTICULO='$id_articulo' LIMIT 1";
  $result=$conn->query($sql);
  if($result->num_rows>0){while($row=$result->fetch_assoc()){$imagen=$row['IMAGE'];unlink('img/'.$imagen);}}
  #eliminar producto
  $sql="DELETE FROM ARTICLESBLOG WHERE IDARTICULO='$id_articulo'";
  if($conn->query($sql)===TRUE){$respuesta=1;}else{$respuesta=2;}
}
#paginacion
$perpage=25;
if(isset($_GET['page']) & !empty($_GET['page'])){$curpage=$_GET['page'];}else{$curpage=1;}
$start=($curpage*$perpage) - $perpage;
#necesito el total de elementos
$PageSql="SELECT * FROM ARTICLESBLOG";
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
  <link rel="icon" type="image/png" href="../../imagenes/favicon.png"/>
  <title>Administración - Balita</title>
  <link href="../../assets/admin/css/style.min.css" rel="stylesheet">
  <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
      <?php include '../common/navbar.php';?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-auto align-self-center">
              <h4 class="page-title">Blog - Editar Articulos</h4>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row mt-1">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Blogs en la página</h4>
                </div>
                <?php
                $sql="SELECT * FROM ARTICLESBLOG LIMIT $start,$perpage";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                  ?>
                  <div class="container">
                    <?php
                    $x=1;
                    while($row=$result->fetch_assoc()){
                      $id_articulo=$row['IDARTICULO'];
                      ?>
                      <div class="row align-items-center">
                        <strong class="col-1"><?php echo $x;?></strong>
                        <div class="col-1 "><img src="img/<?php echo $row['IMAGE'];?>" width="35px"></div>
                        <div class="col-9">
                          <div class="row">
                            <div class="col-9 text-dark">
                              <a href="../../actualidad/article.php?id=<?php echo $id_articulo;?>" target="_blank">
                                <?php echo ucwords($row['TITLE']);?>
                              </a>
                            </div>
                            <div class="col-3 ml-auto">
                              <small><?php echo $row['DATE'];?></small>
                            </div>
                          </div>
                          <div class="row ml-1">
                            <small><?php echo ucwords($row['AUTOR']);?></small>
                          </div>
                        </div>
                        <div class="col-1">
                          <a href="edit.php?id=<?php echo $id_articulo;?>" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 576 512"><path fill="#43ff65" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>
                          </a>
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#eli<?php echo $id_articulo;?>"  title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15px" viewBox="0 0 448 512"><path fill="#c30002" d="M0 84V56c0-13.3 10.7-24 24-24h112l9.4-18.7c4-8.2 12.3-13.3 21.4-13.3h114.3c9.1 0 17.4 5.1 21.5 13.3L312 32h112c13.3 0 24 10.7 24 24v28c0 6.6-5.4 12-12 12H12C5.4 96 0 90.6 0 84zm415.2 56.7L394.8 467c-1.6 25.3-22.6 45-47.9 45H101.1c-25.3 0-46.3-19.7-47.9-45L32.8 140.7c-.4-6.9 5.1-12.7 12-12.7h358.5c6.8 0 12.3 5.8 11.9 12.7z"/></svg>
                          </a>
                        </div>
                      </div>
                      <hr>
                      <!-- Modal Eliminar -->
                      <div class="modal fade" id="eli<?php echo $id_articulo;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">¿Desea eliminar el articulo?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-2">
                                    <img src="img/<?php echo $row['IMAGE'];?>" width="20px">
                                  </div>
                                  <div class="col-12"><?php echo $row['TITLE'];?></div>
                                  <div class="col-12"><?php echo ucwords($row['DESCRIPTION']);?></div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <a href="ver_blogs.php?delete=<?php echo $id_articulo;?>" class="btn btn-primary">Eliminar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      ++$x;
                    } ?>
                    <center>
                      <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <?php if($curpage!=$startpage){ ?>
                            <li class="page-item">
                              <a class="page-link" href="?page=<?php echo $startpage;?>" tabindex="-1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">firts</span>
                              </a>
                            </li>
                          <?php } ?>
                          <?php if($curpage>=2){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage;?>"><?php echo $previouspage;?></a></li>
                          <?php } ?>
                          <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage;?>"><?php echo $curpage;?></a></li>
                          <?php if($curpage!=$endpage){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage;?>"><?php echo $nextpage;?></a></li>
                          <?php } ?>
                          <?php if($curpage!=$endpage){ ?>
                            <li class="page-item">
                              <a class="page-link" href="?page=<?php echo $endpage;?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                              </a>
                            </li>
                          <?php } ?>
                        </ul>
                      </nav>
                    </center>
                  </div>
                <?php }else{ ?>
                  <div class="card">
                    <div class="card-title text-center">
                      <h5>Sin articulos en la pagina</h5>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Editado -->
    <script>
      $(document).ready(function(){
        var edicion=<?php echo $edicion;?>;
        if(edicion==1){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡Fue editado exitosamente!"});
        }else if(edicion==2){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
        }
      });
    </script>
    <!-- Eliminado -->
    <script>
      $(document).ready(function(){
        var respuesta=<?php echo $respuesta;?>;
        if(respuesta==1){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡Fue eliminado exitosamente!"});
        }else if(respuesta==2){
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
