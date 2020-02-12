<!DOCTYPE html>
<?php
session_start();
include_once '../../../Aplicaciones/pjt_eatEasy/modelAdmin/ModelAdmin.php';
require_once '../../../Aplicaciones/pjt_eatEasy/modelAdmin/ModelAdmin.php';
$model = new ModelAdmin();

if (!isset($_SESSION['sesionDTO'])) {
    header('Location: ../view/web/index.html');
    die();
}
$sesionDTO = unserialize($_SESSION['sesionDTO']);
if ($sesionDTO->getRol() != "2") {
    header('Location: ../view/web/index.html');
    die();
}
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="https://kit.fontawesome.com/39b346a923.js" crossorigin="anonymous"></script>
        <title>EATEASY</title>
        
        

        <!-- Normalize V8.0.1 -->
        <link rel="stylesheet" href="css1/normalize.css">

        <!-- Bootstrap V4.3 -->
        <link rel="stylesheet" href="css1/bootstrap.min.css">

        <!-- Bootstrap Material Design V4.0 -->
        <link rel="stylesheet" href="css1/bootstrap-material-design.min.css">

        <!-- Font Awesome V5.9.0 -->
        <link rel="stylesheet" href="css1/all.css">

        <!-- Sweet Alerts V8.13.0 CSS file -->
        <link rel="stylesheet" href="css1/sweetalert2.min.css">

        <!-- Sweet Alert V8.13.0 JS file-->
        <script src="js1/sweetalert2.min.js" ></script>

        <!-- jQuery Custom Content Scroller V3.1.5 -->
        <link rel="stylesheet" href="css1/jquery.mCustomScrollbar.css">

        <!-- General Styles -->
        <link rel="stylesheet" href="css1/style.css">


    </head>
    <body>

        <!-- Main container -->
        <main class="full-box main-container">
            <!-- Nav lateral -->
            <section class="full-box nav-lateral">
                <div class="full-box nav-lateral-bg show-nav-lateral"></div>
                <div class="full-box nav-lateral-content">
                    <figure class="full-box nav-lateral-avatar">
                        <i class="far fa-times-circle show-nav-lateral"></i>
                        <img src="assets1/avatar/Avatar.png" class="img-fluid" alt="Avatar">
                        <figcaption class="roboto-medium text-center">
                            <?php echo $sesionDTO->getCorreo() ?> <br><small class="roboto-condensed-light">Cliente</small>
                        </figcaption>
                    </figure>
                    <div class="full-box nav-lateral-bar"></div>
                    <nav class="full-box nav-lateral-menu">
                        <ul>
                            <li>
                                <a href="alim_ver.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Tablero de Opciones</a>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-shopping-cart fa-fw"></i> &nbsp; Ofertas <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Nuevo Pedido</a>
                                    </li>
                                    <li>
                                        <a href="Pedir_Alimento.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Ver Ofertas</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Ofertas</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-dollar-sign fa-fw"></i> &nbsp; Vender <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="alim_agregar.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Nueva Oferta</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Mis Ofertas <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="../controller/controllerAdmin.php?opcion=ver_aplimentop_per&correo=<?php echo $sesionDTO->getCorreo() ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Ver Mis Ofertas</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </section>

            <!-- Page content -->
            <section class="full-box page-content">
                <nav class="full-box navbar-info">
                    <a href="#" class="float-left show-nav-lateral">
                        <i class="fas fa-exchange-alt"></i>
                    </a>
                    <a href="user-update.html">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    <a href="../controller/controllerLogin.php?opcion=close" class="btn-exit-system">
                        <i class="fas fa-power-off"></i>
                    </a>
                </nav>

                <!-- Page header -->
                <div class="full-box page-header">
                    <h3 class="text-left">
                        <i class="fab fa-dashcube fa-fw"></i> &nbsp; TABLERO DE OPCIONES
                    </h3>
                    <p class="text-justify">

                    </p>
                </div>

                <!-- Content -->
                <div class="full-box tile-container">
                    <a href="Pedir_Alimento.php" class="tile">
                        <div class="tile-tittle">OFERTAS</div>
                        <div class="tile-icon">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <p>Realizar Pedidos, Ver y Buscar Ofertas</p>
                        </div>
                    </a>

                    <a href="alim_agregar.php" class="tile">
                        <div class="tile-tittle">VENDER</div>
                        <div class="tile-icon">
                           
                            <i class="fas fa-dollar-sign fa-fw"></i>
                            <p>Vender Alimento</p>
                        </div>
                    </a>

                    <a href="../controller/controllerAdmin.php?opcion=ver_aplimentop_per&correo=<?php echo $sesionDTO->getCorreo() ?>" class="tile">
                        <div class="tile-tittle">MIS OFERTAS</div>
                        <div class="tile-icon">
                            <i class="fas fa-clipboard-list fa-fw"></i>
                            <p>Ver, Editar y Borrar Mis Ofertas</p>
                        </div>
                    </a>
                </div>


            </section>
        </main>


        <!--=============================================
        =            Include JavaScript files           =
        ==============================================-->
        <!-- jQuery V3.4.1 -->
        <script src="js1/jquery-3.4.1.min.js" ></script>

        <!-- popper -->
        <script src="js1/popper.min.js" ></script>

        <!-- Bootstrap V4.3 -->
        <script src="js1/bootstrap.min.js" ></script>

        <!-- jQuery Custom Content Scroller V3.1.5 -->
        <script src="js1/jquery.mCustomScrollbar.concat.min.js" ></script>

        <!-- Bootstrap Material Design V4.0 -->
        <script src="js1/bootstrap-material-design.min.js" ></script>
        <script>$(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });</script>

        <script src="js1/main.js" ></script>
    </body>
</html>











