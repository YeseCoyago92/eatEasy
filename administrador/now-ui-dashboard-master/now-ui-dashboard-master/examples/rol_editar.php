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
            Roles | Admin
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
        <link href="../assets/css/switch.css" rel="stylesheet"/>
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
                            <a class="navbar-brand" href="configuraciones.php">ROLES</a>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> LISTADO DE ROLES MANEJADOS</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                                   
                                        <form action="../../../../controller/controllerAdmin.php">
                                            <table class="table">
                                                
                                                <thead class=" text-primary">
                                                <th>
                                                    Descripción
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                                
                                               
                                                </thead>
                                                <tbody >

                                                    <?php
                                                    //verificamos si existe en sesion el listado de facturas:

                                                    if (isset($_SESSION['listado_rol'])) {
                                                        $listado_rol = unserialize($_SESSION['listado_rol']);
                                                        foreach ($listado_rol as $rol) {
                                                            echo "<tr>";
                                                            echo "<td>" . $rol->getDescripcion_rol() . "</td>";
                                                         
                                                            //echo "<td>" . $rol->getEstado_rol() . "</td>";
                                                             echo "<td><a href='#'><label class='switch'><input style='display: none'  type='checkbox'/><div class='switch-btn'></div></label></a></td>";

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
                <footer class="footer">
                    <div class=" container-fluid ">
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://www.creative-tim.com">
                                        Creative Tim
                                    </a>
                                </li>
                                <li>
                                    <a href="http://presentation.creative-tim.com">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright" id="copyright">
                            &copy; <script>
                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                        </div>
                    </div>
                </footer>
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
