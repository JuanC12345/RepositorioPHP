<?php


if (isset($_GET['id'])) {
	include ('database.php');

	$usuario = new Database();

	$id = intval($_GET['id']);

	$res = $usuario->deleteExpedient($id);

	if ($res) {
		echo "se elimino";
        ob_start();
        header("refresh: 3; url=expediente.php");
        ob_end_flush();
        
		
		

	}

	else{
		echo "Error al eliminar el registro";
	}
}

?>