<?php

session_start();
if(!isset($_SESSION['nomusuario']) || $_SESSION['rol']=="Secretaria" || $_SESSION['rol']=="Usuario") 
  header("Location: loginACS.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="icon" type="iamge/x-icon" href="img/salud.png">
	<link rel="stylesheet" type="text/css" href="css/estiloS.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script type="text/javascript">
    	$(document).ready(function(){
	    		$('#citas').click(function(){
	       		load("citas.php");
	    									 });

	    		$('#pacientes').click(function(){
	       		load("pacientes.php");
	    									 });

	    		$('#expedientes').click(function(){
	       		load("c_jython.html");

	       		$('#configuracion').click(function(){
	       		load("c_python.html");

    </script>


</head>
<body background="img/white-waves.png">
	<div class="container">
	<header id="cabeza">
	<img src="img/Logo-SaludOnNet.png" width="220" height="100">
	<a href="logout.php"><button type="button" class="btn btn-primary" id="Salir">Salir</button></a>
	</header>
	<aside>
	  <ul>
	  	<li>
	  		<a href="#">
	  			<span> <i class="fas fa-home" id="home"></i></span>
	  			<span>Inicio</span>
	  		</a>
	  	</li>

	  	<li>
	  		<a href="#">
	  			<span> <i class="fas fa-address-book" id="citas"></i></i></span>
	  			<span>Visualizacion De Citas</span>
	  		</a>
	  	</li>

	  	<li>
	  		<a href="#">
	  			<span> <i class="fas fa-file-alt"></i></span>
	  			<span>Reportes Medicos</span>
	  		</a>
	  	</li>

	  	 <li>
	  		<a href="consulta.php">
	  			<span><i class="fas fa-heartbeat"></i></i></span>
	  			<span>Realizacion De Consulta</span>
	  		</a>
	  	</li> 

	  	<li>
	  		<a href="Recetas.php">
	  			<span><i class="fas fa-capsules"></i></span>
	  			<span>Creacion De Recetas</span>
	  		</a>
	  	</li>

	  	<li>
	  		<a href="#">
	  			<span> <i class="fas fa-user-cog" id="configuracion"></i></i></span>
	  			<span>Configuracion</span>
	  		</a>
	  	</li>
	  </ul>
	</aside>
	
	<section>
		<div id="mensaje">
	<center><h1>Salud On Net</h1></center>
</div>
<br>
<center><img src="img/salud.png" width="130" height="130" ></center>
</p>
						<p>Bienvenido a<b>Salud On Net</b>!Un Sistema de Citas Medicas util para consultorios ymedicos independientes.</p>
						<br>
						<h3>Bienvenida Doctor</h3><br/>
						<p>En Este Modulo Podra</p>
						<p>	- Gestionar Consultas  <br/>
							 
							- Modificar Expedientes <br/>
							
							- Realizar Recetas <br>

							-Realizar Reportes
						
						</p>

	</section>
	
<center>
	<footer id="pie">
		 <p>
	<CENTER>&copy; <strong>Copyright 2019 Diseñado Por...</CENTER>
</p>
	</footer>
	</center>
</div>
</body>
</html>