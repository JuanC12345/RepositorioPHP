<?php

include  ("db.php");

if (isset($_GET['id'])) {
	
	$id = $_GET['id'];

	$query = "Select * from usuario where Id_Usuario =".$id;

	
	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
    	$nombre = $row['Nombre'];
    	$rol = $row['Rol'];
    	$user = $row['NombreUsuario'];
    	$pass = $row['Password'];


	}
}

	if (isset($_POST['update'])) {
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$rol = $_POST['rol'];
    	$user = $_POST['user'];
    	$pass = $_POST['pass'];



    	$query = "Update usuario set Nombre = '$nombre',Rol= '$rol',NombreUsuario= '$user',Password = sha1('$pass') where Id_Usuario = $id";
    	mysqli_query($conn,$query);
    	$_SESSION['message'] = "Registro actualizado con éxito";
    	$_SESSION['message_type'] = 'warning';
    	header("Location:Users.php");


	}
?>

<?php

include ("includes/header.php");?>

<div class="container p-4">
	
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="Edit.php?id=<?php echo $_GET['id'];?>" method="POST">
					<div class="form-group">
						<input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control"
						placeholder="Update nombre"> 

					</div>

					<div class="form-group">
						<input type="text" name="rol" value="<?php echo $rol;?>" class="form-control"
						placeholder="Update rol"> 

					</div>

					<div class="form-group">
						<input type="text" name="user" value="<?php echo $user;?>" class="form-control"
						placeholder="Update user"> 

					</div>

					<div class="form-group">
						<input type="text" name="pass" value="<?php echo $pass;?>" class="form-control"
						placeholder="Update password"> 

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