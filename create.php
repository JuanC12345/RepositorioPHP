<?php

include("includes/header.php");


?>

<div class="container p-4">
	
<div class="row">
	
	<div class="col-md-4">
		
		<?php


		include("Model/usuario.php");

		$usuario = new Usuario ();
		$db = new Database();
		//$listado = $usuario->read();

		if (isset($_POST) && !empty($_POST)) {
			
			$Nombre  = $db->sanitize($_POST['nombre']);
			$Rol  = $db->sanitize($_POST['rol']);
			$Username  = $db->sanitize($_POST['user']);
			$Password  = $db->sanitize(sha1($_POST['pass']));

			$Nombre  = $usuario->setNombre($_POST['nombre']);
			$Rol  = $usuario->setRol($_POST['rol']);
			$Username  = $usuario->setUsername($_POST['user']);
			$Password  = $usuario->setPass(sha1($_POST['pass']));

			$res = $usuario->create($Nombre, $Rol, $Username, $Password);

			if ($res) {
				$message = "Agregado con éxito";
				$class = "alert alert-success";
				//header("Location: create.php");


			}

			else{
				$message = "No se agregaron los datos";
				$class = "alert alert-danger";
			}



			?>

			<div class="<?php echo $class ?> ">
				<?php echo $message; ?>
			</div>

			<?php


		}

		?>
       
			
		

     <div class="card card-body">
     	<form action="#" method="POST">
     		

     		<div class="form-group">
     			<center><label for="">Nombre</label></center>
     			<input type="text" name="nombre" class="form-control" autofocus>
     		</div>

     		<div class="form-group">
     			<center><label for="">Rol</label></center>
     			<select name="rol" id="" class="form-control">
     				<option>Doctor</option>
     				<option>Secretaria</option>
     				<option>Usuario</option>
     				<option>Administrador</option>
     			</select>
     		</div>

     		<div class="form-group">
     			<center><label for="">Nombre de usuario</label></center>
     			<input type="text" name="user" class="form-control" autofocus>
     		</div>

     		

     		<div class="form-group">
     			<center><label for="">Contraseña</label></center>
     			<input type="password" name="pass" class="form-control" autofocus>
     		</div>

     		<input type="submit" class="btn btn-success btn-block" value="Registrar" name="b1">

     	</form>
     </div>

	</div>

	<div class="col-md-8">
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Rol</th>
					<th>User name</th>
					<th>Contraseña</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>


 
        <?php

		
		//$listado = $usuario->read();

        while($row = mysqli_fetch_object($listado)){
        	$id = $row->Id_Usuario;
        	$nombre = $row->Nombre;
        	$rol = $row->Rol;
        	$user = $row->NombreUsuario;
        	$pass = $row->Password;
        

        ?>

        <tr>
							<td><?php echo $nombre; ?></td>
							<td><?php echo $rol; ?></td>
							<td><?php echo $user; ?></td>
							<td><?php echo $pass;?></td>
							<td>
								
								<a href="update.php?id=<?php echo $id;?>" class="btn btn-secondary">
									<i class="fas fa-marker"></i>
								</a>
								<a href="deleteUsers.php?id=<?php echo $id;?>" class="btn btn-danger">
									<i class="far fa-trash-alt"></i>
								</a>


							</td>
						</tr>

        <?php

    }

        ?>
			


<?php

include ("includes/footer.php");

?>