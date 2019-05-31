<?php date_default_timezone_set('America/El_Salvador');//seteamos zona horaria
require_once('class.ezpdf.php');//llamamos libreria
$nombre=$_POST['paciente'];
$pdf = new Cezpdf('a4',"landscape"); //instacia de la clase, defino papel
$pdf->selectFont('fonts/Helvetica.afm');//setemos la fuente
$pdf->ezSetCmMargins(1,1,1.5,1.5); //seteamos margenes
$conexion = new mysqli('127.0.0.1','root','','consultorioclinico');//conexion a BD
$datos = $conexion->query("select T1.*, T2.Fecha_Cita,T3.Nombre_Doctor,T4.Nombre from consulta T1 inner join cita T2 on T2.Id_Cita = T1.Id_Cita inner join doctor T3 on T3.Id_Doctor = T2.Id_Doctor inner join paciente T4 on T2.Id_Paciente = T4.Id_Paciente where T4.Nombre= '$nombre'");//seleccionamos la tabla a mostrar
while($fila = mysqli_fetch_assoc($datos)) { //recorrer tabla y extraer filas
    $data[] = array_merge($fila);//formamos arreglo
}
$titles = array(//formo arreglo con titulon de columna
'Id_Consulta'=>'<b>Numero consulta</b>',
'Id_Cita'=>'<b>Numero cita</b>',
'Sintomas'=>'<b>Sintomas</b>',
'Padecimiento'=>'<b>Padecimiento</b>',
'Examenes'=>'<b>Examenes</b>',
'Sintomas'=>'<b>Sintomas</b>',
'Fecha_Cita'=>'<b>Fecha Cita</b>',
'Nombre_Doctor'=>'<b>Nombre Doctor</b>',
'Nombre'=>'Nombre paciente',
);
$txttit = "<b>Historial Medico</b>\n";
$pdf->ezText($txttit, 12);//imprime texto 
$options = array( 
'shadeCol'=>array(0.9,2,0.9,0.5),//color de filas de tabla
'xOrientation'=>'center',//orientacion de tabla
'width'=>500//ancho de tabla
);
$pdf->ezTable($data,$titles,'Historial', $options);
$pdf->ezText("\n\n\n", 24);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();