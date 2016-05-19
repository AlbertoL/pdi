<?php 
include './conexion.php';
$db=new conexion();
$db->conectar();

// session_start();

// $username=$db->cleanString($_POST['username']);
// $clave=base64_encode($db->cleanString($_POST['clave']));
// $unidad=$db->cleanString($_POST['unidad']);
$retorno=0;
$consulta=$db->consulta("SELECT clave FROM usuarios WHERE rut = '11.111.111-1'");

if($db->num_rows($consulta)>0){
        while($rows=$db->fetch_array($consulta)){
            echo base64_decode($rows[0]);

        }
    }else{
        echo "Hubo un problema";;
    }
// echo $retorno;
 ?>