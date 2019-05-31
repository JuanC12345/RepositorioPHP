<?php

include ("includes/header.php");

?>



<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="pacientes.php" class="navbar-brand">Pacientes registrados</a>
        </div>
    </nav>


<div class="col-md-8">
        <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>DUI</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>


 
        <?php

        include("database.php");

        $usuario = new Database();

        
        $listado = $usuario->readPatient();

        while($row = mysqli_fetch_object($listado)){
            $id = $row->Id_Paciente;
            $nombre = $row->Nombre;
            $apellido = $row->Apellido;
            $direccion = $row->Direccion;
            $dui = $row->DUI;
            $edad = $row->Edad;
            $sexo = $row->Sexo;
        

        ?>

        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellido; ?></td>
                            <td><?php echo $direccion; ?></td>
                            <td><?php echo $dui;?></td>
                            <td><?php echo $edad;?></td>
                            <td><?php echo $sexo;?></td>
                            <td>
                                
                                <a href="updatePatient.php?id=<?php echo $id;?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="deletePatient.php?id=<?php echo $id;?>" class="btn btn-danger">
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




