<?php 
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$investigar_rec=intval($_POST['investigar_rec']);
$investigar_cr=intval($_POST['investigar_cr']);
$investigar_sr=intval($_POST['investigar_sr']);
$detencion_rec=intval($_POST['detencion_rec']);
$detencion_cr=intval($_POST['detencion_cr']);
$detencion_sr=intval($_POST['detencion_sr']);
$girdoc_rec=intval($_POST['girdoc_rec']);
$girdoc_cr=intval($_POST['girdoc_cr']);
$girdoc_sr=intval($_POST['girdoc_sr']);
$arresto_rec=intval($_POST['arresto_rec']);
$arresto_cr=intval($_POST['arresto_cr']);
$arresto_sr=intval($_POST['arresto_sr']);
$intrucciones_rec=intval($_POST['instrucciones_rec']);
$intrucciones_cr=intval($_POST['instrucciones_cr']);
$intrucciones_sr=intval($_POST['instrucciones_sr']);
$citaciones_rec=intval($_POST['citaciones_rec']);
$citaciones_cr=intval($_POST['citaciones_cr']);
$citaciones_sr=intval($_POST['citaciones_sr']);

$verbales=intval($_POST['verbales']);
$detenidosjuzgados=intval($_POST['detenidosjuzgados']);
$guardia=intval($_POST['guardia']);
$comision_servicio=intval($_POST['comision_servicio']);
$controles_identidad=intval($_POST['controles_identidad']);

$funcionario=intval($_POST['funcionario']);
$evaluacionText=$db->cleanString($_POST['evaluacion']);
$evaluador=intval($_POST['evaluador']);
$fecha=$db->fechasql($_POST['fecha2']);

if($funcionario==0 or $evaluador==0){
	echo "9";
}
$consultaCategoria=$db->consulta("SELECT * FROM subcategoria_det WHERE nombre_subcat like '%evaluacion%'");

if ($db->num_rows($consultaCategoria)>0) {
		while ($row=$db->fetch_array($consultaCategoria)) {
			$idSubcategoria = $row[0];
			$idCategoria = $row[1];
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
							$consultaInsertar=$db->consulta("INSERT INTO detalle_hoja_vida(id_subcategoria_det,id_jefe_unidad,id_funcionario,id_cat_detalle,fecha_hva,detalle_titulo)values('$idSubcategoria','$idJefeUnidad','$idFuncionario','$idCategoria','$fecha','$evaluacionText')");
							if ($db->affected_rows($consultaInsertar)==TRUE) {
								$consultaDetalleHoja=$db->consulta("SELECT max(id_detalle_hv) FROM detalle_hoja_vida");
								if ($db->num_rows($consultaDetalleHoja)>0) {
									$row=$db->fetch_array($consultaDetalleHoja);
									$idDetalleHoja = $row[0];
									$consultaInsertaHoja=$db->consulta("INSERT INTO hoja_vida(id_usuario,id_detalle_hv)values('$funcionario','$idDetalleHoja')");
									
										// INSERT ORDENES DE INVESTIGAR 
									$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(13,'$investigar_cr','$investigar_sr','$investigar_rec')");
									$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
									$row=$db->fetch_array($consultaBuscarCaso);
										$maxCaso=$row[0];

									$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT ORDENES DE DETENCION
									$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(14,'$detencion_cr','$detencion_sr','$detencion_rec')");
									$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
									$row=$db->fetch_array($consultaBuscarCaso);
										$maxCaso=$row[0];

									$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT ORDENES POR GIRDOC 
										$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(15,'$girdoc_cr','$girdoc_sr','$girdoc_rec')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT ORDENES DE ARRESTO
										$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(16,'$arresto_cr','$arresto_sr','$arresto_rec')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT TRAMITES E INSTRUCCIONES
										$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(17,'$intrucciones_cr','$intrucciones_sr','$intrucciones_rec')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT CITACIONES
										$consultaCasosUno=$db->consulta("INSERT INTO tipo_casos(id_casos,c_r,s_r,total_rec)values(18,'$citaciones_cr','$citaciones_sr','$citaciones_rec')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT ORDENES VERBALES
										$consultaCasosDos=$db->consulta("INSERT INTO tipo_casos(id_casos,total_rec)values(19,'$verbales')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT DETENIDOS AL JUZGADO
										$consultaCasosDos=$db->consulta("INSERT INTO tipo_casos(id_casos,total_rec)values(20,'$detenidosjuzgados')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// INSERT SERVICIOS DE GUARDIA
										$consultaCasosDos=$db->consulta("INSERT INTO tipo_casos(id_casos,total_rec)values(21,'$guardia')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");
										
										// INSERT COMISIONES DE SERVICIO

										$consultaCasosDos=$db->consulta("INSERT INTO tipo_casos(id_casos,total_rec)values(22,'$comision_servicio')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										// CONTROLES DE IDENTIDAD
										$consultaCasosDos=$db->consulta("INSERT INTO tipo_casos(id_casos,total_rec)values(23,'$controles_identidad')");
										$consultaBuscarCaso=$db->consulta("SELECT max(id_tipo_casos) FROM tipo_casos");
										$row=$db->fetch_array($consultaBuscarCaso);
											$maxCaso=$row[0];

										$consultaDetalleCaso=$db->consulta("INSERT INTO detalle_resumen(id_tipo_casos,id_detalle_hv)values('$maxCaso','$idDetalleHoja')");

										echo "1";

									}else{
										echo "No se pudo Insertar";
									}

							}else{
								echo "2";
							}

					}else{
						echo "2";
					}

				}else{
					echo "2";
				}
			}else{
				echo "2";
			}

	}else{
		echo "2";
	}

?>