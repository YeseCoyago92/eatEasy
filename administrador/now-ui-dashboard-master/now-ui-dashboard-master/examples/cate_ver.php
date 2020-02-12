<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once '../../../../modelAdmin/ModelAdmin.php';
require_once '../../../../modelAdmin/ModelAdmin.php';
include_once '../../../../modelAdmin/Persona.php';
require_once '../../../../modelAdmin/Persona.php';
include_once '../../../../modelAdmin/TipoIva.php';
require_once '../../../../modelAdmin/TipoIva.php';
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            CATEGORÍAS
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
        <link href="../assets/css/switch.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../../../css/estilos.css">
        <link rel="stylesheet" href="../../../../css/responsive.css">
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <script type="text/javascript">
        function ConfirmDelete() {
            var respuesta = confirm("Esta seguro que desea eliminar esta Categoría?");
            if (respuesta == true) {
                return true;
            } else
            {
                return false;
            }
        }
    </script>
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
                        <li > 
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
                            <a class="navbar-brand" href="configuraciones.php">CATEGORIA</a>
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
                <!--Fin Formulario Dinamico-->
                <div class="panel-header panel-header-sm">
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> CATEGORÍA DE ALIMENTOS</h4>
                                    <!--boton de agregar-->
                                    
                                </div>
                                <!--Comienza la Tabla-->
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <form action="../../../../controller/controllerAdmin.php">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                <th>Nombre</th>
                                                <th>Estado</th>

                                                <th>Acciones</th>
<!--                                                <th>Eliminar</th>-->
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    if (isset($_SESSION['listado_categoria'])) {
                                                        $listado_categoria = unserialize($_SESSION['listado_categoria']);
                                                        foreach ($listado_categoria as $cate) {
                                                            echo "<tr>";
                                                            echo "<td>" . $cate->getDescripcion_cat() . "</td>";
                                                            echo "<td>" . $cate->getEstado_cat() . "</td>";
                                                            echo "<td><a href='../../../../controller/controllerAdmin.php?opcion=editar_categoria&ID_CATEGORIA=" .
                                                            $cate->getId_cat() . "'> Editar </a></td>";
//                                                            echo "<td><a onclick='return ConfirmDelete()'style='color:red'href='../../../../controller/controllerAdmin.php?opcion=eliminar_categoria&ID_CATEGORIA=" .
//                                                            $cate->getId_cat() . "'> Eliminar </a></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "No se han cargado datos.";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
