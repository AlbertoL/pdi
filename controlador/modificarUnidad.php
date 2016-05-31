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


if($id == 0 || $unidadpadre==0 || $comuna==0 || $provincia==0 || $region==0 || empty($nombre)){
	echo "9";
}
if(empty($nombre) or strlen($nombre)<2 or strlen($nombre)>30){
	$error.="9";
}elseif(preg_match("/[^a-záéíóúàèìòùäëïöüñ\s]/i", $nombre)) {
	$error="9";
}
if(empty($sigla) or strlen($sigla)<2 or strlen($sigla)>30){
	$error.="9";
}elseif(preg_match("/[^a-záéíóúàèìòùäëïöüñ\s]/i", $sigla)) {
	$error="9";
}
if(empty($descripcion) or strlen($descripcion)<2 or strlen($descripcion)>30){
	$error.="9";
}elseif(preg_match("/[^a-záéíóúàèìòùäëïöüñ\s]/i", $descripcion)) {
	$error="9";
}

if ($error == "") {
	$consultaUnidad=$db->consulta("SELECT * FROM unidad WHERE id_unidad='$id'");

	if ($db->num_rows($consultaUnidad)>0) {
		$consultaModificarUnidad=$db->consulta("UPDATE unidad SET nombre_unidad='$nombre', sigla='$sigla', desc_unidad='$descripcion',comuna_id='$comuna',id_unidad_padre='$unidad' WHERE id_unidad='$id'");
		echo "1";
	}else{
		echo "2";
	}
}else{
	echo $error;
}

?>