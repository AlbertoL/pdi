<?php 
sleep(2);
include '../controlador/sesion.php';
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();
$retorno="";
$rut=$db->cleanString($_POST['rut']);
$consulta=$db->consulta("SELECT * FROM usuarios us WHERE us.`rut`='$rut'");
if($db->num_rows($consulta)>0){
	while($row=$db->fetch_array($consulta)){
			$retorno.='	
					<div>
						<label for="nombre"><i class="fa fa-user" aria-hidden="true"></i> Nombres</label> <input type="text" value='.$row[1].' name="nombre" id="nombre" class="cl_nombre" placeholder="Escriba sus nombres"/>
					</div>
					<div>
						<label for="apellido"><i class="fa fa-user" aria-hidden="true"></i> Apellidos</label> <input type="text" value='.$row[2].' name="apellido" id="apellido" class="last" placeholder="Escriba sus apellidos"/>
					</div>
					<div>
							<label for="clave"><i class="fa fa-lock" aria-hidden="true"></i> Contraseña</label> <input type="password" value='.base64_decode($row[4]).' name="clave" id="clave" class="cl_nombre" placeholder="Ingrese su password"/>
						</div>
					<div id="date">
						<label for="fecha1"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Ingreso</label> <input type="text" id="fecha1" name="fecha" value='.$db->fechaNormal($row[5]).'  class="cl_nombre" placeholder="dd/mm/aaaa"/>
					</div>';

	}
}else{
	$retorno="0";
}
echo $retorno;

 ?>