<?php

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);

}

else{
	header("Location: create.php");
}

?>


<?php

include ("includes/header.php");

include ("database.php");



$usuario = new Database();

if (isset($_POST) && !empty($_POST)) {
	

	
	$Nombre  = $usuario->sanitize($_POST['nombre']);
	$Rol  = $usuario->sanitize($_POST['rol']);
	$Username  = $usuario->sanitize($_POST['user']);
	$Password  = $usuario->sanitize(sha1($_POST['pass']));
	$ID = intval($_POST['id_usuario']);

	$res = $usuario->update($Nombre, $Rol, $Username, $Password, $ID);

	if ($res) {
		$message= "<center>Datos actualizados con éxito</center>";
		$class="alert alert-success";
		ob_start();
		header("refresh: 3; url=create.php");
		ob_end_flush();
		
	}

	else{
		$message="<center>No se pudieron actualizar los datos</center>";
		$class="alert alert-danger";
	}

	?>
	<div class="<?php echo $class ?>">
		<?php echo $message;?>
	</div>

	<?php

}

$datos_usuario = $usuario->single_record($id);

?>

<div class="container p-4">
	
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="#" method="POST">
					<div class="form-group">
						<input type="text" name="nombre" value="<?php echo $datos_usuario->Nombre; ?>" class="form-control"
						placeholder="Update nombre"> 
						<input type="hidden" name="id_usuario" id="id_usuario" class='form-control' maxlength="100" value="<?php echo $datos_usuario->Id_Usuario; ?>">

					</div>

					<div class="form-group">
						<input type="text" name="rol" class="form-control"
						placeholder="Update rol" value="<?php echo $datos_usuario->Rol; ?>">
						

					</div>

					<div class="form-group">
						<input type="text" name="user" class="form-control"
						placeholder="Update user" value="<?php echo $datos_usuario->NombreUsuario; ?>"> 

					</div>

					<div class="form-group">
						<input type="text" name="pass" class="form-control"
						placeholder="Update password" value="<?php echo $datos_usuario->Password; ?>"> 

					</div>

					<button type="submit" class="btn btn-success" name="update">
						Update
					</button>

				</form>
			</div>
		</div>
	</div>

</div>


<?php

include ("includes/footer.php");


?>