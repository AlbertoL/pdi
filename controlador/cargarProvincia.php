<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$region=$_POST['region'];
$retorno="";

$consulta=$db->consulta("SELECT * FROM provincia where PROVINCIA_REGION_ID='$region'");
if($db->num_rows($consulta)>0){
	$retorno.='<label for="c_provincia"><i class="fa fa-map-marker" aria-hidden="true"></i> Provincia</label>';
	$retorno.="<select id='provincia' name='provincia' class='provincia' required><option value=''>(SELECCIONE)</option>";
	while ($rows=$db->fetch_array($consulta)) {
		$retorno.="<option value=".$rows[0].">".$rows[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="<h1>NO EXISTE provincia...</h1>";
}
echo $retorno;
 ?>