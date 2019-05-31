<?php

include ("includes/header.php");
$nomusuario = $_POST['usuario'];
$pass = sha1($_POST['contra']);




$conexion = mysqli_connect("localhost","root","","consultorioclinico") or die ("Error en la conexión con la Base de Datos");

$consulta = "Select * from usuario where BINARY NombreUsuario = '$nomusuario' and Password = '$pass'";

$resultado = mysqli_query($conexion,$consulta);


$row = mysqli_num_rows($resultado);

if ($row>0) {

	
	if ($fila = mysqli_fetch_array($resultado)) {
		
		if ($fila['Rol']=="Administrador") {
			session_start();
			$_SESSION['nomusuario'] = $nomusuario;
			$_SESSION['rol'] = $fila['Rol'];
			header("location:Users.php");
		}	

		else if ($fila['Rol']=="Doctor") {
			session_start();
			$_SESSION['nomusuario'] = $nomusuario;
			$_SESSION['rol'] = $fila['Rol'];
			$_SESSION['nombre'] = $fila['Nombre'];
			$_SESSION['apellido'] = $fila['Apellido'];
			header("Location:Index_Doctor.php");
		}

		else if ($fila['Rol']=="Secretaria") {
			session_start();
			$_SESSION['nomusuario'] = $nomusuario;
			$_SESSION['rol'] = $fila['Rol'];
			header("Location:index.php");
		}

		

		else if ($fila['Rol']=="Usuario"){
			session_start();
			$_SESSION['nomusuario'] = $nomusuario;
			$_SESSION['rol'] = $fila['Rol'];
			header("Location:index.php");
			// Aca va ir el archivo de vista de consultas para el usuario header("Location:.php");
		}


	}
}
else{
	
	 echo "<script>jQuery(function(){swal(\"¡Oh no!\", \"Credenciales Incorrectas\", \"error\");});</script>";
	 
}

mysqli_close($conexion);



/*$consulta = "Select * from usuario";

$resultado = mysqli_query($conexion,$consulta) or die ("Error al ejecutar la consulta");

echo "<table border='5'>";
echo "<tr>";
echo "<td> ID</td>";
echo "<td>Nombre</td>";
echo "<td>Rol</td>";
echo "<td>Nombre de usuario</td>";
echo "<td>Password</td>";
echo "</tr>";

while ($columna = mysqli_fetch_array($resultado)) {
	echo "<tr>";
	echo "<td>".$columna['Id_Usuario']."</td><td>".$columna['Nombre']."</td><td>".$columna['Rol']."</td><td>".$columna['Nombre de usuario']."</td><td>".$columna['Password']."</td>";
	echo "</tr>";
}

echo "</table>";*/

?>