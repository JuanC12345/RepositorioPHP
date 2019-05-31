<?php


if (isset($_GET['id'])) {
	include ('database.php');

	$usuario = new Database();

	$id = intval($_GET['id']);

	$res = $usuario->delete($id);

	if ($res) {
		header("Location: create.php");
		

	}

	else{
		echo "Error al eliminar el registro";
	}
}

?>