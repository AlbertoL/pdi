<?php 
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$rut=$db->cleanString($_POST['username']);
$nombre=$db->cleanString($_POST['nombre']);
$apellido=$db->cleanString($_POST['apellido']);
$clave=base64_encode($db->cleanString($_POST['clave']));
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

if($unidad==0 && $grado==0 && $id_categoria==0){
	echo "9";
}
$consultaUsuario=$db->consulta("SELECT * FROM usuarios WHERE rut='$rut'");
$rowId=$db->fetch_array($consultaUsuario);
$idUsuario=$rowId[0];
if ($db->num_rows($consultaUsuario)>0){
	$consulta=$db->consulta("select max(id_detalle_f)+1 from detalle_funcionario");
	$row=$db->fetch_array($consulta);
	$id_registroDetalle=$row[0];
	$consultaModificarUsuario=$db->consulta("UPDATE usuarios SET nombres_usu='$nombre', apellidos_usu='$apellido',clave='$clave',fecha_ing='$fecha' WHERE rut='$rut'");
	$consultaModificarEstado=$db->consulta("UPDATE detalle_funcionario SET id_estado_usu='2' WHERE id_usuario = '$idUsuario' AND id_estado_usu = '1' ");
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
 ?>
