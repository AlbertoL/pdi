<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$b=$db->cleanString($_POST['b']);
$consulta=$db->consulta("SELECT us.id_usuario, CONCAT(us.nombres_usu,' ',us.apellidos_usu) as Funcionario FROM usuarios us
INNER JOIN detalle_funcionario dt ON dt.id_usuario = us.id_usuario
INNER JOIN categoria_usu ct ON ct.id_categoria_usu = dt.id_categoria_usu
INNER JOIN grado gr ON gr.id_grado = dt.id_grado
INNER JOIN unidad_jefe uj ON dt.id_detalle_f = uj.id_funcionario
INNER JOIN unidad un ON un.id_unidad = uj.id_unidad
WHERE un.id_unidad = '".$unidad."' AND dt.id_estado_usu = '1' AND (us.nombres_usu LIKE '%".$b."%' OR us.apellidos_usu LIKE '%".$b."%')");
if($db->num_rows($consulta)>0){
	while ($rows=$db->fetch_array($consulta)) {
		$retorno .= "<li id=".$rows[0].">".$rows[1]."</li>";
		// $retorno.="<option value=".$rows[0].">"."</option>";
	}
}else{
	$retorno="<li>EL FUNCIONARIO NO EXISTE...</li>";
}
echo $retorno;
 ?>