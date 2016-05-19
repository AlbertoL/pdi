<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$id=intval($_POST['titulo1']);
$tipocat=intval($_POST['tcategoria']);
$nombre=$db->cleanString($_POST['nombrebt']);




$consultaTitulo=$db->consulta("SELECT * FROM categoria_det WHERE id_categoria_det='$id'");
// echo $id;
if ($db->num_rows($consultaTitulo)>0) {
$consultaModificarTitulo=$db->consulta("UPDATE categoria_det SET  id_tipo_cat ='$tipocat',nombre_cat_det='$nombre'  WHERE id_categoria_det='$id'");
	echo "1";
}else{
	echo "2";
}

?>