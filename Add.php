<?php

include ("db.php");

if (isset($_POST['b1'])){

	$nombre = $_POST['nombre'];
	$usuario = $_POST['user'];
	$rol = $_POST['rol'];
	$pass = sha1($_POST['pass']);
	

    $query = "Insert into usuario (Nombre,Rol,NombreUsuario,Password) values ('$nombre','$usuario','$rol','$pass')";

    $result = mysqli_query($conn,$query);

    if (!$result) {
    	die("fail");
    }
    
    $_SESSION['message'] = 'Guardado';
    $_SESSION['message_type'] = 'Success';
    header("Location: Users.php");

}

?>