<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Repartidor
 *
 * @author De la Cruz
 */
class Repartidor {
    //put your code here
     private $id_rep;
     private $id_rol;
     private $estado_rep;
     function __construct($id_rep, $id_rol, $estado_rep) {
         $this->id_rep = $id_rep;
         $this->id_rol = $id_rol;
         $this->estado_rep = $estado_rep;
     }
     function getId_rep() {
         return $this->id_rep;
     }

     function getId_rol() {
         return $this->id_rol;
     }

     function getEstado_rep() {
         return $this->estado_rep;
     }

     function setId_rep($id_rep) {
         $this->id_rep = $id_rep;
     }

     function setId_rol($id_rol) {
         $this->id_rol = $id_rol;
     }

     function setEstado_rep($estado_rep) {
         $this->estado_rep = $estado_rep;
     }


}
