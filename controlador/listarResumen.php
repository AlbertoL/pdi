<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();

$fecha=intval($_POST['fecha']);
$id_usuario=intval($_POST['idusu']);
$retorno="";
$consultaBuscar=$db->consulta("SELECT cs.nombre_casos, ti.total_rec, ifnull(ti.c_r,'-'), ifnull(ti.s_r,'-'), hv.fecha_hva, us.nombres_usu, us.apellidos_usu, us.id_usuario FROM casos cs 
INNER JOIN tipo_casos ti ON cs.id_casos = ti.id_casos
INNER JOIN detalle_resumen dt ON ti.id_tipo_casos = dt.id_tipo_casos
INNER JOIN detalle_hoja_vida hv ON hv.id_detalle_hv = dt.id_detalle_hv
INNER JOIN hoja_vida ho ON ho.id_detalle_hv = hv.id_detalle_hv
INNER JOIN usuarios us ON us.id_usuario = ho.id_usuario where month(hv.fecha_hva) = '$fecha' and us.id_usuario = '".$id_usuario."'");


if ($db->num_rows($consultaBuscar)>0) {
	while ($row=$db->fetch_array($consultaBuscar)) {
		$retorno.="<tr>
						<td>".$row[0]."</td>
						<td>".$row[1]."</td>
						<td>".$row[2]."</td>
						<td>".$row[3]."</td>
					</tr>";
	}

}
else{
	$retorno="No existe resumen mensual";
}

echo $retorno;
?>