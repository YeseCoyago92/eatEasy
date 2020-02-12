<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entrega
 *
 * @author De la Cruz
 */
class Entrega {
    //put your code here
     private $id_entr;
     private $id_ord;
     private $id_rep;
     private $pago_entr;
     private $estado_entr;
     function __construct($id_entr, $id_ord, $id_rep, $pago_entr, $estado_entr) {
         $this->id_entr = $id_entr;
         $this->id_ord = $id_ord;
         $this->id_rep = $id_rep;
         $this->pago_entr = $pago_entr;
         $this->estado_entr = $estado_entr;
     }
     function getId_entr() {
         return $this->id_entr;
     }

     function getId_ord() {
         return $this->id_ord;
     }

     function getId_rep() {
         return $this->id_rep;
     }

     function getPago_entr() {
         return $this->pago_entr;
     }

     function getEstado_entr() {
         return $this->estado_entr;
     }

     function setId_entr($id_entr) {
         $this->id_entr = $id_entr;
     }

     function setId_ord($id_ord) {
         $this->id_ord = $id_ord;
     }

     function setId_rep($id_rep) {
         $this->id_rep = $id_rep;
     }

     function setPago_entr($pago_entr) {
         $this->pago_entr = $pago_entr;
     }

     function setEstado_entr($estado_entr) {
         $this->estado_entr = $estado_entr;
     }


}
