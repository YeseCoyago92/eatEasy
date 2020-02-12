<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleOrd
 *
 * @author De la Cruz
 */
class DetalleOrd {
    //put your code here
    private $id_detord;
    private $id_ord;
    private $id_alimprep;
    private $cantidad_detord;
    private $nombre_detord;
    private $total_detord;
    function __construct($id_detord, $id_ord, $id_alimprep, $cantidad_detord, $nombre_detord, $total_detord) {
        $this->id_detord = $id_detord;
        $this->id_ord = $id_ord;
        $this->id_alimprep = $id_alimprep;
        $this->cantidad_detord = $cantidad_detord;
        $this->nombre_detord = $nombre_detord;
        $this->total_detord = $total_detord;
    }

    function getId_detord() {
        return $this->id_detord;
    }

    function getId_ord() {
        return $this->id_ord;
    }

    function getId_alimprep() {
        return $this->id_alimprep;
    }

    function getCantidad_detord() {
        return $this->cantidad_detord;
    }

    function getNombre_detord() {
        return $this->nombre_detord;
    }

    function getTotal_detord() {
        return $this->total_detord;
    }

    function setId_detord($id_detord) {
        $this->id_detord = $id_detord;
    }

    function setId_ord($id_ord) {
        $this->id_ord = $id_ord;
    }

    function setId_alimprep($id_alimprep) {
        $this->id_alimprep = $id_alimprep;
    }

    function setCantidad_detord($cantidad_detord) {
        $this->cantidad_detord = $cantidad_detord;
    }

    function setNombre_detord($nombre_detord) {
        $this->nombre_detord = $nombre_detord;
    }

    function setTotal_detord($total_detord) {
        $this->total_detord = $total_detord;
    }


}
