<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";

$consulta=$db->consulta("SELECT * FROM cargo");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='cargo' name='cargo' class='cargo' required>
	<option value=''>(Seleccione un Cargo)</option>";
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