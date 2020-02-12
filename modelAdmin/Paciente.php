<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Alexander
 */
class Paciente {
    private $id_paciente; 
    private $correo; 
    private $clave; 
    private $activo; 
    private $rol; 
    private $cedula; 
    private $nombres; 
    private $fecha_nac; 
    private $telefono;
    
    function __construct($id_paciente, $correo, $clave, $activo, $rol, $cedula, $nombres, $fecha_nac, $telefono) {
        $this->id_paciente = $id_paciente;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->rol = $rol;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $telefono;
    }
    function getId_paciente() {
        return $this->id_paciente;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getActivo() {
        return $this->activo;
    }

    function getRol() {
        return $this->rol;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


    
}
