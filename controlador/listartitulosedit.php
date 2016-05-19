<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";
$consulta=$db->consulta("SELECT nt.`id_categoria_det`,nt.`nombre_cat_det` From categoria_det nt");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='titulo1' name='titulo1' class='titulo1' required>
	<option value=''>(Seleccione un Título)</option>";
	while($row=$db->fetch_array($consulta)){
		$retorno.="<option value='".$row[0]."'>".$row[1]."</option>";
	}
	$retorno.="</select>";
}else{
	$retorno="No existen tipos...";
	// $retorno.=$unidad;
}
echo $retorno

?>
