<?php

include 'Database.php';
include 'Persona.php';
include 'Alimentoprep.php';
include 'Categoria.php';
include 'DetalleOrd.php';
include 'Entrega.php';
include 'Orden.php';
include 'Repartidor.php';
include 'TipoIva.php';
include 'SesionDTO.php';
include 'Rol.php';

class ModelAdmin {

    public function obtenerUsuarios() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_persona order by ID_PERSONA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $persona = new Persona($res['ID_PERSONA'], $res['CEDULA_PERSONA'], $res['NOMBRES_PERSONA'], $res['APELLIDOS_PERSONA'], $res['FECHANACIMIENTO_PERSONA'], $res['CELULAR_PERSONA'], $res['CORREO_PERSONA']);
            array_push($listado, $persona);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function obtenerEntregas() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_entrega order by ID_ENTREGA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $entrega = new Entrega($res['ID_ENTREGA'], $res['ID_ORDEN'], $res['ID_PERSONA'], $res['FORMAPAGO'], $res['ESTADO_ENTREGA']);
            array_push($listado, $entrega);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    //----------------------------------------------IVA-----------------------------------------------------------//
    public function obtenerIva() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_tipoiva order by ID_TIPOIVA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $iva = new TipoIva($res['ID_TIPOIVA'], $res['DESCRIPCION_TIPOIVA'], $res['VALOR_TIPOIVA'], $res['ESTADO_TIPOIVA']);
            array_push($listado, $iva);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function obtenerIvaActivo() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_tipoiva where ESTADO_TIPOIVA = 'A' order by ID_TIPOIVA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $iva = new TipoIva($res['ID_TIPOIVA'], $res['DESCRIPCION_TIPOIVA'], $res['VALOR_TIPOIVA'], $res['ESTADO_TIPOIVA']);
            array_push($listado, $iva);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getIvaUnico($id_tipoiva) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_tipoiva where ID_TIPOIVA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_tipoiva));
        //obtenemos el objeto especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $iva = new TipoIva($res['ID_TIPOIVA'], $res['DESCRIPCION_TIPOIVA'], $res['VALOR_TIPOIVA'], $res['ESTADO_TIPOIVA']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $iva;
    }

    public function insertarIVA($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva) {
        $tipoiva = new TipoIva($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva);
        $pdo = Database::connect();
        $sql = "insert into tab_tipoiva(ID_TIPOIVA,DESCRIPCION_TIPOIVA,VALOR_TIPOIVA,ESTADO_TIPOIVA) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function actualizarIVA($id_tipoiva, $descr_tipoiva, $valor_tipoiva, $estado_tipoiva) {
        $pdo = Database::connect();
        $sql = "update tab_tipoiva set DESCRIPCION_TIPOIVA=?,VALOR_TIPOIVA=?,ESTADO_TIPOIVA=? where ID_TIPOIVA=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($descr_tipoiva, $valor_tipoiva, $estado_tipoiva, $id_tipoiva));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarIVA($id_tipoiva) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tab_tipoiva where ID_TIPOIVA=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id_tipoiva));
        Database::disconnect();
    }

    //----------------------------------------------CATEGORIA-----------------------------------------------------------//
    public function obtenerCategorias() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_categoria order by ID_CATEGORIA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos
        $listado = array();
        foreach ($resultado as $res) {
            $cate = new Categoria($res['ID_CATEGORIA'],strtoupper($res['DESCRIPCION_CATEGORIA']), $res['ESTADO_CATEGORIA']);
            array_push($listado, $cate);
        }


        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function obtenerCategoriasActivos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_categoria where ESTADO_CATEGORIA = 'A' order by ID_CATEGORIA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos
        $listado = array();
        foreach ($resultado as $res) {
            $cate = new Categoria($res['ID_CATEGORIA'], strtoupper($res['DESCRIPCION_CATEGORIA']), $res['ESTADO_CATEGORIA']);
            array_push($listado, $cate);
        }


        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getCategoriaUnica($id_cat) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_categoria where ID_CATEGORIA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_cat));
        //obtenemos el objeto especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cate = new Categoria($res['ID_CATEGORIA'], $res['DESCRIPCION_CATEGORIA'], $res['ESTADO_CATEGORIA']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $cate;
    }

    public function insertarCategoria($id_cat, $descripcion_cat, $estado_cat) {
        $categoria = new Categoria($id_cat, $descripcion_cat, $estado_cat);
        $pdo = Database::connect();
        $sql = "insert into tab_categoria(ID_CATEGORIA,DESCRIPCION_CATEGORIA,ESTADO_CATEGORIA) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_cat, $descripcion_cat, $estado_cat));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function actualizarCategoria($id, $descripcion, $estado) {
        $pdo = Database::connect();
        $sql = "update tab_categoria set DESCRIPCION_CATEGORIA=?,ESTADO_CATEGORIA=? where ID_CATEGORIA=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($descripcion, $estado, $id));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCategoria($id_cat) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tab_categoria where ID_CATEGORIA=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id_cat));
        Database::disconnect();
    }

    //----------------------------------------------ROLES-----------------------------------------------------------//

    public function obtenerRoles() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_rol order by ID_ROL desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $rol = new Rol($res['ID_ROL'], $res['DESCRIPCION_ROL'], $res['ESTADO_ROL']);
            array_push($listado, $rol);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

