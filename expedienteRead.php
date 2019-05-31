<?php

include ("includes/header.php");

?>



<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="pacientes.php" class="navbar-brand">Expedientes registrados</a>
        </div>
    </nav>


<div class="col-md-8">
        <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del paciente</th>
                    
                    <th>Antecedentes médicos</th>
                    <th>Alergias</th>
                    <th>Peso</th>
                    <th>Estatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>


 
        <?php

        include("database.php");

        $usuario = new Database();

        
        $listado = $usuario->readExpedient();

        while($row = mysqli_fetch_object($listado)){
            $id_expediente = $row->Id_Expediente;
            $id_paciente = $row->Nombre." ".$row->Apellido;
            $antecedentes = $row->Antecedentes_Medicos;
            $alergias = $row->Alergias;
            $peso = $row->Peso;
            $estatura = $row->Estatura;
        

        ?>

        <tr>
                            <td><?php echo $id_paciente; ?></td>
                            <td><?php echo $antecedentes; ?></td>
                            <td><?php echo $alergias;?></td>
                            <td><?php echo $peso;?></td>
                            <td><?php echo $estatura;?></td>
                            <td>
                                
                                <a href="updateExpedient.php?id=<?php echo $id_expediente;?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="deleteExpedient.php?id=<?php echo $id_expediente;?>" class="btn btn-danger">
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
