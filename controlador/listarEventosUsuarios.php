<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();
$fecha1=$db->fechasql($_POST['fecha1']);
$fecha2=$db->fechasql($_POST['fecha2']);
$id_usuario=intval($_POST['usuario']);

$retorno="";

$consultaBuscar=("SELECT DATE(dh.fecha_hva) as fecha, us.nombres_usu, us.apellidos_usu, cat.nombre_cat_det, dh.id_detalle_hv, dh.id_cat_detalle,dh.id_funcionario,dh.detalle_titulo FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv
ON dh.id_detalle_hv = hv.id_detalle_hv INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle WHERE DATE(dh.fecha_hva) between '".$fecha1."' and '".$fecha2."' AND us.id_usuario = '".$id_usuario."' ORDER BY DATE(dh.fecha_hva) asc");
$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while ($row=$db->fetch_array($consulta)) {
			$retorno.="<tr>
						<td class='td_info'>".$db->fechaNormal($row[0])."</td>
            			<td class='td_info'>".$row[1]."</td>
            			<td class='td_info'>".$row[2]."</td>
            			<td class='td_info'>".$row[3]."</td>
            			<td class='td_info'><a href='#' id='modificarDatos3' class='modificarDatos3' name='modificarDatos3' fecha='".$row[0]."' iddetalle='".$row[4]."' idtitulo='".$row[5]."' idfuncionario='".$row[6]."' evaluacion='".$row[7]."'>Editar</a></td>
            			</tr>";
		}	
}
else{
	echo "Algo salió mal";
}
echo $retorno;
?>