<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$tcategoria=intval($_POST['tcategoria']);
$nombret=$db->cleanString($_POST['nombret']);




$consultaTitulo=$db->consulta("SELECT * FROM categoria_det WHERE nombre_cat_det LIKE '%$nombret%'");
if ($db->num_rows($consultaTitulo)==0) {	
	$consultaInsertarTitulo=$db->consulta("INSERT INTO categoria_det(id_tipo_cat,nombre_cat_det)values('$tcategoria','$nombret')");
	echo "1";
}else{
	echo "2";
}

?>