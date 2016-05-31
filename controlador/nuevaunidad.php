<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$nombre=$db->cleanString($_POST['nombre']);
$error="";
$sigla=$db->cleanString($_POST['sigla']);
$descripcion=$db->cleanString($_POST['descripcion']);
$region=intval($_POST['region']);
$provincia=intval($_POST['provincia']);
$comuna=intval($_POST['comuna']);
$unidad=intval($_POST['unidad']);

if($unidad==0 || $comuna==0 || $provincia==0 || $region==0 || empty($nombre)){
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
	$consultaUnidad=$db->consulta("SELECT * FROM unidad WHERE sigla LIKE '$sigla'");
		if ($db->num_rows($consultaUnidad)==0) {
			$consulta=$db->consulta("select max(id_unidad)+1 from unidad");
			$row=$db->fetch_array($consulta);
			$id_registroUnidad=$row[0];
				$consultaInsertarUnidad=$db->consulta("INSERT INTO unidad(id_unidad,nombre_unidad,sigla,desc_unidad,comuna_id,id_unidad_padre)values('$id_registroUnidad','$nombre','$sigla','$descripcion','$comuna', '$unidad')");
			echo "1";
		}else{
			echo "2";
		}
}else{
	echo $error;
}

?>