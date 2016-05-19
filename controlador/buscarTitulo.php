<?php 
sleep(2);
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$id=intval($_POST['id']);
$consulta=$db->consulta("SELECT * FROM categoria_det WHERE id_categoria_det = '$id'");
if($db->num_rows($consulta)>0){
	while($row=$db->fetch_array($consulta)){
			$retorno.='<div>
							<label for="nombre">Nombre Titulo</label>
							<input type="text" id="nombrebt" class="cl_nombre" name="nombrebt" value="'.$row[2].'">
						</div>';

	}
}else{
	$retorno="0";
}
echo $retorno;

 ?>