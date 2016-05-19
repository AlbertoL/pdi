<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";

$consulta=$db->consulta("SELECT id_categoria_usu, desc_categoria_usu From categoria_usu");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='categoria' name='categoria' class='categoria' required>
	<option value=''>(Seleccione una Categoría)</option>";
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