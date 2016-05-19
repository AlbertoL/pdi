<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";

$consulta=$db->consulta("SELECT un.`id_unidad`,un.`sigla` FROM unidad un WHERE un.`id_unidad` NOT IN (SELECT id_unidad FROM unidad_jefe WHERE jefe_funcionario IS NULL) ");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='unidadsj' name='unidadsj' class='grado' >
	<option value='0'>(Seleccione una Unidaddes sin jefatura)</option>";
	while($row=$db->fetch_array($consulta)){
		$retorno.="<option value='".$row[0]."'>".$row[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="No existen cargos...";
	// $retorno.=$unidad;
}
echo $retorno;
?>