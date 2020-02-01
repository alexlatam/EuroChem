<?php 
	//importar librerias de pdf

require_once '../../vendor/autoload.php';

//Fecha Actual
$time = time();
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array( 'Domingo', 'Lunes', 'Martes',
'Miércoles', 'Jueves', 'Viernes', 'Sabado');

//consegir familia
$user = $service->userinfo->get();
$correo = $user->email;
$objCliente = new Login();
$consulta = $objCliente->acceso_login($correo);
//get_familia
$consulta = mysqli_fetch_array($consulta);
$familia = str_pad($consulta[2], 4, 0, STR_PAD_LEFT);

$control= new ControlArchivos();
//padres
$padres = $control->get_padres($familia);
while($padre = mysqli_fetch_array($padres)){
  $tipo= $padre['tipo'];
  if ($tipo=='3'){
    //papa
    $papa = $padre['nombre'];
  }else if($tipo=='4'){
    //mama
    $mama = $padre['nombre'];
  }
}
//conseguir los Hijos
$hijos = $control->listado_hijos($familia);

ob_start();
//conseguir idchofer
?>


<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" pagegroup="new">
  <p align="right">
      Ciudad de México, a <?php echo date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </p>
  <br><br><br>
  <p align="left">
    <b>Colegio Hebreo Maguen David, A.C</b>
  </p>
  <p align="justify" >
    <b>A quien corresponda:</b><br>
    Hemos leído cuidadosamente la Guía de servicios y procedimientos administrativos y el documento #BIENESTARCHMD, en las que se encuentran estipuladas las disposiciones y lineamientos académicos y administrativos; así como las cuotas para el ciclo escolar <b>2019-2020</b> y quedamos enterados y de acuerdo con su contenido y en que, su exacto cumplimiento será para beneficio de nuestro hijo (a).  Asimismo, nos comprometemos a cooperar con el Colegio en la consecución del logro de la labor educativa y, por lo tanto, convenimos en cumplir y hacer cumplir a nuestro (a), hijo (a) los mencionados reglamentos y demás normatividad.
  </p>
  <br><br>
  <p align="justify"  >
    <b>ATENTAMENTE</b>
  </p>
  <?php if(isset($papa)){
      ?>
      <br>
      <p align="justify" >
        <b>
          Nombre y firma del Padre o tutor:</b>	<?=$papa?>  	____________________

      </p>
      <?php
  } ?>
  <?php if(isset($mama)){
    ?>
    <br>
    <p align="left" >
      <b>
        Nombre y firma de la Madre o tutora:</b> <?=$mama?>   _____________________

    </p>
    <?php
  } ?>
<?php
  while( $alumno = mysqli_fetch_array($hijos)){
    $nombre  = $alumno['nombre'];
    ?>
    <br>
    <p align="left">
      <b>
        Nombre y firma del Alumno:</b>	<?=$nombre?>   ________________________
    </p>
    <?php
  }
 ?>
<br>
  <p align="justify" id="nota" >
    <b>
      Nota: favor de descargar, imprimir, firmar y enviar el acuse de recibo de la Guía de servicios y procedimientos administrativos y del documento #BIESTAR CHMD.  La entrega del acuse es obligatoria y deberá hacerse a más tardar el día 6 de septiembre de 2019 en las oficinas de la Dirección a la que pertenezca el menor de sus hijos.
    </b>
  </p>
</page>

<?php
$html = ob_get_contents();
ob_end_clean();


$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 25,
	'margin_right' => 25,
	'margin_top' => 30,
	'margin_bottom' => 30,
	'margin_header' => 0,
	'margin_footer' => 0
]);

$stylesheet = file_get_contents('../css/pdf_style2.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output('Carta_BienestarCHMD.pdf', \Mpdf\Output\Destination::DOWNLOAD);


?>