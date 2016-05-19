<?php 
session_start();
if(!isset($_SESSION['id_unidad'])){
	include '../controlador/destruir.php';
}else{
	$valor2=base64_decode($_SESSION['cargo']);
	$nombre=base64_decode($_SESSION['nombre_uni']);
	$unidad=base64_decode($_SESSION['id_unidad']);
}
 ?>