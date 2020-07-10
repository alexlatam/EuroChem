<?php
session_start();
include '../common/conexion.php';
include '../common/datosGenerales.php';
$section="pdf";

// Require composer autoload
require_once  '../../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

//consigue el id de producto via get
if(isset($_GET['id_producto'])){
	$id_producto = $_GET['id_producto']; 
	//verifica que el producto existe
	$sql = "SELECT COUNT(*) FROM `PRODUCTOS` WHERE `ID`=$id_producto";
	$query= mysqli_query($conn, $sql);
	$x = mysqli_fetch_array($query);
	if($x[0]>0){
		//good
	}else{
		exit();
	}
}else{
	exit();
}

//COnseguir todas las variables necesarias para la impresion del documento
$sql="SELECT f.*, p.TITULO FROM `FICHA_TECNICA` f INNER JOIN `PRODUCTOS` p ON p.ID=f.IDPRODUCTO  WHERE `IDPRODUCTO`='$id_producto' LIMIT 1";
$query= mysqli_query($conn, $sql);
//consigue caracteristicas

if($r = mysqli_fetch_array($query)){
	//caracteristicas principales
	$id_ficha = $r['ID'] ;
	$titulo = $r['TITULO'] ;
	$formula = $r['FORMULA'];
	$nombre_comercial = $r['NOMBRE_COMERCIAL'];
	$peso_molecular = $r['PESO_MOLECULAR'];
	$sinonimos = $r['SINONIMOS'];
	$descripcion = $r['DESCRIPCION'];
	$usos = $r['USOS'];
	$pie_pagina = $r['PIE_PAGINA'];

	//especificaciones tecnicas
	$sql = "SELECT * FROM ESPECIFICACIONES_TECNICAS WHERE IDFICHATECNICA=$id_ficha";
	$query_et = mysqli_query($conn, $sql);


}

$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="90%" style="text-align: left; font-size:12px">'.$pie_pagina.'</td>
        <td width="10%" align="center">{PAGENO}/{nbpg}</td>
    </tr>
</table>');

// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>

<table width="100%">
	<tr>
		<td width="10%">
			<img src="../../imagen/es/logo_texto.png" 
         style="width: 42mm;  margin: 0;" />
     	</td>
		<td  width="90%" style="text-align: right">
			<h1 style="background: #000066; color: #fff;
		    font-family: monospace;">&nbsp;&nbsp;<?=$titulo?>&nbsp;&nbsp;</h1>
		</td>
	</tr>
</table>

<h2 style="color: #313131; font-family: monospace;">IDENTIFICACIÓN</h2>
<table width="100%" style=" font-family: sans-serif;">
	<tr>
		<td width="10%"></td>
		<td width="40%">FORMULA QUIMICA:</td>
		<td width="40%"><?=$formula?></td>
		<td width="10%"></td>
	</tr>
	<tr>
		<td width="10%"></td>
		<td width="40%">NOMBRE COMERCIAL:</td>
		<td width="40%"><?=$nombre_comercial?></td>
		<td width="10%"></td>
	</tr>
	<tr>
		<td width="10%"></td>
		<td width="40%">PESO MOLECULAR: </td>
		<td width="40%"><?=$peso_molecular?></td>
		<td width="10%"></td>
	</tr>
	<tr>
		<td width="10%"></td>
		<td width="40%">SINÓNIMOS:</td>
		<td width="40%"><?=$sinonimos?></td>
		<td width="10%"></td>
	</tr>
</table>
<hr  style="background:#2e21f3">
<h2 style="color: #313131; font-family: monospace;">DESCRIPCIÓN</h2>
<p style="text-align: justify;"><?=$descripcion?></p>
<hr  style="background:#2e21f3">
<h2 style="color: #313131; font-family: monospace;">USOS</h2>
<p style="text-align: justify;"><?=$usos?></p>
<hr  style="background:#2e21f3">
<h2 style="color: #313131; font-family: monospace;">ESPECIFICACIONES TECNICAS</h2>

<table width="100%" style="text-align: center; font-family: sans-serif;" >
	<tr>
		<th style="background: #000066;
    color: #fff;
    border-left: #000 solid 1px;
    border-right: #000 solid 1px;">Propiedad</th>
    <th style="background: #000066;
    color: #fff;
    border-left: #000 solid 1px;
    border-right: #000 solid 1px;">Método</th>
		<th style="background: #000066;
    color: #fff;
    border-left: #000 solid 1px;
    border-right: #000 solid 1px;">Unidad</th>
		<th style="background: #000066;
    color: #fff;
    border-left: #000 solid 1px;
    border-right: #000 solid 1px;">Especificación</th>
	</tr>
	<?php 
		while($w = mysqli_fetch_array($query_et)){
			$propiedad = $w['PROPIEDAD'] != '' ? $w['PROPIEDAD'] : '-' ;
			$metodo = $w['METODO'] != '' ? $w['METODO'] : '-' ;
			$unidad = $w['UNIDAD'] != '' ? $w['UNIDAD'] : '-' ;
			$especificacion = $w['ESPECIFICACION'] != '' ? $w['ESPECIFICACION'] : '-' ;
	  ?>
	<tr>
		<td><?=$propiedad?></td>
		<td><?=$metodo?></td>
		<td><?=$unidad?></td>
		<td><?=$especificacion?></td>
	</tr>
	 <?php 
		}
	 ?>
</table>


<?php
// Now collect the output buffer into a variable
$html = ob_get_contents();
ob_end_clean();

// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
