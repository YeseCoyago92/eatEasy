<?php
/**
 * Description of SesionDTO
 *
 * @author mrea
 */
class SesionDTO {
    private $correo;
    private $rol;
    private $ruta;
    
    function __construct($correo, $rol, $ruta) {
        $this->correo = $correo;
        $this->rol = $rol;
        $this->ruta = $ruta;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getRol() {
        return $this->rol;
    }

    function getRuta() {
        return $this->ruta;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }


}
