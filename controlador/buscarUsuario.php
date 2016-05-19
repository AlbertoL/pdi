<?php 
sleep(2);
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$rut=$db->cleanString($_POST['rut']);
$consulta=$db->consulta("SELECT us.rut FROM usuarios us WHERE us.`rut`='$rut'");
if($db->num_rows($consulta)>0){
		$retorno="1";
}else{
	$retorno="0";
}
echo $retorno;

 ?>