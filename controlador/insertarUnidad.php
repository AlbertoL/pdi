<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$nombre=$db->cleanString($_POST['nombre']);
$sigla=$db->cleanString($_POST['sigla']);
$descripcion=$db->cleanString($_POST['descripcion']);
$region=intval($_POST['region']);
$provincia=intval($_POST['provincia']);
$comuna=intval($_POST['comuna']);
$unidad=intval($_POST['unidad']);

if($unidad==0 && $comuna==0 && $provincia==0 && $region==0){
	echo "9";
}
$consultaUnidad=$db->consulta("SELECT * FROM unidad WHERE sigla LIKE '%$sigla%'");
if ($db->num_rows($consultaUnidad)==0) {
	$consulta=$db->consulta("select max(id_unidad)+1 from unidad");
	$row=$db->fetch_array($consulta);
	$id_registroUnidad=$row[0];
	$consultaInsertarUnidad=$db->consulta("INSERT INTO unidad(id_unidad,nombre_unidad,sigla,desc_unidad,comuna_id,id_unidad_padre)values('$id_registroUnidad','$nombre','$sigla','$descripcion','$comuna', '$unidad')");
	echo "1";
}else{
	echo "2";
}

?>