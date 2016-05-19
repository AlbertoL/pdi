<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();
$consultaBuscar="SELECT cat.nombre_cat_det FROM categoria_det cat
LEFT JOIN subcategoria_det sub ON cat.id_categoria_det = sub.id_categoria_det WHERE sub.id_categoria_det IS NULL";
$retorno="";

$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while($row=$db->fetch_array($consulta)){
		$retorno.="<li><a href=\"#\" class='link_title'>".$row[0]."</a></li>";
	}
}else{
	$retorno="No existen titulos...";
}
echo $retorno;
?>