<h1 class="title">Nuevo Informe - <?php echo $nombre_usuario.' '.$apellido; ?></h1>
				<ul id="titulos_hva" class="titulos_generales ">

<?php
$consulta=$db->consulta($consultaBuscar);
if ($db->num_rows($consulta)>0) {
	while($row=$db->fetch_array($consulta)){
		$retorno.="<li><a href=\"#\" id=".$row[0]." class='link_title'>".$row[1]."</a></li>";
	}
}else{
	$retorno="No existen titulos...";
}
echo $retorno;
?>

				</ul>
				<ul id="titulo_resumen" class="titulos_resumenes">
					<li><a href="#" class="resumenes r1">Resumen Estadístico</a></li>
					<li><a href="#" class="resumenes">Resumen Anual</a></li>
				</ul>