
<?php

session_start();
if(!isset($_SESSION['nomusuario']) || $_SESSION['rol']=="Secretaria" || $_SESSION['rol']=="Usuario") 
  header("Location: loginACS.php");

?>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="bootstrap/css/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
<header id="cabeza">
	<img src="img/Logo-SaludOnNet.png" width="169" height="95" id="cb">
	<button type="button" class="btn btn-outline-primary" id="Salir">
<a href="logout.php">Salir</a>
	</button>

	
</header>
<aside>
	<div class="widget">
		<a class="nav-link active" href="#"><i class="fas fa-play"></i> Inicio</a>
 <a class="nav-link active" href="#"><i class="fas fa-list-alt"></i> Realizacion De Reportes</a>
  <a class="nav-link" href="#"><i class="fas fa-address-card"></i> Edicion De Expedientes.</a>
  <a class="nav-link" href="#"><i class="fas fa-capsules"></i> Realizacion De Recetas</a>
	</div>

</aside>
	<section>
					<div class="mensaje">
						<h2>Salud On Net</h2>
					</div>
						<p><img src="img/logo.png" width="175" height="250" id="logo1">
						</p><br/><br/><br><br><br><br><br>
						<br><br><br><br><p>Bienvenido a <b>Salud On Net</b>! Un Sistema de Citas Medicas util para consultorios medicos y/o medicos independientes.</p>
						<br/><br/>
						<h3>Bienvenida Doctor</h3><br/>
						<p>En Este Modulo Podra</p>
						<p>	- Gestion De Consultas <br/>
							 
							- Realizacion De Reportes <br/>
							
							- Edicion De Expedientes.<br>
                            
                            - Realizacion De Recetas.

						
						</p>
                       <?php
                          echo $_SESSION['nomusuario'];
                          echo $_SESSION['rol'];
                       ?>
                       

				</section>
	
<br><br><br>


<div id="pie">
	&copy;Copyright 2019 Diseñado Por... .
</div>

</div>
</body>
</html>