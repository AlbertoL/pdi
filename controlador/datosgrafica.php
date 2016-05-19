<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
sleep(2);
$db=new conexion();
$db->conectar();

$fecha=intval($_POST['fecha']);
$id_usuario=intval($_POST['idusu']);
$sth = $db->consulta("SELECT cs.nombre_casos as a, ti.total_rec as b FROM casos cs 
INNER JOIN tipo_casos ti ON cs.id_casos = ti.id_casos
INNER JOIN detalle_resumen dt ON ti.id_tipo_casos = dt.id_tipo_casos
INNER JOIN detalle_hoja_vida hv ON hv.id_detalle_hv = dt.id_detalle_hv
INNER JOIN hoja_vida ho ON ho.id_detalle_hv = hv.id_detalle_hv
INNER JOIN usuarios us ON us.id_usuario = ho.id_usuario where month(hv.fecha_hva) = '$fecha' and us.id_usuario = '".$id_usuario."'
");

$rows = array();
$flag = true;
$table = array();
$table['cols'] = array(
	array('label' => 'a', 'type' => 'string'),
    array('label' => 'b', 'type' => 'number')

);

$rows = array();
while($r = $db->fetch_array($sth)) {
    $temp = array();
    $temp[] = array('v' => (string) $r['a']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['b']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>