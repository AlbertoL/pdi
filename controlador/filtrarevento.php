<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();
$fecha1=$db->fechasql($_POST['fecha1']);
$fecha2=$db->fechasql($_POST['fecha2']);

$retorno="";

$consultaBuscar=("SELECT date_format(DATE(dh.fecha_hva),' %d-%m-%Y') as Fecha, us.nombres_usu, us.apellidos_usu, cat.nombre_cat_det, tp.desc_tipo_cat FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv
ON dh.id_detalle_hv = hv.id_detalle_hv INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle INNER JOIN tipo_cat tp ON cat.id_tipo_cat = tp.id_tipo_cat WHERE DATE(dh.fecha_hva) between '".$fecha1."' and '".$fecha2."' AND us.id_usuario = '".$id_usuario."' cat.id_tipo_cat = '2' ORDER BY DATE(dh.fecha_hva) asc");
$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while ($row=$db->fetch_array($consulta)) {
			$retorno.="<tr>
						<td class='td_info'>".$row[0]."</td>
            			<td class='td_info'>".$row[1]."</td>
            			<td class='td_info'>".$row[2]."</td>
            			<td class='td_info'>".$row[3]."</td>
            			</tr>"
		}	
}
else{
	echo "Algo salió mal";
}
echo $retorno;
?>