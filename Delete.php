<?php

include ("db.php");

if (isset($_GET['id'])) {
	
	$id = $_GET['id'];
	$query = "Delete from usuario where Id_Usuario =".$id;
	$result = mysqli_query($conn,$query);

	if(!$result){
		die("Query failed");

	}

	    $_SESSION['message'] = 'Registro eliminado con éxito';
        $_SESSION['message_type'] = 'danger';
		header("Location: Users.php");

	
}

?>