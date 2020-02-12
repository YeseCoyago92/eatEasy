<?php

include_once '../model/Model.php';
include_once '../model/Persona.php';
require_once '../model/Persona.php';
session_start();
$opcion = $_REQUEST['opcion'];
$model = new Model();

switch ($opcion) {

    case 'registro':
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $fecha_nac = $_REQUEST['fechanac'];
        $celular = $_REQUEST['celular'];
        $correo = $_REQUEST['correo'];
        $contrasenia = $_REQUEST['clave'];    
        
        
        $model->insertarPersona($cedula, $nombres, $apellidos, $fecha_nac, $celular, $correo);
        $model->insertarPersonaRol($contrasenia, $correo);
        header('Location: ../view/login/login.php');
        break;

}