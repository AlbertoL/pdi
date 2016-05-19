<?php 
sleep(2);
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$rut=$db->cleanString($_POST['rut']);
$consulta=$db->consulta("SELECT un.`id_unidad`,un.`sigla` FROM usuarios us INNER JOIN detalle_funcionario df
ON us.id_usuario = df.id_usuario INNER JOIN unidad_jefe uj ON df.id_detalle_f = uj.id_funcionario
INNER JOIN unidad un ON uj.id_unidad = un.id_unidad
INNER JOIN cargo cg ON cg.id_cargo = df.id_cargo WHERE us.`rut`='$rut' AND df.id_estado_usu ='1' ");
if($db->num_rows($consulta)>0){
	$retorno="<div id='d_unidad'><select id='categoria' name='categoria' class='categoria' required>
	<option value=''>(Seleccione una Categoría)</option>";
		while($row=$db->fetch_array($consulta)){
		$retorno.="<option value='".$row[0]."'>".$row[1]."</option>";
	}
	$retorno.="</select></div>";
}else{
	$retorno="El usuario no pertenece a ninguna Unidad";
}
echo $retorno;

 ?>