<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';
sleep(2);
$db=new conexion();
$db->conectar();
$titulo=intval($_POST['idtitulo']);
$funcionario=intval($_POST['funcionario']);
$evaluador=intval($_POST['evaluador']);
$contenido=$db->cleanString($_POST['descripcion']);
$fecha=$db->fechasql($_POST['fecha']);
$retorno = "";

if ($funcionario==0 or $titulo==0 or $evaluador==0) {
	echo "3";
}
else{
	if (strlen($contenido)<50) {
		echo "3";
	}
}

$consultaUsuario=$db->consulta("SELECT id_detalle_f FROM detalle_funcionario where id_usuario = '$funcionario' AND id_estado_usu ='1'");

if($db->num_rows($consultaUsuario)>0){
	$row=$db->fetch_array($consultaUsuario);
		$idDetFuncionario=$row[0];
		$consultaUnidadJefe=$db->consulta("SELECT id_unidad_jefe FROM unidad_jefe WHERE id_funcionario = '$idDetFuncionario'");
	if ($db->num_rows($consultaUnidadJefe)>0) {
		while($row=$db->fetch_array($consultaUnidadJefe)){	
			$idFuncionario=$row[0];
		}
		$consultaJefe=$db->consulta("SELECT id_unidad_jefe FROM unidad_jefe WHERE id_funcionario = '$evaluador'");
		if ($db->num_rows($consultaJefe)>0) {
			$row=$db->fetch_array($consultaJefe);
			$idJefeUnidad=$row[0];
			$consultaInsertar=$db->consulta("INSERT INTO detalle_hoja_vida(id_jefe_unidad,id_funcionario,id_cat_detalle,fecha_hva,detalle_titulo)values('$idJefeUnidad','$idFuncionario','$titulo','$fecha','$contenido')");
			if ($db->affected_rows($consultaInsertar)==TRUE) {
				$consultaDetalleHoja=$db->consulta("SELECT max(id_detalle_hv) FROM detalle_hoja_vida");
				if ($db->num_rows($consultaDetalleHoja)>0) {
					$row=$db->fetch_array($consultaDetalleHoja);
					$idDetalleHoja = $row[0];
					$consultaInsertaHoja=$db->consulta("INSERT INTO hoja_vida(id_usuario,id_detalle_hv)values('$funcionario','$idDetalleHoja')");
					echo "1";
				}else{
					echo "No se pudo Insertar";
				}

			}
			else{
				echo "2";
			}

		}
		else{
			echo "2";
		}

	}
	else{
		echo "2";
	}
}else{
	echo "2";
}
?>