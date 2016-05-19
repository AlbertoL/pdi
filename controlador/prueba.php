<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$b=$db->cleanString($_POST['b']);
$consulta=$db->consulta("SELECT us.nombres_usu FROM usuarios us WHERE us.nombres_usu LIKE '%".$b."%' ");
if($db->num_rows($consulta)>0){
	while ($rows=$db->fetch_array($consulta)) {
		$retorno .= "<p>".$rows[0]."</p>";
		// $retorno.="<option value=".$rows[0].">"."</option>";
	}
}else{
	$retorno="<h1>NO EXISTE EVALUADOR...</h1>";
}
echo $retorno;
 ?>