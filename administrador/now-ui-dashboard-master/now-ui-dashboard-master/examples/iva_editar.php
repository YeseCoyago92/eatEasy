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
           EDITAR IVA
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="../assets/css/switch.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Files -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
        <!--        <link href="../assets/css/switch.css" rel="stylesheet" />-->
        <!--        <link rel="stylesheet" href="../../../../css/estilos.css">-->
        <!--        <link rel="stylesheet" href="../../../../css/responsive.css">-->
        <!--        <script src="js/jquery-3.1.0.min.js"></script>
                <script src="js/main.js"></script>-->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
        <link href="../assets/css/switch.css" rel="stylesheet" />
    </head>
    <script type="text/javascript">
        function ConfirmEditIva() {
            var respuesta = confirm("Esta seguro que desea editar la información?");
            if (respuesta == true) {
                return true;
            } else
            {
                return false;
            }
        }
        
        function ConfirmarCancelar() {
            var respuesta = confirm("Está seguro que desea cancelar");
            if (respuesta == true) {
                return true;
            } else
            {
                return false;
            }
        }
    </script>
    <body class="">

        <?php
        $tipoiva = unserialize($_SESSION['tipoiva']);
        ?>

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
                            <a class="navbar-brand" href="configuraciones.php">IVA</a>
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
                <section class="contact-box">
                    <div class="row no-gutters bg-dark">
                        <div class="col-xl-5 col-lg-12 register-bg1">
                            <div class="position-absolute testiomonial p-4">
                                <!--                                <h3 class="font-weight-bold text-light">Los mejores en alimentos online.</h3>
                                                                <p class="lead text-light">La nueva etapa de la revolución digital se aproxima.</p>-->
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 d-flex">
                            <div class="container align-self-center p-6">
                                <h1 class="font-weight-bold mb-3">EDITAR IVA</h1>
                                <div class="form-group">
            <!--                        <button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3 width-100"><i class="icon ion-logo-google lead align-middle mr-2"></i> Google </button>
                                    <button class="btn btn-outline-dark d-inline-block text-light mb-3 width-100"><i class="icon ion-logo-facebook lead align-middle mr-2"></i> Facebook</button>-->
                                </div>
                                <p class="text-muted mb-5">Edite la siguiente información.</p>

                                <form action="../../../../controller/controllerAdmin.php">
                                    <div class="form-group mb-3">
                                        <input type="hidden" name="opcion" value="actualizar_iva">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" class="form-control" name="ID_TIPOIVA" value="<?php echo $tipoiva->getId_tipoiva(); ?>" required="true"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Descripción:<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Descripción" name='DESCRIPCION_TIPOIVA' value="<?php echo $tipoiva->getDescr_tipoiva(); ?>" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Valor:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" placeholder="Valor" name='VALOR_TIPOIVA' value="<?php echo $tipoiva->getValor_tipoiva(); ?>" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Estado: <span class="text-danger">*</span></label>
                                        <select name="ESTADO_TIPOIVA">
                                            <?php
                                            if ($tipoiva->getEstado_tipoiva() == "A") {
                                                echo "<option>A</option>";
                                                echo "<option>I</option>";
                                            } else if ($tipoiva->getEstado_tipoiva() == "I") {
                                                echo"<option>I</option>";
                                                echo "<option>A</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" value="Actualizar Datos" class="btn btn-primary width-100" onclick="return ConfirmEditIva()()">
                                </form>
                                <form action="../../../../controller/controllerAdmin.php">
                                    <input type="hidden" name="opcion" value="cancelar_iva_categoria">
                                    <button class="btn btn-primary width-100" type="submit" onclick="return ConfirmarCancelar()">Cancelar</button>
                                </form>
                                <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © EatEasy</small>
                                </section>

                                <!--End Navbar-->

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
