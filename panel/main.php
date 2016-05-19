<?php
include '../controlador/sesion.php';
include '../archivo/conexion.php';

$db=new conexion();
$db->conectar();
$consultaBuscar="SELECT cat.id_categoria_det, cat.nombre_cat_det FROM categoria_det cat
LEFT JOIN subcategoria_det sub ON cat.id_categoria_det = sub.id_categoria_det
WHERE sub.id_categoria_det IS NULL ORDER BY cat.nombre_cat_det ASC";

$funcionarios="SELECT us.id_usuario, CONCAT(us.nombres_usu,' ',us.apellidos_usu) as Funcionario FROM usuarios us
INNER JOIN detalle_funcionario dt ON dt.id_usuario = us.id_usuario
INNER JOIN categoria_usu ct ON ct.id_categoria_usu = dt.id_categoria_usu
INNER JOIN grado gr ON gr.id_grado = dt.id_grado
INNER JOIN unidad_jefe uj ON dt.id_detalle_f = uj.id_funcionario
INNER JOIN unidad un ON un.id_unidad = uj.id_unidad
WHERE un.id_unidad = '".$unidad."' AND dt.id_estado_usu = '1'";

$retorno = "";
$rsp = "";

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Panel</title>
	<link rel="stylesheet" href="../css/normalize.css"/>
	<link rel="stylesheet" href="../css/font-awesome.css"/>
	<link rel="stylesheet" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui.min.css"/>
</head>
<body>
	<div class="content_global">
	<?php
		include '../vistas/header.php';
	?>
		<div class="body_content">
			<?php
			include '../vistas/menu-lateral.php';
			?>
			<div class="contenedor-section">
				<section class="item-usuario">
					<div class="subtitle">
						<span class="ocultar"><i class="fa fa-users" aria-hidden="true"></i>Funcionarios</span>
						<i class="i-buscar fa fa-search" aria-hidden="true"></i>
						<input type="text" id="busqueda" class="buscar" placeholder="Buscar"/>
					</div>
					<ul id="list-user">
						<?php
								$con=$db->consulta($funcionarios);
								if ($db->num_rows($con)>0) {
									while($row=$db->fetch_array($con)){
									$rsp.="<li id=".$row[0].">".$row[1]."</li>";
									}
								}else{
								$rsp="No existen titulos...";
								}
								echo $rsp;
						?>
					</ul>
				</section>
				<section class="item-titulos">
					<div class="subtitle">
						<span class="ocultar"><i class="fa fa-file-archive-o" aria-hidden="true"></i>Informes</span><i class="i-buscar fa fa-search" aria-hidden="true"></i><input id="titulos" type="text" class="buscar" placeholder="Buscar">
					</div>
					<ul id="list-titulos">
						<?php
								$consulta=$db->consulta($consultaBuscar);
								if ($db->num_rows($consulta)>0) {
									while($row=$db->fetch_array($consulta)){
									$retorno.="<li id=".$row[0].">".$row[1]."</li>";
									}
								}else{
								$retorno="No existen titulos...";
								}
								echo $retorno;
						?>
					</ul>
				</section>
				<section class="contenedor-form">
					<div class="subtitle">
						<i class="izq fa fa-file-text" aria-hidden="true"></i>
						<label for="" class="sub-form">Nuevo Informe</label>
					</div>
					<div class="c-info">
						<form action="#" id="frmInforme" method="POST">
							<div class="c-input">
								<span class="d-name">Funcionario</span><span id="t-name" class="u-name">-</span>
							</div>
							<div class="c-input">
								<span class="d-name">Informe</span><span id="t-title" class="u-name">-</span>
							</div>
							<div class="c-input">
								<span class="d-name">Fecha</span><span><input id="fecha" class="i-fecha" name="fecha" type="text" placeholder="dd-mm-aaaa" required/></span>
							</div>
							<div class="c-input">
								<span class="d-name">Evaluador</span>
								<span>
									<select name="evaluador" id="evaluador">

									</select>
								</span>
							</div>
							<div class="c-text">
								<textarea id="descripcion" name="descripcion" id="" cols="30" rows="10" placeholder="Escriba su informe" required></textarea>
								<input class="b-izq b-input" type="submit" value="Registrar"> <input id="cancelar" class="b-der b-input" type="button" value="Cancelar">
							</div>
							<div id="msgFormulario"></div>
						</form>
					</div>

				</section>
			</div>

		</div>
		<?php
		include '../vistas/footer.php';
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/modernizr.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>