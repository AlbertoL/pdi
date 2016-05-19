<?php
include '../archivo/conexion.php';
include '../controlador/sesion.php';
// sleep(2);
$db=new conexion();
$db->conectar();
$consultaBuscar="SELECT us.rut, CONCAT(us.nombres_usu,' ',us.apellidos_usu) as Funcionario, gr.desc_grado, ct.desc_categoria_usu, un.nombre_unidad, us.id_usuario FROM usuarios us
INNER JOIN detalle_funcionario dt ON dt.id_usuario = us.id_usuario
INNER JOIN categoria_usu ct ON ct.id_categoria_usu = dt.id_categoria_usu
INNER JOIN grado gr ON gr.id_grado = dt.id_grado
INNER JOIN unidad_jefe uj ON dt.id_detalle_f = uj.id_funcionario
INNER JOIN unidad un ON un.id_unidad = uj.id_unidad
WHERE un.id_unidad = '".$unidad."' AND dt.id_estado_usu = '1'";
$retorno="";
if(isset($_POST['search'])){
	$rutBuscar=$db->cleanString($_POST['search']);
	$consultaBuscar.=" and us.rut='$rutBuscar'";
}
$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while($row=$db->fetch_array($consulta)){
		$retorno.="<article class=\"hva_personal\">
				<div class=\"perfil\">
					<img src=\"../img/Customer.png\" alt=\"img_funcionario\"/>
					<span class=\"dni\">".$row[0]."</span>
				</div>
				<div class=\"perfil_general\">
					<div class=\"datos_perfil\">
						<h4 class=\"name_funcionario\">".$row[1]."</h4>
						<span class=\"cargo\">".$row[2]." ".$row[3]."</span>
					</div>
					<div class=\"perfil_option\">
						<div>
							<ul>
								<li>
									<a target=\"_blank\" class=\"enlace_hva\" href=\"../vistas/reportepdf.php?id=".$row[5]."\">HVA</a>
								</li>
								<li>
									<a class=\"enlace_anadir\" href=\"./nuevo-informe.php?id=".$row[5]."\">Añadir</a>
								</li>
								<li>
									<a class=\"enlace_editar\" href=\"./editar-informe.php?id=".$row[5]."\">Editar</a>
								</li>
								<li>
									<a class=\"enlace_resumen\" href=\"./resumen_estadistico.php?id=".$row[5]."\">Resumen</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</article>";
	}
}else{
	$retorno="No existen funcionarios...";
	// $retorno.=$unidad;
}
echo $retorno;
?>