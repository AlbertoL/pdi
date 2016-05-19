<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
sleep(2);

$fecha=$db->fechaSql($_POST['fecha6']);
$evaluador=intval($_POST['evaluador']);
$id_detalle=intval($_POST['iddetalle']);
$id_funcionario=intval($_POST['idfuncionario']);
$id_titulo=intval($_POST['titulo']);
$evaluacion=$db->cleanString($_POST['evaluacion']);
// echo $fecha;
if($id_titulo==0 or $id_funcionario==0 or $evaluador==0){
	echo "9";
}

$consultaJefe=$db->consulta("SELECT id_unidad_jefe FROM unidad_jefe WHERE id_funcionario = '$evaluador'");
if ($db->num_rows($consultaJefe)>0) {
			$row=$db->fetch_array($consultaJefe);
			$idJefeUnidad=$row[0];
			$consultaUpdate=$db->consulta("UPDATE detalle_hoja_vida SET id_jefe_unidad='$idJefeUnidad',id_funcionario='$id_funcionario',id_cat_detalle='$id_titulo',fecha_hva='$fecha',detalle_titulo='$evaluacion' WHERE id_detalle_hv='$id_detalle'");
			if ($db->affected_rows($consultaUpdate)==TRUE) {
				echo "1";
			}
			else{
				echo "2";
			}

}
else{
	echo "2";
}

?>

