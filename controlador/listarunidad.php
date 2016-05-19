<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";

$consulta=$db->consulta("SELECT un.`id_unidad`,un.`sigla` FROM unidad un");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='unidad' name='unidad' class='unidad' required>
	<option value=''>(Seleccione una unidad)</option>";
	while($row=$db->fetch_array($consulta)){
		$retorno.="<option value='".$row[0]."'>".$row[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="No existen unidades...";
	// $retorno.=$unidad;
}
echo $retorno;
?>