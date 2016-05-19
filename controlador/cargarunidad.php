<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";

$consulta=$db->consulta("SELECT id_unidad, sigla FROM unidad");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='unidad' name='unidad' class='unidad' required>
	<option value=''>(Seleccione una Unidad)</option>";
	while($row=$db->fetch_array($consulta)){
		$retorno.="<option value='".$row[0]."'>".$row[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="No existen unidades...";
}
echo $retorno;
?>