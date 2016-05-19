<?php 
include '../archivo/conexion.php';
$db=new conexion();
$db->conectar();

session_start();

$username=$db->cleanString($_POST['username']);
$clave=base64_encode($db->cleanString($_POST['clave']));
$unidad=$db->cleanString($_POST['unidad']);
$retorno=0;
$consulta=$db->consulta("SELECT us.rut, us.clave, uj.id_unidad, cg.id_cargo, cg.desc_cargo, un.sigla from usuarios us INNER JOIN detalle_funcionario df
ON us.id_usuario = df.id_usuario INNER JOIN unidad_jefe uj ON df.id_detalle_f = uj.id_funcionario
INNER JOIN unidad un ON uj.id_unidad = un.id_unidad
INNER JOIN cargo cg ON cg.id_cargo = df.id_cargo
WHERE us.rut = '$username' AND us.clave = '$clave' AND uj.id_unidad ='$unidad' AND cg.id_cargo ='1'");

if($db->num_rows($consulta)>0){
        while($rows=$db->fetch_array($consulta)){
            switch ($rows[3]) {
                case '1':
                    $_SESSION['id_unidad']=base64_encode($rows[2]);
                    $_SESSION['cargo']=base64_encode($rows[4]);
                    $_SESSION['nombre_uni']=base64_encode($rows[5]);
                    $retorno=1;
                    break;
                case '2':
                    $retorno=2;
                    break;
                default:
                    $retorno=9;
                    break;
            }
        }
    }else{
        $retorno=0;
    }
echo $retorno;
 ?>