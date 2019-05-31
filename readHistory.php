<?php

include ("includes/header.php");

?>

<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

}

else{
    header("Location: create.php");
}

?>



<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="expediente.php" class="navbar-brand">Expedientes registrados</a>
        </div>
    </nav>


<div class="col-md-8">
        <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Número de consulta</th>
                    <th>Número de cita</th>
                    <th>Sintomas</th>
                    <th>Padecimiento</th>
                    <th>Examenes</th>
                    <th>Fecha de consulta</th>
                    <th>Fecha de cita</th>
                    <th>Nombre del doctor</th>
                    <th>Nombre del paciente</th>
                    <th>Número de expediente</th>
                    <th>Acciones</th>
                    
                    
                </tr>
            </thead>

            <tbody>


 
        <?php

        include("database.php");

        $usuario = new Database();
        $ID = $id;

        
        $listado = $usuario->readHistoryPatient($id);

        while($row = mysqli_fetch_object($listado)){

            
            $id_consulta = $row->Id_Consulta;
            $id_cita = $row->Id_Cita;
            $sintomas = $row->Sintomas;
            $padecimiento = $row->Padecimiento;
            $examenes = $row->Examenes;
            $fecha_C = $row->Fecha_Consulta;
            $fecha_Q = $row->Fecha_Cita;
            $Nombre_Doctor = $row->Nombre_Doctor;
            $Nombre_Paciente = $row->Nombre;
            $id_expediente = $row->Id_Expediente;
            
            
            
        

        ?>

        <tr>
                            <td><?php echo $id_consulta; ?></td>
                            
                            <td><?php echo $id_cita; ?></td>
                            <td><?php echo $sintomas;?></td>
                            <td><?php echo $padecimiento;?></td>
                            <td><?php echo $examenes;?></td>
                            <td><?php echo $fecha_C;?></td>
                            <td><?php echo $fecha_Q;?></td>
                            <td><?php echo $Nombre_Doctor;?></td>
                            <td><?php echo $Nombre_Paciente;?></td>
                            <td><?php echo $id_expediente;?></td>
                            
                            
                            <td>
                                
                                <a href="?id=<?php echo $id_expediente;?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="?id=<?php echo $id_expediente;?>" class="btn btn-danger">
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
