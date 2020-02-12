<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Alexander
 */
class Usuario {

    private $correo;
    private $clave;
    private $activo;
    private $rol;
    private $cedula;
    private $nombres;
    private $fecha_nac;
    private $telefono;
    
    function __construct($correo, $clave, $activo, $rol, $cedula, $nombres, $fecha_nac, $telefono) {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->rol = $rol;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $telefono;
    }
    function getCedula() {
        return $this->cedula;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

        function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getActivo() {
        return $this->activo;
    }

    function getRol() {
        return $this->rol;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

}
