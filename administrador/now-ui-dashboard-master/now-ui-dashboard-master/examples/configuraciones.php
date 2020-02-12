<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Configuraciones | Admin
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>

    <body class="">
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
                        <li>
                            <a href="usuario.php">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>Mi Perfil</p>
                            </a>
                        </li>
                        <li>
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
                        <li class="active">
                            <a href="configuraciones.php">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                                <p>Acciones</p>
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
                            <a class="navbar-brand" href="configuraciones.php">CONFIGURACIONES</a>
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
                <div class="panel-header " > </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-chart">
                                <div class="card-header" >
                                    <h5 class="card-category">Impuesto al Valor agregado</h5>
                                    <h4 class="card-title">IVA</h4>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                            <i class="now-ui-icons loader_gear"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="ver_iva">
                                                <a><input type="submit" value="Ver" class="dropdown-item">
                                                </a>
                                            </form >
                                            <!--<form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="editar_iva">
                                                <a > <input type="submit" value="Editar" class="dropdown-item">
                                               </a>
                                            </form >-->
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="agregar_iva">
                                                <a > <input type="submit" value="Añadir" class="dropdown-item">
                                               </a>
                                            </form >
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <img src="../assets/img/porcentaje.png">

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h5 class="card-category">Clasificación del alimento / comida</h5>
                                    <h4 class="card-title">CATEGORÍAS</h4>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                            <i class="now-ui-icons loader_gear"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="ver_categoria">
                                                <a > <input type="submit" value="Ver" class="dropdown-item">
                                                </a>
                                            </form >
                                            <!--<form action="../../../../controller/controllerAdmin.php" >
                                               <input type="hidden" name="opcion" value="editar_categoria">
                                               <a > <input type="submit" value="Editar" class="dropdown-item">
                                              </a>
                                           </form >-->
                                           <form action="../../../../controller/controllerAdmin.php" >
                                               <input type="hidden" name="opcion" value="agregar_categoria">
                                               <a > <input type="submit" value="Añadir" class="dropdown-item">
                                              </a>
                                           </form> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" >
                                    <img src="../assets/img/categorias-png-4.png" width="100%" height="270">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h5 class="card-category">Roles que se manejan en el Sitio</h5>
                                    <h4 class="card-title">ROLES</h4>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                            <i class="now-ui-icons loader_gear"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="ver_rol">
                                                <a > <input type="submit" value="Ver" class="dropdown-item">
                                                </a>
                                            </form >
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="editar_rol">
                                                <a > <input type="submit" value="Editar" class="dropdown-item">
                                                </a>
                                            </form >
                                            <form action="../../../../controller/controllerAdmin.php" >
                                                <input type="hidden" name="opcion" value="anadir_rol">
                                                <a > <input type="submit" value="Añadir" class="dropdown-item">
                                                </a>
                                            </form >
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <img src="../assets/img/roles.png" width="100%" height="270">
                                </div>

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
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/js/demos.js
                demo.initDashboardPageCharts();

            });
        </script>
    </body>

</html>