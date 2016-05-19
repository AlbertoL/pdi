<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();

$consultaResumen=$db->consulta("SELECT DATE(dh.fecha_hva), us.nombres_usu, us.apellidos_usu, cat.nombre_cat_det, tp.desc_tipo_cat FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv
ON dh.id_detalle_hv = hv.id_detalle_hv INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle INNER JOIN tipo_cat tp ON cat.id_tipo_cat = tp.id_tipo_cat where cat.id_tipo_cat = '2'");