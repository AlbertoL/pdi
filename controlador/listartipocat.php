<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$retorno="";
$consulta=$db->consulta("SELECT id_tipo_cat, desc_tipo_cat From tipo_cat");
if ($db->num_rows($consulta)>0) {
	$retorno="<select id='tcategoria' name='tcategoria' class='tcategoria' required>
	<option value=''>(Seleccione una Tipo de Título)</option>";
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