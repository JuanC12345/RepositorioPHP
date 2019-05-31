<?php

include ("db.php");

?>

<?php

include ("includes/header.php");

?>


<div class="container p-4">
	
<div class="row">
	
	<div class="col-md-4">
		
		<?php
        
        if(isset($_SESSION['message'])){?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?=
                 
                 $_SESSION['message'];

				?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>

		<?php session_unset(); } ?>
        

		

     <div class="card card-body">
     	<form action="Add.php" method="POST">
     		
     		<div class="form-group">
     			<input type="text" name="nombre" class="form-control" autofocus>
     		</div>

     		<div class="form-group">
     			<input type="text" name="user" class="form-control" autofocus>
     		</div>

     		<div class="form-group">
     			<input type="text" name="rol" class="form-control" autofocus>
     		</div>

     		<div class="form-group">
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

					$query = "Select * from usuario";

					$result = mysqli_query($conn,$query);

					while($row = mysqli_fetch_array($result)) { ?>
						
						<tr>
							<td><?php echo $row['Nombre'] ?></td>
							<td><?php echo $row['Rol'] ?></td>
							<td><?php echo $row['NombreUsuario'] ?></td>
							<td><?php echo $row['Password'] ?></td>
							<td>
								<a href="Edit.php?id=<?php echo $row['Id_Usuario'] ?>" class="btn btn-secondary">
									<i class="fas fa-marker"></i>
								</a>
                                  
								<a href="Delete.php?id=<?php echo $row['Id_Usuario'] ?>" class="btn btn-danger">
									<i class="far fa-trash-alt"></i>
								</a>

							</td>
							
								
							
						</tr>

						<?php


					}
						?>

					
			</tbody>
			
		</table>

	</div>

</div>


</div>


<?php

include("includes/footer.php");

?>



