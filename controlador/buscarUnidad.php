<?php 
sleep(2);
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$id=intval($_POST['id']);
$consulta=$db->consulta("SELECT * FROM unidad WHERE id_unidad = '$id'");
if($db->num_rows($consulta)>0){
	while($row=$db->fetch_array($consulta)){
			$retorno.="<div>
							<label for=\"nombre\">Nombre Unidad</label>
							<input type=\"text\" id=\"nombre\" class=\"nombre\" name=\"nombre\" value='".$row[1]."'/>
						</div>
						<div>
							<label for=\"sigla\">SIGLA Unidad</label>
							<input type=\"text\" id=\"sigla\" class=\"sigla\" name=\"sigla\" value='".$row[2]."'>
						</div>
						<div>
							<label for=\"descripcion\">Descripción</label>
							<input type=\"text\" id=\"descripcion\" class=\"desc\" name=\"descripcion\" value='".$row[3]."'>
						</div>";

	}
}else{
	$retorno="0";
}
echo $retorno;

 ?>