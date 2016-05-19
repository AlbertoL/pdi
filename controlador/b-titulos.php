<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$t=$db->cleanString($_POST['t']);
$titulo=$db->consulta("SELECT cat.id_categoria_det, cat.nombre_cat_det FROM categoria_det cat LEFT JOIN subcategoria_det sub ON cat.id_categoria_det = sub.id_categoria_det WHERE sub.id_categoria_det IS NULL AND cat.nombre_cat_det LIKE '%".$t."%' ORDER BY cat.nombre_cat_det ASC");
if($db->num_rows($titulo)>0){
	while ($rows=$db->fetch_array($titulo)) {
		$retorno .= "<li id=".$rows[0].">".$rows[1]."</li>";
	}
}else{
	$retorno="<li>EL TITULO NO EXISTE...</li>";
}
echo $retorno;

?>