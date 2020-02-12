<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orden
 *
 * @author De la Cruz
 */
class Orden {
    //put your code here
    private $id_per;
    private $id_orden;
    private $id_tipoiva;
    private $fecha_ord;
    private $direccion_ord;
    private $subtotal_ord;
    private $iva_ord;
    private $total_ord;
    private $costoenvio_ord;
    function __construct($id_per, $id_orden, $id_tipoiva, $fecha_ord, $direccion_ord, $subtotal_ord, $iva_ord, $total_ord, $costoenvio_ord) {
        $this->id_per = $id_per;
        $this->id_orden = $id_orden;
        $this->id_tipoiva = $id_tipoiva;
        $this->fecha_ord = $fecha_ord;
        $this->direccion_ord = $direccion_ord;
        $this->subtotal_ord = $subtotal_ord;
        $this->iva_ord = $iva_ord;
        $this->total_ord = $total_ord;
        $this->costoenvio_ord = $costoenvio_ord;
    }
    function getId_per() {
        return $this->id_per;
    }

    function getId_orden() {
        return $this->id_orden;
    }

    function getId_tipoiva() {
        return $this->id_tipoiva;
    }

    function getFecha_ord() {
        return $this->fecha_ord;
    }

    function getDireccion_ord() {
        return $this->direccion_ord;
    }

    function getSubtotal_ord() {
        return $this->subtotal_ord;
    }

    function getIva_ord() {
        return $this->iva_ord;
    }

    function getTotal_ord() {
        return $this->total_ord;
    }

    function getCostoenvio_ord() {
        return $this->costoenvio_ord;
    }

    function setId_per($id_per) {
        $this->id_per = $id_per;
    }

    function setId_orden($id_orden) {
        $this->id_orden = $id_orden;
    }

    function setId_tipoiva($id_tipoiva) {
        $this->id_tipoiva = $id_tipoiva;
    }

    function setFecha_ord($fecha_ord) {
        $this->fecha_ord = $fecha_ord;
    }

    function setDireccion_ord($direccion_ord) {
        $this->direccion_ord = $direccion_ord;
    }

    function setSubtotal_ord($subtotal_ord) {
        $this->subtotal_ord = $subtotal_ord;
    }

    function setIva_ord($iva_ord) {
        $this->iva_ord = $iva_ord;
    }

    function setTotal_ord($total_ord) {
        $this->total_ord = $total_ord;
    }

    function setCostoenvio_ord($costoenvio_ord) {
        $this->costoenvio_ord = $costoenvio_ord;
    }



    
}
