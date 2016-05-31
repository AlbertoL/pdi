<?php 
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$provincia=$_POST['provincia'];
$retorno="";

$consulta=$db->consulta("SELECT * FROM comuna where COMUNA_PROVINCIA_ID='$provincia'");
if($db->num_rows($consulta)>0){
	$retorno.='<label for="c_comuna"><i class="fa fa-map-marker" aria-hidden="true"></i> Comuna</label>';
	$retorno.="<select id='comuna' name='comuna' required><option value=''>(SELECCIONE)</option>";
	while ($rows=$db->fetch_array($consulta)) {
		$retorno.="<option value=".$rows[0].">".$rows[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="<h1>NO EXISTE comuna...</h1>";
}
echo $retorno;
 ?>