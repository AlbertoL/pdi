<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$consulta=$db->consulta("SELECT df.id_detalle_f, us.nombres_usu, us.apellidos_usu, cg.desc_cargo FROM usuarios us INNER JOIN detalle_funcionario df
ON us.id_usuario = df.id_usuario INNER JOIN unidad_jefe uj 
ON df.id_detalle_f = uj.id_funcionario INNER JOIN unidad un 
ON uj.id_unidad = un.id_unidad INNER JOIN cargo cg ON cg.id_cargo = df.id_cargo 
WHERE un.id_unidad = '$unidad' AND df.id_estado_usu = '1' AND (cg.id_cargo = '1' or cg.id_cargo = '2')");
if($db->num_rows($consulta)>0){
	while ($rows=$db->fetch_array($consulta)) {
		$retorno.="<option value=".$rows[0].">".$rows[1]."".' '."".$rows[2]."".' '."".$rows[3]."</option>";
	}
}else{
	$retorno="<h1>NO EXISTE EVALUADOR...</h1>";
}
echo $retorno;
 ?>