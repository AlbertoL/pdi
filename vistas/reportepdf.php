<?php
require('../fpdf/fpdf.php');
require('../archivo/conexion.php');

$db=new conexion();
$db->conectar();

 $id_usuario = intval($_GET['id']);
if (!is_numeric($id_usuario)) {
	$id_usuario = 0;
}
$consulta = $db->consulta("select  us.rut, concat(us.nombres_usu,' ',us.apellidos_usu) as Funcionario, concat(gr.desc_grado,'   ',ct.desc_categoria_usu), un.nombre_unidad, us.id_usuario, date_format(us.fecha_ing,' %d-%m-%Y') as fecha from usuarios us
inner join detalle_funcionario dt on dt.id_usuario = us.id_usuario
inner join categoria_usu ct ON ct.id_categoria_usu = dt.id_categoria_usu
inner join grado gr on gr.id_grado = dt.id_grado
inner join unidad_jefe uj on dt.id_detalle_f = uj.id_funcionario
inner join unidad un on un.id_unidad = uj.id_unidad where  us.id_usuario ='".$id_usuario."' and un.id_unidad = '1' AND dt.id_estado_usu = '1'");
while($row=$db->fetch_array($consulta)){
$fecha=$row[5];
$nombre=$row[1];
$grado=$row[2];
$unidad=$row[3];
$id=$row[4];
$contador=0;


}

class PDF extends FPDF
{

function Header()
{
$this->SetMargins(15, 15 , 30); 
if(($this->PageNo()%2)==0){
$this->SetMargins(15, 10 , 30); 
$this->SetFont('Arial', 'B', 8);
$this->Cell(30, 10, 'FECHA',1,0,'C');
$this->cell(110,15,'MATERIA',1,0,'C');
$this->cell(40,15,'TOME CONOCIMIENTO',1,0,'C');
$this->Ln(10);
$this->cell(8,5,'D',1,0,'C');
$this->cell(8,5,'M',1,0,'C');
$this->cell(14,5,'A',1,0,'C');
$this->Rect(15, 30, 8, 310 ,'f');
$this->Rect(23, 30, 8, 310 ,'f');
$this->Rect(31, 30, 14, 310 ,'f');
$this->Rect(45, 30, 110, 310 ,'f');
$this->Rect(155, 30, 40, 310 ,'f');
$this->Ln();


}
else{
	$this->SetMargins(15, 15 , 30); 
global $nombre;
global $apellido;
global $unidad;
global $fecha;
global $grado;
global $cont;
global $contador;
$contador=$contador+1;
	$this->SetMargins(15, 15 , 30); 
$this->SetFont('Arial', 'B', 8);
$this->Cell(70, 8,$unidad,"B");
$this->cell(75,8,'',0);
$this->cell(15,8,'HOJA N°',0);
$this->cell(20,8,'2015/'.$contador,'B');
$this->Ln();
$this->cell(60,4,'Unidad',0,0,'C');
$this->Ln();
$this->SetFont('Arial', 'B', 11);
$this->cell(180,10,'HOJA DE VIDA ANUAL',0,0,'C');
$this->SetFont('Arial', 'b', 11);
//$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$this->Ln();
$this->cell(10,8,'Del',0);
$this->cell(70,8,$grado,'B');
$this->cell(10,8,'don','B');
$this->cell(45,8,$nombre,'B');
$this->cell(45,8,'','B');
$this->Ln();
$this->cell(10,8,'',0);
$this->SetFont('Arial', '', 8);
$this->cell(70,8,'Grado-Categoría',0,0,'C');
$this->cell(10,8,'',0);
$this->cell(90,8,'Nombres y Apellidos',0,0,'C');
$this->Ln(8);
$this->SetFont('Arial', 'b', 11);
$this->cell(30,8,'Desde el',0);
$this->cell(60,8,'01 de agosto de 2015','B');
$this->cell(30,8,'Hasta el',0);
$this->cell(60,8,'31 de julio de 2016','B');
$this->Ln(10);
$this->cell(80,8,'Fecha de Ingreso a la Institución:',0);
$this->cell(100, 8,$fecha, 'B');
$this->Ln(15);
$this->SetFont('Arial', 'B', 8);
$this->Cell(30, 10, 'FECHA',1,0,'C');
$this->cell(110,15,'MATERIA',1,0,'C');
$this->cell(40,15,'TOME CONOCIMIENTO',1,0,'C');
$this->Ln(10);
$this->cell(8,5,'D',1,0,'C');
$this->cell(8,5,'M',1,0,'C');
$this->cell(14,5,'A',1,0,'C');
$this->Rect(15, 88, 8, 250 ,'f');
$this->Rect(23, 88, 8, 250 ,'f');
$this->Rect(31, 88, 14, 250 ,'f');
$this->Rect(45, 88, 110, 250 ,'f');
$this->Rect(155, 88, 40, 250 ,'f');
$this->Ln();
}

}

}




$pdf = new PDF('P','mm','Legal');
$pdf->SetMargins(15, 10 , 30); 
$pdf->AddPage();
$pdf->SetMargins(15, 15 , 30); 
$pdf->SetFont('Arial', '', 12);
//CONSULTA
$querycantidad=$db->consulta("select count(*) from detalle_hoja_vida dh INNER JOIN hoja_vida hv ON dh.id_detalle_hv = hv.id_detalle_hv inner join usuarios us on hv.id_usuario = us.id_usuario where   us.id_usuario ='".$id_usuario."' ");
$cantidad=$db->fetch_array($querycantidad);
$consulta = $db->consulta("SELECT date_format(DATE(dh.fecha_hva),' %d  %m    %Y') as Fecha, CONCAT(us.nombres_usu,' ',us.apellidos_usu), cat.nombre_cat_det, detalle_titulo ,df.id_detalle_f , cg.desc_cargo
	FROM detalle_hoja_vida dh INNER JOIN hoja_vida hv ON dh.id_detalle_hv = hv.id_detalle_hv 
	INNER JOIN usuarios us ON hv.id_usuario = us.id_usuario 
	INNER JOIN categoria_det cat ON cat.id_categoria_det = dh.id_cat_detalle 
	INNER JOIN detalle_funcionario df ON us.id_usuario = df.id_usuario 
	INNER JOIN unidad_jefe uj ON df.id_detalle_f = uj.id_funcionario 
	INNER JOIN unidad un ON uj.id_unidad = un.id_unidad 
	INNER JOIN cargo cg ON cg.id_cargo = df.id_cargo 
	WHERE   us.id_usuario ='".$id_usuario."' ");
 for ($i=0; $i<$cantidad[0]; $i++){
 	$row=$db->fetch_array($consulta);
	$pdf->Cell(30, 8,$row[0], 0);
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->multicell(110, 8,''.$row[2], 0);
	$pdf->Cell(30, 8,'', 'LR');
	$pdf->SetFont('Arial', '', 12);
	$pdf->multicell(110, 8,''.$row[3], 0);
	$pdf->Cell(30, 8,'', 0);
	$pdf->Cell(110, 8,'  ', 0);
	$pdf->Ln(8);

}

$pdf->Output();
?>
