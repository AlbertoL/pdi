<?php 
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();

$error="";
$rut=$db->cleanString($_POST['username']);
$nombre=$db->cleanString($_POST['nombre']);
$apellido=$db->cleanString($_POST['apellido']);
$clave=$db->cleanString($_POST['clave']);
$fecha=$db->fechasql($_POST['fecha']);
$unidad=intval($_POST['unidad']);
$estado_unidad=false;

if(isset($_POST['unidadsj'])){
	$unidadsj=intval($_POST['unidadsj']);
	$estado_unidad=true;
}

$grado=intval($_POST['grado']);
$id_cargo=intval($_POST['cargo']);
$id_categoria=intval($_POST['categoria']);

if($unidad==0 or $grado==0 or $id_categoria==0){
	$error.="9";
}
if(empty($nombre) or strlen($nombre)<2 or strlen($nombre)>30){
	$error.="9";
}elseif (preg_match("/[^a-záéíóúàèìòùäëïöüñ\s]/i", $nombre)) {
	$error="9";
}
if(empty($apellido) or strlen($apellido)<2 or strlen($apellido)>30){
	$error.="9";
}elseif (preg_match("/[^a-záéíóúàèìòùäëïöüñ\s]/i", $apellido)) {
	$error="0";
}
if(empty($clave) or strlen($clave)<2 or strlen($clave)>30){
	$error.="9";
}elseif (preg_match("/[^a-zA-Z0-9@_\s]/i", $clave)) {
	$error.="9";
}

if($error == ""){
	$clave=base64_encode($db->cleanString($_POST['clave']));
	$consultaUsuario=$db->consulta("select * from usuarios where rut='$rut'");
	if($db->num_rows($consultaUsuario)==0){ 
	$consulta=$db->consulta("select max(id_detalle_f)+1 from detalle_funcionario");
	$row=$db->fetch_array($consulta);
	$id_registroDetalle=$row[0];
	$consultaInsertarUsuario=$db->consulta("INSERT INTO usuarios(nombres_usu,apellidos_usu,rut,clave,fecha_ing)values('$nombre','$apellido','$rut','$clave','$fecha')");
	$consultaInsertarDetalleUsuario=$db->consulta("INSERT INTO detalle_funcionario(id_detalle_f,id_usuario,id_grado,id_cargo,id_categoria_usu,id_estado_usu,fecha_detalle_usuario)
		values ('$id_registroDetalle',(select id_usuario from usuarios where rut='$rut'),'$grado','$id_cargo','$id_categoria',1,now())");
	if($estado_unidad){
	
	$consultaInsertarUnidadJefe=$db->consulta("INSERT INTO unidad_jefe(id_unidad,id_funcionario,fecha,jefe_funcionario) values('$unidad','$id_registroDetalle',now(),'$id_registroDetalle')");
	}else{
	$consultaInsertarUnidadJefe=$db->consulta("INSERT INTO unidad_jefe(id_unidad,id_funcionario,fecha) values('$unidad','$id_registroDetalle',now())");
	}
	echo "1";

	}else{
	echo "2";
	}
}
else{
	echo "9";
}

?>