//----------------------------------------------ALIMENTO PREPARADO-----------------------------------------------------------//
    public function obtenerAlimentoPreparado() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_alimentopreparado order by ID_ALIMENTOPREPARADO asc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos
        $listado = array();
        foreach ($resultado as $res) {
            $alimento = new Alimentoprep($res['ID_ALIMENTOPREPARADO'], $res['ID_CATEGORIA'], $res['ID_PERSONA'], $res['NOMBRE_ALIMENTOPREPARADO'], $res['DESCRIPCION_ALIMENTOPREPARADO'], $res['PRECIO_ALIMENTOPREPARADO'], $res['IMAGEN_ALIMENTOPREPARADO']);
            array_push($listado, $alimento);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function obtenerAlimentoPreparado2($correo) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_persona p, tab_persona_rol pr, tab_alimentopreparado ap "
                . "where p.correo_persona ='" . $correo . "' and pr.id_persona = p.id_persona and p.id_persona= ap.id_persona";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos
        $listado = array();
        foreach ($resultado as $res) {
            $alimento = new Alimentoprep($res['ID_ALIMENTOPREPARADO'], $res['ID_CATEGORIA'], $res['ID_PERSONA'], $res['NOMBRE_ALIMENTOPREPARADO'], $res['DESCRIPCION_ALIMENTOPREPARADO'], $res['PRECIO_ALIMENTOPREPARADO'], $res['IMAGEN_ALIMENTOPREPARADO']);
            array_push($listado, $alimento);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getAlimentoPreparadoUnico($id_alimprep) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_alimentopreparado where ID_ALIMENTOPREPARADO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_alimprep));
        //obtenemos el objeto especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $alimento = new Alimentoprep($res['ID_ALIMENTOPREPARADO'], $res['ID_CATEGORIA'], $res['ID_PERSONA'], $res['NOMBRE_ALIMENTOPREPARADO'], $res['DESCRIPCION_ALIMENTOPREPARADO'], $res['PRECIO_ALIMENTOPREPARADO'], $res['IMAGEN_ALIMENTOPREPARADO']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $alimento;
    }

    public function insertarAlimentoPreparado($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $nombre_img) {
        $pdo = Database::connect();
        $sql = "insert into tab_alimentopreparado(ID_ALIMENTOPREPARADO,ID_CATEGORIA,ID_PERSONA,NOMBRE_ALIMENTOPREPARADO,DESCRIPCION_ALIMENTOPREPARADO,PRECIO_ALIMENTOPREPARADO,IMAGEN_ALIMENTOPREPARADO) values(?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $nombre_img));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function actualizarAlimentoPreparado($id_alimprep, $id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $imagen_alimprep) {
        $pdo = Database::connect();
        $sql = "update tab_alimentopreparado set ID_CATEGORIA=?,ID_PERSONA=?,NOMBRE_ALIMENTOPREPARADO=?,DESCRIPCION_ALIMENTOPREPARADO=?,PRECIO_ALIMENTOPREPARADO=?,IMAGEN_ALIMENTOPREPARADO=? where ID_ALIMENTOPREPARADO=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_cat, $id_per, $nombre_alimprep, $descripción_alimprep, $precio_alimprep, $imagen_alimprep, $id_alimprep));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarAlimentoPreparado($id_alimprep) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tab_alimentopreparado where ID_ALIMENTOPREPARADO=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id_alimprep));
        Database::disconnect();
    }

//----------------------------------------------PERSONA-----------------------------------------------------------//  
    public function obtenerPersonas() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from  tab_persona order by ID_PERSONA desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos
        $listado = array();
        foreach ($resultado as $res) {
            $persona = new Persona($res['ID_PERSONA'], $res['CEDULA_PERSONA'], $res['NOMBRES_PERSONA'], ['APELLIDOS_PERSONA'], $res['FECHANACIMIENTO_PERSONA'], $res['CELULAR_PERSONA'], $res['CORREO_PERSONA']);
            array_push($listado, $persona);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getPersonaUnica($id_per) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from tab_persona where ID_PERSONA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_per));
        //obtenemos el objeto especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $pers = new Persona($res['ID_PERSONA'], $res['CEDULA_PERSONA'], $res['NOMBRES_PERSONA'], ['APELLIDOS_PERSONA'], $res['FECHANACIMIENTO_PERSONA'], $res['CELULAR_PERSONA'], $res['CORREO_PERSONA']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $pers;
    }

}
