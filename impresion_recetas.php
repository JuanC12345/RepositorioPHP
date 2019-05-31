<?php
date_default_timezone_set('America/El_Salvador');//seteamos zona horaria
require_once('class.ezpdf.php');//llamamos libreria
$titulo=$_POST['receta'];
$pdf = new Cezpdf('a4',"landscape"); //instacia de la clase, defino papel
$pdf->selectFont('fonts/Helvetica.afm');//setemos la fuente
$pdf->ezSetCmMargins(1,1,1.5,1.5); //seteamos margenes
$conexion = new mysqli('127.0.0.1','root','','consultorioclinico');//conexion a BD
$datos = $conexion->query("Select * FROM receta where Titulo= '$titulo'");//seleccionamos la tabla a mostrar

while($fila = mysqli_fetch_assoc($datos)) { //recorrer tabla y extraer filas
    $data[] = array_merge($fila);//formamos arreglo
}
$titles = array(//formo arreglo con titulon de columna
'Id_Receta'=>'<b>Id_Receta</b>',
'Titulo'=>'<b>titulo</b>',
'Medicamentos'=>'<b>Medicamentos</b>',
'Dosis'=>'<b>Dosis</b>',
);
$txttit = "<b>Receta</b>\n";
$pdf->ezText($txttit, 12);//imprime texto 
$options = array( 
'shadeCol'=>array(0.9,2,0.9,0.5),//color de filas de tabla
'xOrientation'=>'center',//orientacion de tabla
'width'=>500//ancho de tabla
);

$pdf->ezTable($data,$titles,'Receta', $options);
$pdf->ezText("\n\n\n", 24);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezText("<b>FIRMA:____________________________", 10);
$pdf->ezStream();

?>