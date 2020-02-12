<?php

include_once '../modelAdmin/ModelAdmin.php';
session_start();
$opcion = $_REQUEST['opcion'];
$modeloAd = new ModelAdmin();
$listado = $modeloAd->obtenerUsuarios();
$_SESSION['listado'] = serialize($listado);




switch ($opcion) {
    case "listar":
//obtenemos la lista de facturas:
        $listado = $modeloAd->obtenerUsuarios();
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
//redireccionamos a la pagina index para visualizar:
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/tabla_usuarios.php');
        break;
//----------------------------------------------IVA-----------------------------------------------------------//
    case "ver_iva":
        $listado_iva = $modeloAd->obtenerIva();
//y los guardamos en sesion:
        $_SESSION['listado_iva'] = serialize($listado_iva);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_ver.php');
        break;

    case "agregar_iva";
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_agregar.php');
        break;

    case "guardar_iva";
        $id_tipoiva = $_REQUEST['ID_TIPOIVA'];
        $descr_tipoiva = $_REQUEST['DESCRIPCION_TIPOIVA'];
        $valor_tipoiva = $_REQUEST['VALOR_TIPOIVA'];
        $estado_tipoiva = $_REQUEST['ESTADO_TIPOIVA'];
        $modeloAd->insertarIVA($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva);
//actualizamos lista:
        $listado_iva = $modeloAd->obtenerIva();
        $_SESSION['listado_iva'] = serialize($listado_iva);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_ver.php');
        $_SESSION['ID_TIPOIVA'] = $id_tipoiva;
        break;

    case "editar_iva":
//obtenemos los parametros del formulario:
        $id_tipoiva = $_REQUEST['ID_TIPOIVA'];
//Buscamos los datos
        $tipoiva = $modeloAd->getIvaUnico($id_tipoiva);
//guardamos en sesion para edicion posterior:
        $_SESSION['tipoiva'] = serialize($tipoiva);
//redirigimos la navegación al formulario de edicion:
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_editar.php');
        break;

    case "actualizar_iva":
//obtenemos los parametros del formulario:
        $id_tipoiva = $_REQUEST['ID_TIPOIVA'];
        $descr_tipoiva = $_REQUEST['DESCRIPCION_TIPOIVA'];
        $valor_tipoiva = $_REQUEST['VALOR_TIPOIVA'];
        $estado_tipoiva = $_REQUEST['ESTADO_TIPOIVA'];
//actualizamos:
        $modeloAd->actualizarIVA($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva);
        $listado_iva = $modeloAd->obtenerIva();
        $_SESSION['listado_iva'] = serialize($listado_iva);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_ver.php');
        break;

    case "eliminar_iva":
        $id_tipoiva = $_REQUEST['ID_TIPOIVA'];
        $descr_tipoiva = $_REQUEST['DESCRIPCION_TIPOIVA'];
        $valor_tipoiva = $_REQUEST['VALOR_TIPOIVA'];
        $estado_tipoiva = $_REQUEST['ESTADO_TIPOIVA'];
        $modeloAd->eliminarIVA($id_tipoiva);
        $listado_iva = $modeloAd->obtenerIva();
        $_SESSION['listado_iva'] = serialize($listado_iva);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/iva_ver.php');
        break;

//----------------------------------------------CATEGORIA-----------------------------------------------------------//
    case "ver_categoria":
        $listado_categoria = $modeloAd->obtenerCategorias();
//y los guardamos en sesion:
        $_SESSION['listado_categoria'] = serialize($listado_categoria);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_ver.php');
        break;

    case "agregar_categoria";
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_agregar.php');
        break;

    case "guardar_categoria";
        $id_cat = $_REQUEST['ID_CATEGORIA'];
        $descripcion_cat = $_REQUEST['DESCRIPCION_CATEGORIA'];
        $estado_cat = $_REQUEST['ESTADO_CATEGORIA'];
        $modeloAd->insertarCategoria($id_cat, $descripcion_cat, $estado_cat);
//actualizamos lista de facturas:
        $listado_categoria = $modeloAd->obtenerCategorias();
        $_SESSION['listado_categoria'] = serialize($listado_categoria);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_ver.php');
        $_SESSION['ID_CATEGORIA'] = $id_cat;
        break;

    case "editar_categoria":
//obtenemos los parametros del formulario:
        $id_cat = $_REQUEST['ID_CATEGORIA'];
//Buscamos los datos
        $categoria = $modeloAd->getCategoriaUnica($id_cat);
//guardamos en sesion para edicion posterior:
        $_SESSION['categoria'] = serialize($categoria);
//redirigimos la navegación al formulario de edicion:
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_editar.php');
        break;

    case "actualizar_categoria":
//obtenemos los parametros del formulario:
        $id_cat = $_REQUEST['ID_CATEGORIA'];
        $descripcion_cat = $_REQUEST['DESCRIPCION_CATEGORIA'];
        $estado_cat = $_REQUEST['ESTADO_CATEGORIA'];
//actualizamos la factura:
        $modeloAd->actualizarCategoria($id_cat, $descripcion_cat, $estado_cat);
        $listado_categoria = $modeloAd->obtenerCategorias();
        $_SESSION['listado_categoria'] = serialize($listado_categoria);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_ver.php');
        break;

    case "eliminar_categoria":
        $id_cat = $_REQUEST['ID_CATEGORIA'];
        $descripcion_cat = $_REQUEST['DESCRIPCION_CATEGORIA'];
        $estado_cat = $_REQUEST['ESTADO_CATEGORIA'];
        $modeloAd->eliminarCategoria($id_cat);
        $listado_categoria = $modeloAd->obtenerCategorias();
        $_SESSION['listado_categoria'] = serialize($listado_categoria);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/cate_ver.php');
        break;

//----------------------------------------------ROL-----------------------------------------------------------//
        break;
    case "ver_rol":
        $listado_rol = $modeloAd->obtenerRoles();
//y los guardamos en sesion:
        $_SESSION['listado_rol'] = serialize($listado_rol);
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/rol_ver.php');

        break;
    case "editar_rol":
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/rol_editar.php');

        break;
    case "cambio_cntr":
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/usuario.php');

        break;
//----------------------------------------------ALIMENTO PREPARADO-----------------------------------------------------------//
    case "ver_aplimentop":
        $listado_alimentop = $modeloAd->obtenerAlimentoPreparado();
//y los guardamos en sesion:
        $_SESSION['listado_alimentop'] = serialize($listado_alimentop);
        header('Location: ../cliente/alim_ver.php');
 
        

        break;

    case "ver_aplimentop_per":
        $correo = $_REQUEST['correo'];
        $listado_alimentop = $modeloAd->obtenerAlimentoPreparado2($correo);
//y los guardamos en sesion:
        $_SESSION['listado_alimentop'] = serialize($listado_alimentop);
        // include '../cliente/orden/index.php';
        header('Location: ../cliente/alim_misofertas.php');
        break;

    case "agregar_aplimentop";
        header('Location: ../cliente/alim_agregar.php');
        break;

    case "guardar_aplimentop";
        $id_alimprep = $_REQUEST['ID_ALIMENTOPREPARADO'];
        $id_cat = $_REQUEST['ID_CATEGORIA'];
        $id_per = $_REQUEST['ID_PERSONA'];
        $nombre_alimprep = $_REQUEST['NOMBRE_ALIMENTOPREPARADO'];
        $descripción_alimprep = $_REQUEST['DESCRIPCION_ALIMENTOPREPARADO'];
        $precio_alimprep = $_REQUEST['PRECIO_ALIMENTOPREPARADO'];
//        //$imagen_alimprep = $_REQUEST['IMAGEN_ALIMENTOPREPARADO'];
/////////////////////////////////////////////////77
//        $nombre_img = $_FILES['imagen']['name'];
//        $tipo = $_FILES['imagen']['type'];
//        $tamano = $_FILES['imagen']['size'];
//
////Si existe imagen y tiene un tamaño correcto
//        if (($nombre_img == !NULL)($_FILES['imagen']['size'] = 200000)) {
////indicamos los formatos que permitimos subir a nuestro servidor
//            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
//// Ruta donde se guardarán las imágenes que subamos
//                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';
//// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
//                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
//            } else {
////si no cumple con el formato
//                echo "No se puede subir una imagen con ese formato ";
//            }
//        } else {
////si existe la variable pero se pasa del tamaño permitido
//            if ($nombre_img == !NULL)
//                echo "La imagen es demasiado grande ";
//        }

        $nombre_img = 'hola';

///////////////////////////////////////////7777
        $modeloAd->insertarAlimentoPreparado($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $nombre_img);


        if (!isset($_SESSION['sesionDTO'])) {
            header('Location: ../index.php');
            die();
        }
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        if ($sesionDTO->getRol() != "2") {
            header('Location: ../index.php');
            die();
        }
        $correo = $sesionDTO->getCorreo();
        $listado_alimentop = $modeloAd->obtenerAlimentoPreparado2($correo);
//y los guardamos en sesion:
        $_SESSION['listado_alimentop'] = serialize($listado_alimentop);
        header('Location: ../cliente/alim_misofertas.php');
        $_SESSION['ID_ALIMENTOPREPARADO'] = $id_alimprep;
        break;

    case "editar_aplimentop":
        $id_alimprep = $_REQUEST['ID_ALIMENTOPREPARADO'];
        $alimento = $modeloAd->getAlimentoPreparadoUnico($id_alimprep);
        $_SESSION['alimento'] = serialize($alimento);
        header('Location: ../cliente/alim_editar.php');
        break;

    case "actualizar_aplimentop":
//obtenemos los parametros del formulario:
//$correo = $_REQUEST['correo'];
        $id_alimprep = $_REQUEST['ID_ALIMENTOPREPARADO'];
        $id_cat = $_REQUEST['ID_CATEGORIA'];
        $id_per = $_REQUEST['ID_PERSONA'];
        $nombre_alimprep = $_REQUEST['NOMBRE_ALIMENTOPREPARADO'];
        $descripción_alimprep = $_REQUEST['DESCRIPCION_ALIMENTOPREPARADO'];
        $precio_alimprep = $_REQUEST['PRECIO_ALIMENTOPREPARADO'];
        $imagen_alimprep = $_REQUEST['IMAGEN_ALIMENTOPREPARADO'];
//actualizamos la factura:
        $modeloAd->actualizarAlimentoPreparado($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $imagen_alimprep);


        if (!isset($_SESSION['sesionDTO'])) {
            header('Location: ../index.php');
            die();
        }
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        if ($sesionDTO->getRol() != "2") {
            header('Location: ../index.php');
            die();
        }
        $correo = $sesionDTO->getCorreo();
        $listado_alimentop = $modeloAd->obtenerAlimentoPreparado2($correo);
//y los guardamos en sesion:
        $_SESSION['listado_alimentop'] = serialize($listado_alimentop);
        header('Location: ../cliente/alim_misofertas.php');

        break;

    case "eliminar_aplimentop":
        $id_alimprep = $_REQUEST['ID_ALIMENTOPREPARADO'];
        $modeloAd->eliminarAlimentoPreparado($id_alimprep);

        if (!isset($_SESSION['sesionDTO'])) {
            header('Location: ../index.php');
            die();
        }
        $sesionDTO = unserialize($_SESSION['sesionDTO']);
        if ($sesionDTO->getRol() != "2") {
            header('Location: ../index.php');
            die();
        }
        $correo = $sesionDTO->getCorreo();
        $listado_alimentop = $modeloAd->obtenerAlimentoPreparado2($correo);
//y los guardamos en sesion:
        $_SESSION['listado_alimentop'] = serialize($listado_alimentop);
        header('Location: ../cliente/alim_misofertas.php');
        break;

//----------------------------------------------PERSONA-----------------------------------------------------------//
    case "ver_persona":
        $listado_persona = $modeloAd->obtenerPersonas();
//y los guardamos en sesion:
        $_SESSION['listado_persona'] = serialize($listado_persona);
        header('Location:');
        break;

    case "editar_persona":
//obtenemos los parametros del formulario:
        $id_per = $_REQUEST['ID_PERSONA'];
//Buscamos los datos
        $persona = $modeloAd->getPersonaUnica($id_per);
//guardamos en sesion para edicion posterior:
        $_SESSION['alimento'] = serialize($persona);
//redirigimos la navegación al formulario de edicion:
        header('Location:');
        break;

    case "cancelar_iva_categoria";
        header('Location: ../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/configuraciones.php');
        break;

    case "cancelar_alimentop";
        header('Location: ../cliente/alim_ver.php');
        break;
}


