<?php

include ("includes/header.php");

?>



<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="citas.php" class="navbar-brand">Historial de citas</a>
        </div>
    </nav>


<div class="col-md-8">
        <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del paciente</th>
                    <th>Nombre del doctor</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>


 
        <?php

        include("database.php");

        $usuario = new Database();

        
        $listado = $usuario->readQuote();

        while($row = mysqli_fetch_object($listado)){
            $id_cita = $row->Id_Cita;
            $NombrePaciente = $row->Nombre;
            $ApellidoPaciente = $row->Apellido;
            $NombreDoctor = $row->Nombre_Doctor;
            $ApellidoDoctor = $row->Apellido_Doctor;
            $Fecha = $row->Fecha_Cita;
            $Hora = $row->Hora;
            $Estado = $row->Estado;
           
        

        ?>

        <tr>
                            <td><?php echo $NombrePaciente." ".$ApellidoPaciente; ?></td>
                            <td><?php echo $NombreDoctor." ".$ApellidoDoctor; ?></td>
                            <td><?php echo $Fecha; ?></td>
                            <td><?php echo $Hora;?></td>
                            <td><?php echo $Estado;?></td>
                            
                            <td>
                                
                                <a href="updateQuote.php?id=<?php echo $id_cita;?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="deleteQuote.php?id=<?php echo $id_cita;?>" class="btn btn-danger">
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
