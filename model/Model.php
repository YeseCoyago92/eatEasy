<?php

include_once '../model/Persona.php';
include_once '../model/Database.php';
include_once '../model/SesionDTO.php';


class Model {

    public function loginUsuario($correo, $clave) {
        $sesionDTO = new SesionDTO($correo, "", "");
        $usuario = $this->consultarUsuario($correo);
        print_r($clave);
        print_r($usuario->getContrasenia());
        if (is_null($usuario)) {
            $sesionDTO->setRuta("../view/login/login.php");
            return $sesionDTO;
        }

        //verificar la clave:

        if ($usuario->getContrasenia() == md5($clave)) {
            //si el usuario esta inactivo, devuelve error:

            if ($usuario->getEstado() == "I") {
                $sesionDTO->setRuta("../index.php");
                //return $sesionDTO;
            }
            //verificacion del rol:
            if ($usuario->getId_rol() == 1) { //ADMINISTRADOR
                $sesionDTO->setRuta("../administrador/now-ui-dashboard-master/now-ui-dashboard-master/examples/entrega.php");
                $sesionDTO->setRol(1);

                return $sesionDTO;
            }
            if ($usuario->getId_rol() == 2) { // CLIENTE
                $sesionDTO->setRuta("../controller/controllerAdmin.php?opcion=ver_aplimentop");
                $sesionDTO->setRol(2);

                return $sesionDTO;
            }
           
        }
        $sesionDTO->setRuta("error.php"); //cualquier otro caso determina error:
        //print_r(md5($clave));
        return $sesionDTO;
    }

    public function consultarUsuario($correo) {
        $pdo = Database::connect();
        $sql = "select * from tab_persona a, tab_persona_rol b where a.id_persona = b.id_persona and estado = 'A' and CORREO_PERSONA = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($correo));
        $dato = $consulta->fetch();

        if (empty($dato)) {
            //no se encontraron datos:
            return null;
        }
        $usuario = new Persona(
                $dato['ID_PERSONA'], $dato['CEDULA_PERSONA'], $dato['NOMBRES_PERSONA'], $dato['APELLIDOS_PERSONA'], $dato['FECHANACIMIENTO_PERSONA'], $dato['CELULAR_PERSONA'], $dato['CORREO_PERSONA'], $dato['ID_ROL'], $dato['ESTADO'], $dato['CONTRASENIA']);

        Database::disconnect();


        return $usuario;
    }

    public function insertarPersona($cedula, $nombres, $apellidos, $fecha_nac, $celular, $correo) {
        $pdo = Database::connect();
        $sql = "INSERT INTO `tab_persona`(`CEDULA_PERSONA`, `NOMBRES_PERSONA`, `APELLIDOS_PERSONA`, `FECHANACIMIENTO_PERSONA`, `CELULAR_PERSONA`, `CORREO_PERSONA`) VALUES (?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($cedula, $nombres, $apellidos, $fecha_nac, $celular, $correo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

        public function consultarCorreo($correo) {
        $pdo = Database::connect();
        $sql = "select * from tab_persona where CORREO_PERSONA = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($correo));
        $dato = $consulta->fetch();

        if (empty($dato)) {
            //no se encontraron datos:
            return null;
        }
         $usuario = new Persona(
                $dato['ID_PERSONA'], $dato['CEDULA_PERSONA'], $dato['NOMBRES_PERSONA'], $dato['APELLIDOS_PERSONA'], $dato['FECHANACIMIENTO_PERSONA'], $dato['CELULAR_PERSONA'], $dato['CORREO_PERSONA'],"","","");

        Database::disconnect();


        return $usuario;
    }
   

    public function insertarPersonaRol($contrasenia, $correo) {
        $pdo = Database::connect();
        $usuario = $this->consultarCorreo($correo);
        print_r($usuario);
        $sql = "INSERT INTO `tab_persona_rol`(`ID_PERSONA`, `ID_ROL`, `ESTADO`, `CONTRASENIA`) VALUES (?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($usuario->getId_persona(),2,"A", md5($contrasenia)));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
