
   	
      
   <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!--Siempre coloca el bootstrap.min.css como primer enlace-->
	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="bootstrap/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="bootstrap/alertifyjs/css/themes/default.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/login.css">

	<script src="bootstrap/alertifyjs/alertify.js"></script>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<div class="contenedor">
		<main>
			
		</main>

		<header>
			
			

		</header>

		<nav class="navbar navbar-dark bg-dark"><a href="" class="navbar-brand">Acceso al sistema</a></nav>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						
			<form action="conexion.php" method="POST">
				
				<label for="user">Usuario</label>
				<input type="text" name="usuario" class="form-control" id="user" autofocus>
				<br>
				<br>
				<label for="pass">Contraseña</label>
				<input type="password" name="contra" class="form-control" id="pass">
				<br>
				<br>
				<input type="submit" name="b1" value="Acceder" class="btn btn-primary" id="log">

				<?php 

				if ($_GET['f']) {
					
	echo "<script>jQuery(function(){swal(\"¡Oh no!\", \"Credenciales Incorrectas\", \"error\");});</script>";
}
				?>
				



			</form>
		
		</div>
            </div>
           </div>
           
		</section>

		<aside>
		 
		</aside>

		<aside>
			

		</aside>

		<footer>
			
		</footer>

	</div>
	
</body>
</html>

<script type="text/javascript">
	
	$(document).ready(function(){
     $('#log').click(function(){
      
         if($('#user').val()==""){
         	alertify.alert("Debes agregar tu usuario");
         	return false;
         }
         else if($('#pass').val()==""){
         	alertify.alert("Debes agregar tu contraseña");
         	return false;
         }

     });
	});

</script>

