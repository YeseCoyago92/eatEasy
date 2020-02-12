<?php
include_once '../model/Model.php';

session_start();
$opcion = $_REQUEST['opcion'];
$model = new Model();

switch ($opcion) {
    case 'login':
        $correo = $_REQUEST['correo'];        
        $contrasenia = $_REQUEST['contrasenia'];
        $sesionDTO = $model->loginUsuario($correo, $contrasenia);
        
        $_SESSION['sesionDTO'] = serialize($sesionDTO); //guardo en sesion.
        //redireccion de navegacion dependiendo del resultado del login:
        print_r("login paciente");      
        echo "login paciente: ".$sesionDTO->getCorreo();      
        echo "ruta : ".$sesionDTO->getRuta();      
        header('Location: ' . $sesionDTO->getRuta());
        break;
    case 'close':
        $_SESSION['sesionDTO'] = null;
        header('Location: ../view/web/index.html');
        session_destroy();
        die();
        break;
}