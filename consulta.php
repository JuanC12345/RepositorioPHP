<?php include("includes/header.php")?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta</title>
	<link rel="icon" type="iamge/x-icon" href="img/salud.png">
	<link rel="stylesheet" type="text/css" href="css/estilo3.css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#home').click(function(){
	       		load("secretaria.php");

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

<?php


		include("database.php");

		$usuario = new Database();
		//$listado = $usuario->read();

		if (isset($_POST) && !empty($_POST)) {
			
			$Id_Paciente  = $usuario->sanitize($_POST['pacien']);
			$Sintomas  = $usuario->sanitize($_POST['Sintomas']);
			$Padecimiento = $usuario->sanitize($_POST['Padecimiento']);
			$Examenes  = $usuario->sanitize($_POST['Examenes']);
			


			$res = $usuario->createConsulta($Id_Paciente, $Sintomas, $Padecimiento, $Examenes);

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

<body background="img/full-bloom.png" id="cb">
	<div class="container">
		
	<header id="cabeza">
	<img src="img/Logo-SaludOnNet.png" width="220" height="100">
	<a href=""><button type="button" class="btn btn-primary" id="Salir" class="col-xs col-sm col-md col-lg">Salir</button></a>
	</header>
	<aside>
	  <ul>
	  	<li>
	  		<a href="Inicio_Doctor.php">
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
	  		<a href="#">
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
	
	<br>
	<section >

		<center><i class="fas fa-heartbeat fa-6x" id="logo1"></i></center>
		
    <form action="" method="POST" style="width: 545px; margin: auto;">

    	 <div class="form-group">
            <label for="Nombre">Nombre Del Paciente: </label>
            <select name="pacien" id="gender" class="form-control">
                <option disabled selected>Seleccione un paciente</option>
                <?php

        $conexion = mysqli_connect("localhost","root","","consultorioclinico") or die ("Error en la conexión con la Base de Datos");

              /* $query = "Select T1.Id_Paciente, T1.Nombre, T1.Apellido, T2.Id_cita from Paciente T1 INNER JOIN cita T2 ON T1.Id_Paciente = T2.Id_Paciente";*/
        		
                $query = "Select T1.Id_cita, T2.Nombre, T2.Apellido from cita T1 INNER JOIN paciente T2 ON T1.Id_Paciente = T2.Id_Paciente";
                $result = mysqli_query($conexion, $query) or die ("Ocurrio un error");
                
                while (($row = mysqli_fetch_array($result)) != NULL) {
                
                
               	echo '<option value="'.$row["Id_cita"].'">'.$row["Nombre"]." ".$row["Apellido"].'</option>';
                
            	
            	
                }
                

                ?>

            </select>

      


         	<label for="sintomas">Sintomas: </label>
         	<textarea id="sintomas" placeholder="Escriba Los Sintomas Indicados Por El Paciente" class="form-control" name="Sintomas"></textarea>


<label for="Padecimiento">Padecimiento: </label>
<input type="text" name="Padecimiento" id="padecimiento" class="form-control">
<label for="Sintomas">Examenes: </label>
         	<textarea id="examenes" placeholder="Escriba Los Examenes Indicados para el paciente" class="form-control" name="Examenes"></textarea>
<br>
<button type="submit" class="btn btn-primary" id="b3">Guardar Consulta.</button>

</form>

	</section>
	<center>
		<br><br><br><br><br>
<footer id="pie">
		 <p>
	<CENTER>&copy; <strong>Copyright 2019 Diseñado Por...</strong></CENTER>
</p>
	</footer>
	</center>

</div>
</body>


</html>


<script type="text/javascript">
	
	$(document).ready(function(){
     $('#b3').click(function(){
      
         if($('#Sintomas').val()==""){
         	alertify.alert("Debe incluir los síntomas del paciente");
         	return false;
         }
         else if($('#padecimiento').val()==""){
         	alertify.alert("Debe agregar el padecimiento del paciente, si no esta seguro, afirmelo");
         	return false;
         }

         else if($('#examenes').val()==""){
         	alertify.alert("Debe agregar los examenes del paciente, si no tiene aún, confirmelo");
         	return false;
         }

     });
	});

</script>