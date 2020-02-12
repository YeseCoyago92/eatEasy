<?php
session_start();
include_once '../../../Aplicaciones/pjt_eatEasy/modelAdmin/ModelAdmin.php';
require_once '../../../Aplicaciones/pjt_eatEasy/modelAdmin/ModelAdmin.php';
$model = new ModelAdmin();
$alimento = unserialize($_SESSION['alimento']);

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
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Actualizar item</title>

        <!-- Normalize V8.0.1 -->
        <link rel="stylesheet" href="./css1/normalize.css">

        <!-- Bootstrap V4.3 -->
        <link rel="stylesheet" href="./css1/bootstrap.min.css">

        <!-- Bootstrap Material Design V4.0 -->
        <link rel="stylesheet" href="./css1/bootstrap-material-design.min.css">

        <!-- Font Awesome V5.9.0 -->
        <link rel="stylesheet" href="./css1/all.css">

        <!-- Sweet Alerts V8.13.0 CSS file -->
        <link rel="stylesheet" href="./css1/sweetalert2.min.css">

        <!-- Sweet Alert V8.13.0 JS file-->
        <script src="./js1/sweetalert2.min.js"></script>

        <!-- jQuery Custom Content Scroller V3.1.5 -->
        <link rel="stylesheet" href="./css1/jquery.mCustomScrollbar.css">

        <!-- General Styles -->
        <link rel="stylesheet" href="./css1/style.css">


    </head>
<script type="text/javascript">
        function ConfirmEdit() {
            var respuesta = confirm("Está seguro que desea guardar la información");
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

        function filterFloat(evt, input) {
            // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
            var key = window.Event ? evt.which : evt.keyCode;
            var chark = String.fromCharCode(key)
                    ;
            var tempValue = input.value + chark;
            if (key >= 48 && key <= 57) {
                if (filter(tempValue) === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                if (key == 8 || key == 13 || key == 0) {
                    return true;
                } else if (key == 46) {
                    if (filter(tempValue) === false) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    return false;
                }
            }
        }
        function filter(__val__) {
            var preg = /^([0-9]+\.?[0-9]{0,2})$/;
            if (preg.test(__val__) === true) {
                return true;
            } else {
                return false;
            }

        }
    </script>

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
            
            <section class="full-box page-content">
                <nav class="full-box navbar-info">
                    <a href="#" class="float-left show-nav-lateral">
                        <i class="fas fa-exchange-alt"></i>
                    </a>
                    <a href="user-update.html">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    <a href="#" class="btn-exit-system">
                        <i class="fas fa-power-off"></i>
                    </a>
                </nav>
                <!-- Page header -->
                <div class="full-box page-header">
                    <h3 class="text-left">
                        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; EDITAR ALIMENTO PREPARADO
                    </h3>
                    <p class="text-justify">

                    </p>
                </div>
                <div class="container-fluid">
                    <ul class="full-box list-unstyled page-nav-tabs">
                        <li>
                            <a href="#"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ALIMENTO</a>
                        </li>
                        <li>
                            <a href="alim_misofertas.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ALIMENTOS</a>
                        </li>
                        <li>
<!--                            <a href="item-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ITEM</a>-->
                        </li>
                    </ul>
                </div>

                <!--CONTENT-->
                <div class="container-fluid">
                    <form action="../controller/controllerAdmin.php" class="form-neon" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> &nbsp; Edite la Siguiente Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="opcion" value="actualizar_aplimentop">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="ID_ALIMENTOPREPARADO" value="<?php echo $alimento->getId_alimprep(); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="ID_PERSONA" value="<?php echo $alimento->getId_per(); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="item_estado" class="bmd-label-floating">Categoría</label>
                                            <select class="form-control" name="ID_CATEGORIA" id="item_estado">
                                                <?php
                                                $listad = $model->obtenerCategorias();
                                                foreach ($listad as $categ) {
                                                    if ($categ->getId_cat() == $alimento->getId_cat()) {
                                                        echo "<option selected=true value='" . $categ->getId_cat() . "'>" . $categ->getDescripcion_cat() . "</option>";
                                                    } else {
                                                        echo "<option value='" . $categ->getId_cat() . "'>" . $categ->getDescripcion_cat() . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="item_nombre" class="bmd-label-floating">Nombre</label>
                                            <input value="<?php echo $alimento->getNombre_alimprep(); ?>" type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="NOMBRE_ALIMENTOPREPARADO" id="item_nombre" maxlength="140" required="true">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="item_detalle" class="bmd-label-floating">Descripcion</label>
                                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" value="<?php echo $alimento->getDescripción_alimprep(); ?>" class="form-control" name="DESCRIPCION_ALIMENTOPREPARADO" id="item_detalle" maxlength="190" required="true">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="item_codigo" class="bmd-label-floating">Precio</label>
                                            <input type="text" onkeypress="return filterFloat(event, this);" value="<?php echo $alimento->getPrecio_alimprep(); ?>"  class="form-control" name="PRECIO_ALIMENTOPREPARADO" id="item_codigo" maxlength="45" required="true">
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <br><br><br>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-raised btn-success btn-sm" onclick="return ConfirmEdit()"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
                        </p>
                    </form>
                </div>
            </section>




        </main>


        <!--=============================================
        =            Include JavaScript files           =
        ==============================================-->
        <!-- jQuery V3.4.1 -->
        <script src="./js1/jquery-3.4.1.min.js" ></script>

        <!-- popper -->
        <script src="./js1/popper.min.js" ></script>

        <!-- Bootstrap V4.3 -->
        <script src="./js1/bootstrap.min.js" ></script>

        <!-- jQuery Custom Content Scroller V3.1.5 -->
        <script src="./js1/jquery.mCustomScrollbar.concat.min.js" ></script>

        <!-- Bootstrap Material Design V4.0 -->
        <script src="./js1/bootstrap-material-design.min.js" ></script>
        <script>$(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });</script>

        <script src="./js1/main.js" ></script>
    </body>
</html>