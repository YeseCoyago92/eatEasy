<!DOCTYPE html>
<?php
session_start();
include_once '../../../../model/SesionDTO.php';
require_once '../../../../model/SesionDTO.php';
include_once '../../../../model/Persona.php';
require_once '../../../../model/Persona.php';
if (!isset($_SESSION['sesionDTO'])) {
    header('Location: ../index.php');
    die();
}
$sesionDTO = unserialize($_SESSION['sesionDTO']);
if ($sesionDTO->getRol() != "1") {
    header('Location: ../index.php');
    die();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Mi Perfil | Admin
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <!-- CSS Files
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity ="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>

    <body class="user-profile">
        <div class="wrapper ">
            <div class="sidebar" data-color="orange">
                <!--
                  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
                -->

                <div class="logo">
                    <a href="tabla_usuarios.php" class="simple-text logo-normal">
                        <i class="now-ui-icons objects_diamond"></i>
                        Administrador
                    </a>
                </div>
                <div class="sidebar-wrapper" id="sidebar-wrapper">
                    <ul class="nav">
                        <li class="active">
                            <a href="usuario.php">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>Mi Perfil</p>
                            </a>
                        </li>
                        <li >
                            <a href="entrega.php">
                                <i class="now-ui-icons shopping_delivery-fast"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li> 
                            <a href="tabla_usuarios.php">
                                <i class="now-ui-icons business_badge"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li >
                            <a href="configuraciones.php">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                                <p>Configuraciones</p>
                            </a>
                        </li>




                    </ul>
                </div>
            </div>
            <div class="main-panel" id="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#pablo">Mi Perfil</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <form action="../../../../controller/controllerLogin.php">
                                <input type="hidden" name="opcion" value="close">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pablo">
                                            <input type="submit" value="CERRAR SESIÓN" style="background: transparent; border: transparent;color: white">
                                            <i class="now-ui-icons media-1_button-power"></i>

                                        </a>
                                    </li>
                                </ul>
                            </form>
                        </div>

                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="panel-header panel-header-sm">
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="title">Editar Perfil</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">

                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Cédula</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="xxxxxxxxxx">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Correo</label>
                                                    <?php
                                                    $correo = $sesionDTO->getCorreo();
                                                    echo " <input type='email' class='form-control' value = '" .$correo ."'>";
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Nombres</label>
                                                    <input type="text" disabled="" class="form-control" placeholder="Company" value="Mike">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Apellidos</label>
                                                    <input type="text" disabled="" class="form-control" placeholder="Last Name" value="Andrew">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 pr-1">

                                                <div class="form-group">
                                                    <label>Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" disabled="" placeholder="Company" value="EatEasy">

                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="xxxxxxxxxx">
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                    <form action="../controller/controller.php">
                                        <br>
                                        <input type="hidden" name="opcion" value="listar" >

                                        <input type="submit" value=" Guardar Cambios" class="btn btn-primary" > <a href="cambiar_contrasenia.php"><input type="button" value="Cambiar Contraseña"class="btn btn-primary"></a>
                                        <br>
                                    </form>
                                    <br>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="image">
                                    <img src="../assets/img/bg5.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">

                                        <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                                        <h5 class="title">Mike Andrew</h5>

                                    </div>
                                    <p class="description text-center">
                                        "Administrador <br>
                                        de la Empresa EastEasy"<br>

                                    </p>

                                </div>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
    </body>

</html>