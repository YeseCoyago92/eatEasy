<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rol
 *
 * @author De la Cruz
 */
class Rol {
   //put your code here
    private $id_rol;
    private $descripcion_rol;
    private $estado_rol;

    function __construct($id_rol, $descripcion_rol, $estado_rol) {
        $this->id_rol = $id_rol;
        $this->descripcion_rol = $descripcion_rol;
        $this->estado_rol = $estado_rol;
    }
    function getId_rol() {
        return $this->id_rol;
    }

    function getDescripcion_rol() {
        return $this->descripcion_rol;
    }

    function getEstado_rol() {
        return $this->estado_rol;
    }

    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    function setDescripcion_rol($descripcion_rol) {
        $this->descripcion_rol = $descripcion_rol;
    }

    function setEstado_rol($estado_rol) {
        $this->estado_rol = $estado_rol;
    }


}
