<?php
include '../controlador/sesion.php'; 
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$consulta=$db->consulta("SELECT * FROM region");
if($db->num_rows($consulta)>0){
	$retorno.="<select id='region' name='region' class='region' required><option value=''>(SELECCIONE)</option>";
	while ($rows=$db->fetch_array($consulta)) {
		$retorno.="<option value=".$rows[0].">".$rows[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="<h1>NO EXISTE REGION...</h1>";
}
echo $retorno;
 ?>