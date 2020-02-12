<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoIva
 *
 * @author De la Cruz
 */
class TipoIva {
    //put your code here
     private $id_tipoiva;
     private $descr_tipoiva;
     private $valor_tipoiva;
     private $estado_tipoiva;
     function __construct($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva) {
         $this->id_tipoiva = $id_tipoiva;
         $this->descr_tipoiva = $descr_tipoiva;
         $this->valor_tipoiva = $valor_tipoiva;
         $this->estado_tipoiva = $estado_tipoiva;
     }
     function getId_tipoiva() {
         return $this->id_tipoiva;
     }

     function getDescr_tipoiva() {
         return $this->descr_tipoiva;
     }

     function getValor_tipoiva() {
         return $this->valor_tipoiva;
     }

     function getEstado_tipoiva() {
         return $this->estado_tipoiva;
     }

     function setId_tipoiva($id_tipoiva) {
         $this->id_tipoiva = $id_tipoiva;
     }

     function setDescr_tipoiva($descr_tipoiva) {
         $this->descr_tipoiva = $descr_tipoiva;
     }

     function setValor_tipoiva($valor_tipoiva) {
         $this->valor_tipoiva = $valor_tipoiva;
     }

     function setEstado_tipoiva($estado_tipoiva) {
         $this->estado_tipoiva = $estado_tipoiva;
     }


}
