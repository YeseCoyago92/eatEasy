<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author De la Cruz
 */
class Categoria {

    //put your code here
    private $id_cat;
    private $descripcion_cat;
    private $estado_cat;

    function __construct($id_cat, $descripcion_cat, $estado_cat) {
        $this->id_cat = $id_cat;
        $this->descripcion_cat = $descripcion_cat;
        $this->estado_cat = $estado_cat;
    }

    function getId_cat() {
        return $this->id_cat;
    }

    function getDescripcion_cat() {
        return $this->descripcion_cat;
    }

    function getEstado_cat() {
        return $this->estado_cat;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setDescripcion_cat($descripcion_cat) {
        $this->descripcion_cat = $descripcion_cat;
    }

    function setEstado_cat($estado_cat) {
        $this->estado_cat = $estado_cat;
    }

}
