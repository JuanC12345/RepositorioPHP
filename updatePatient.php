<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

}

else{
    header("Location: create.php");
}

?>

<?php



include ("database.php");



$usuario = new Database();

if (isset($_POST) && !empty($_POST)) {
    

    
    $Nombre  = $usuario->sanitize($_POST['Nombre']);
    $Apellido  = $usuario->sanitize($_POST['Apellido']);
    $Direccion  = $usuario->sanitize($_POST['Direccion']);
    $DUI  = $usuario->sanitize($_POST['DUI']);
    $Telefono  = $usuario->sanitize($_POST['telefono']);
    $Edad  = $usuario->sanitize($_POST['Edad']);
    $Sexo  = $usuario->sanitize($_POST['Sexo']);
    $ID = intval($_POST['id_paciente']);

    $res = $usuario->updatePatient($Nombre, $Apellido, $Direccion, $DUI, $Telefono, $Edad, $Sexo, $ID);

    if ($res) {
        $message= "<center>Datos actualizados con éxito</center>";
        $class="alert alert-success";
        ob_start();
        header("refresh: 3; url=pacientes.php");
        ob_end_flush();
        
    }

    else{
        $message="<center>No se pudieron actualizar los datos</center>";
        $class="alert alert-danger";
    }

    ?>
    <div class="<?php echo $class ?>">
        <?php echo $message;?>
    </div>

    <?php

}

$datos_usuario = $usuario->single_record_Patient($id);

?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/alertifyjs/css/themes/default.css">
    <script src="assets/vendor/bootstrap/alertifyjs/alertify.js"></script>
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Gestion De Pacientes</title>
    <link rel="icon" type="iamge/x-icon" href="img/salud.png">

</head>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">SALUD ON NET</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Inicio<span class="badge badge-success"></span></a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pacienteRead.php" ><i class="fas fa-procedures"></i>Gestionar Pacientes</a>
                            </li>
                                
                            
                              
                           
                          
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Modulo Secretaria </h2>
                                <p class="pageheader-text">Bienvenido A Su Sistema Salud On Net</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Modulo Secretaria</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Gestion De Pacientes</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                         <div id="main">
    <div class="container">

       
             <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                 
                                </div>
                                <div class="card">
                                    <br>
                                   <center><i class="fas fa-procedures fa-6x" id="logo1"></i></center><br>
                                    <div class="card-body">
                         <form action="#" method="POST" style="width: 545px; margin: auto;">

        
<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Nombre">Nombre: </label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ej.Jose Alfredo" value="<?php echo $datos_usuario->Nombre; ?>">
                    <input type="hidden" name="id_paciente" id="id_paciente" class='form-control' maxlength="100" value="<?php echo $datos_usuario->Id_Paciente; ?>">
                    <small class="form-text text-muted">
                        Nombre Porfavor.
                    </small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Apellido">Apellido: </label>
                    <input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="Ej.Marroquin Lazo" value="<?php echo $datos_usuario->Apellido; ?>">
                    <small class="form-text text-muted">
                        Apellido Por favor.
                    </small>
                </div>
            </div>
        </div>

    <label for="Direccion">Direccion: </label>
                    <input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Ej.CA 1W, San Salvador" value="<?php echo $datos_usuario->Direccion; ?>">
                    <small class="form-text text-muted">
                        Ingrese Su Direccion
                    </small>

    <label for="DUI">DUI: </label>
                    <input type="text" name="DUI" id="DUI" class="form-control" placeholder="Ej.04589638-4" value="<?php echo $datos_usuario->DUI; ?>">
                    <small class="form-text text-muted">
                        Ingrese El DUI del paciente
                    </small>
    <label for="telefono">Telefono: </label>

<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ej.7154-3856" value="<?php echo $datos_usuario->Telefono; ?>">
                    <small class="form-text text-muted">
                        Ingrese El telefono del paciente
                    </small>

<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Edad">Edad: </label>
                    <input type="text" name="Edad" id="Edad" class="form-control" placeholder="Ej. 18" value="<?php echo $datos_usuario->Edad; ?>">
                    <small class="form-text text-muted">
                        
                    </small>
                </div>
            </div>

            <div class="col">
                 <label for="Sexo">Sexo</label>
            <select name="Sexo" id="Sexo" class="form-control">
<option><?php echo $datos_usuario->Sexo; ?></option>
                <?php 

                if ($datos_usuario->Sexo == "Masculino") {
                    echo '<option value = "Femenino">Femenino</option>';
                }
                else if($datos_usuario->Sexo == "Femenino"){
                    echo '<option value = "Masculino">Masculino</option>';
                }

                ?>
            </select>
                 
                </div>
            </div>
             <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
 
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
        
     
  
</div>
 </div>


    


                                </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                               
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                               

           </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->


            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
     $('#b1').click(function(){
      
         if($('#nom').val()==""){
                alertify.alert("Es necesario el nombre del paciente");
            return false;
         }
         else if($('#ape').val()==""){
            alertify.alert("Es necesario el apellido del paciente");
            return false;
         }
         else if($('#DUI').val()==""){
            alertify.alert("Es necesario el DUI del paciente");
            return false;
         }
         else if($('#dir').val()==""){
            alertify.alert("Es necesaria la dirección del paciente");
            return false;
         }
         else if($('#tel').val()==""){
            alertify.alert("Es necesario el teléfono del paciente");
            return false;
         }
         else if($('#edad').val()==""){
            alertify.alert("Es necesario la edad del paciente");
            return false;
         }

     });
    });

</script>
</body>
 
</html>

<?php include ('includes/footer.php')?>