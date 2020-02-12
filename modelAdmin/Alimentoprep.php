<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alimentoprep
 *
 * @author De la Cruz
 */
class Alimentoprep {

    //put your code here
    private $id_alimprep;
    private $id_cat;
    private $id_per;
    private $nombre_alimprep;
    private $descripción_alimprep;
    private $precio_alimprep;
    private $nombre_img;

    function __construct($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $nombre_img) {
        $this->id_alimprep = $id_alimprep;
        $this->id_cat = $id_cat;
        $this->id_per = $id_per;
        $this->nombre_alimprep = $nombre_alimprep;
        $this->descripción_alimprep = $descripción_alimprep;
        $this->precio_alimprep = $precio_alimprep;
        $this->nombre_img = $nombre_img;
    }
    
    
    function getNombre_img() {
        return $this->nombre_img;
    }

    function setNombre_img($nombre_img) {
        $this->nombre_img = $nombre_img;
    }

    
        function getId_alimprep() {
        return $this->id_alimprep;
    }

    function getId_cat() {
        return $this->id_cat;
    }

    function getId_per() {
        return $this->id_per;
    }

    function getNombre_alimprep() {
        return $this->nombre_alimprep;
    }

    function getDescripción_alimprep() {
        return $this->descripción_alimprep;
    }

    function getPrecio_alimprep() {
        return $this->precio_alimprep;
    }

    

    function setId_alimprep($id_alimprep) {
        $this->id_alimprep = $id_alimprep;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setId_per($id_per) {
        $this->id_per = $id_per;
    }

    function setNombre_alimprep($nombre_alimprep) {
        $this->nombre_alimprep = $nombre_alimprep;
    }

    function setDescripción_alimprep($descripción_alimprep) {
        $this->descripción_alimprep = $descripción_alimprep;
    }

    function setPrecio_alimprep($precio_alimprep) {
        $this->precio_alimprep = $precio_alimprep;
    }


}
