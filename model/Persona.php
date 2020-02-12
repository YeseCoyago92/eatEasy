<?php

class Persona {

    private $id_persona;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $fecha_nac;
    private $celular;
    private $correo;
    private $id_rol;
    private $estado;
    private $contrasenia;

    function __construct($id_persona, $cedula, $nombres, $apellidos, $fecha_nac, $celular, $correo, $id_rol, $estado, $contrasenia) {

        $this->id_persona = $id_persona;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->fecha_nac = $fecha_nac;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->id_rol = $id_rol;
        $this->estado = $estado;
        $this->contrasenia = $contrasenia;
    }
    
    function getId_persona() {
        return $this->id_persona;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getCelular() {
        return $this->celular;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getId_rol() {
        return $this->id_rol;
    }

    function getEstado() {
        return $this->estado;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

}
