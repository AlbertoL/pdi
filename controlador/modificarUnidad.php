<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$id=intval($_POST['unidad1']);
$nombre=$db->cleanString($_POST['nombre']);
$sigla=$db->cleanString($_POST['sigla']);
$descripcion=$db->cleanString($_POST['descripcion']);
$region=intval($_POST['region']);
$provincia=intval($_POST['provincia']);
$comuna=intval($_POST['comuna']);
$unidadpadre=intval($_POST['unidad']);


if($unidad==0 && $comuna==0 && $provincia==0 && $region==0){
	echo "9";
}
$consultaUnidad=$db->consulta("SELECT * FROM unidad WHERE id_unidad='$id'");
// echo $id;
if ($db->num_rows($consultaUnidad)>0) {
$consultaModificarUnidad=$db->consulta("UPDATE unidad SET nombre_unidad='$nombre', sigla='$sigla', desc_unidad='$descripcion',comuna_id='$comuna',id_unidad_padre='$unidad' WHERE id_unidad='$id'");
	echo "1";
}else{
	echo "2";
}

?>