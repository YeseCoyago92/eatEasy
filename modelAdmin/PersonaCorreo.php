<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaCorreo
 *
 * @author rmdav
 */
class PersonaCorreo {
    //put your code here
    //put your code here
    private $id_per;
    private $cedula_per;
    private $nombres_per;
    private $apellidos_per;
    private $fechanac_per;
    private $celular_per;
    private $correo_per;

    function __construct($id_per, $cedula_per, $nombres_per, $apellidos_per, $fechanac_per, $celular_per, $correo_per) {
        $this->id_per = $id_per;
        $this->cedula_per = $cedula_per;
        $this->nombres_per = $nombres_per;
        $this->apellidos_per = $apellidos_per;
        $this->fechanac_per = $fechanac_per;
        $this->celular_per = $celular_per;
        $this->correo_per = $correo_per;
    }

    function getId_per() {
        return $this->id_per;
    }

    function getCedula_per() {
        return $this->cedula_per;
    }

    function getNombres_per() {
        return $this->nombres_per;
    }

    function getApellidos_per() {
        return $this->apellidos_per;
    }

    function getFechanac_per() {
        return $this->fechanac_per;
    }

    function getCelular_per() {
        return $this->celular_per;
    }

    function getCorreo_per() {
        return $this->correo_per;
    }

    function setId_per($id_per) {
        $this->id_per = $id_per;
    }

    function setCedula_per($cedula_per) {
        $this->cedula_per = $cedula_per;
    }

    function setNombres_per($nombres_per) {
        $this->nombres_per = $nombres_per;
    }

    function setApellidos_per($apellidos_per) {
        $this->apellidos_per = $apellidos_per;
    }

    function setFechanac_per($fechanac_per) {
        $this->fechanac_per = $fechanac_per;
    }

    function setCelular_per($celular_per) {
        $this->celular_per = $celular_per;
    }

    function setCorreo_per($correo_per) {
        $this->correo_per = $correo_per;
    }
}
