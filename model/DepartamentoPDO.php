<?php

/**
 * Archivo DepartamentoPDO.php
 * 
 * Crea departamentos o modifica su estado
 *
 * @package modelo
 */
require_once "DBPDO.php";

/**
 * Class DepartamentoPDO
 * 
 * Esta clase crea, borra, modifica y valida los departamentos
 * 
 * @author Laura Fernandez
 */
Class DepartamentoPDO {

    /**
     * Función buscaDepartamentoPorCodigo
     * 
     * Última revisión 09/02/2019
     * Cogemos los datos del departamento que busquemos
     * 
     * @author Laura Fernandez
     * @param string $codDepartamento pasa el código del departamento
     * @return array aDepartamento pasa el departamento segun el codigo que hemos introducido
     */
    public static function buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda, $primerRegistro,$registrosPagina) {
        $departamentos = [];                        
           
            if (isset($_REQUEST["opcionesBusqueda"])) {
                if ($_REQUEST['opcionesBusqueda'] == "Baja") {
                    $query = " and T02_FechaBajaDepartamento<>'0001-01-01'";
                } else {
                    if ($_REQUEST['opcionesBusqueda'] == "Alta") {
                        $query = " and T02_FechaBajaDepartamento='0001-01-01'";
                    }
                }
            }
            
            //Realizamos la consulta a la base de datos
            $sql = "SELECT * FROM T02_Departamentos where T02_DescDepartamento like (?)";                        
            $resultSet = DBPDO::ejecutaConsulta($sql . $query. " limit $primerRegistro, $registrosPagina",  ["%$nombre%"]); //Ejecutamos la consulta.                         
            //Guardamos los datos
            if ($resultSet->rowCount() != 0) { 
                while ($row = $resultSet->fetchObject()) {
                    $datosDepartamentos['T02_CodDepartamento'] = $row->T02_CodDepartamento; 
                    $datosDepartamentos['T02_DescDepartamento'] = $row->T02_DescDepartamento;
                    $datosDepartamentos['T02_FechaCreacionDepartamento'] = $row->T02_FechaCreacionDepartamento;
                    $datosDepartamentos['T02_VolumenDeNegocio'] = $row->T02_VolumenDeNegocio;
                    $datosDepartamentos['T02_FechaBajaDepartamento'] = $row->T02_FechaBajaDepartamento;                                    
                    //Los añadimos al array creado anteriormente
                    array_push($departamentos, $datosDepartamentos);                    
                }
            }                      
            return $departamentos;
    }

    /**
     * Función buscaDepartamentoPorCodigo
     * 
     * Última revisión 05/02/2019
     * Se extraen todos los datos del departamento correspondiente
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public static function buscaDepartamentosPorCodigo($nombre) {
        $departamentos = [];
        //Realizamos la consulta a la base de datos
        $sql = "SELECT * FROM T02_Departamentos where T02_CodDepartamento like (?)";

        //Ejecutamos la consulta
        $resultSet = DBPDO::ejecutaConsulta($sql, [$nombre]);
        //Guardamos los datos
        if ($resultSet->rowCount() != 0) {
            while ($row = $resultSet->fetchObject()) {
                $datosDepartamentos['T02_CodDepartamento'] = $row->T02_CodDepartamento;
                $datosDepartamentos['T02_DescDepartamento'] = $row->T02_DescDepartamento;
                $datosDepartamentos['T02_FechaCreacionDepartamento'] = $row->T02_FechaCreacionDepartamento;
                $datosDepartamentos['T02_VolumenDeNegocio'] = $row->T02_VolumenDeNegocio;
                $datosDepartamentos['T02_FechaBajaDepartamento'] = $row->T02_FechaBajaDepartamento;
                //Los añadimos al array creado anteriormente
                array_push($departamentos, $datosDepartamentos);
            }
        }
        //Devolvemos ese array con los datos necesarios
        return $departamentos;
    }

    /**
     * Función altaDepartamento
     * 
     * Última revisión 03/02/2019
     * Inserta un registro en la DB correspondiente a un nuevo departamento
     * 
     * @author Laura Fernandez
     * @param
     * @param 
     * @param 
     * @return 
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio) {
        $departamento = false;
        $sql = "INSERT INTO T02_Departamentos(T02_CodDepartamento,T02_DescDepartamento,T02_VolumenDeNegocio) VALUES (?,?,?)";
        $sql = DBPDO::ejecutaConsulta($sql, [$codDepartamento, $descDepartamento, $volumenNegocio]);
        if ($sql->rowCount() != 0) {
            $departamento = true;
        }
        //Devuelve si se ha insertado correctamente
        return $departamento;
    }

    /**
     * Función bajaFisicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Se borra el registro en la DB borrando a su vez el departamento
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public static function bajaFisicaDepartamento($CodDepartamento) {
        $borrado = false;
        $sql = "DELETE FROM T02_Departamentos WHERE T02_CodDepartamento=?";
        $sql = DBPDO::ejecutaConsulta($sql, [$CodDepartamento]);
        if ($sql->rowCount() != 0) {
            $borrado = true;
        }
        return $borrado;
    }

    /**
     * Función bajaLogicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Se actualizan los campos en la DB actualizando a su vez los datos del departamento
     * 
     * @author Laura Fernandez
     * @param 
     * @param 
     * @return 
     */
    public static function bajaLogicaDepartamento($CodDepartamento, $FechaBajaDepartamento) {
        $bajaLogica = false;
        $sql = "update T02_Departamentos set T02_FechaBajaDepartamento=? where T02_CodDepartamento=?";
        $sql = DBPDO::ejecutaConsulta($sql, [$FechaBajaDepartamento, $CodDepartamento]);
        if ($sql->rowCount() != 0) {
            $bajaLogica = true;
        }
        return $bajaLogica;
    }

    /**
     * Función modificarDepartamento
     * 
     * Última revisión 04/02/2019
     * Se actualizan los registros en la DB actualizando a su vez los datos del departamento
     * 
     * @author Laura Fernandez
     * @param 
     * @param 
     * @param 
     * @return 
     */
    public static function modificaDepartamento($CodDepartamento, $descDepartamento, $volumenNegocio) {
        $departamento = false;
        $sql = "UPDATE T02_Departamentos SET T02_DescDepartamento=?,T02_VolumenDeNegocio=? WHERE T02_CodDepartamento=?";
        $consulta = DBPDO::ejecutaConsulta($sql, [$descDepartamento, $volumenNegocio, $CodDepartamento]);
        if ($consulta->rowCount() != 0) {
            $departamento = true;
        }
        return $departamento;
    }

    /**
     * Función rehabilitarDepartamento
     * 
     * Última revisión 05/02/2019
     * Se actualizan los campos en la DB actualizando a su vez los datos del departamento
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public static function rehabilitaDepartamento($CodDepartamento) {
        $altaLogica = false;
        $sql = "update T02_Departamentos set T02_FechaBajaDepartamento='0001-01-01' where T02_CodDepartamento=?";
        $sql = DBPDO::ejecutaConsulta($sql, [$CodDepartamento]);
        if ($sql->rowCount() != 0) {
            $altaLogica = true;
        }
        return $altaLogica;
    }

    /**
     * Función validaCodNoExiste
     * 
     * Última revisión 04/02/2019
     * Comprueba en la DB si existen los datos para el departamento correspondiente
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public static function validaCodNoExiste($CodDepartamento) {
        $existe = false;
        $sql = "SELECT * FROM T02_Departamentos WHERE T02_CodDepartamento=?";
        $sql = DBPDO::ejecutaConsulta($sql, [$CodDepartamento]);
        if ($sql->rowCount() != 0) {
            $existe = true;
        }
        return $existe;
    }
    
    /**
     * Función contarDepartamentoPorDescripcion
     * 
     * Función para contar departamentos por descripción
     * 
     * @function contarDepartamentoPorDescripcion();        
     * @author Christian Muñiz de la Huerga
     * @version 1.0
     * @since 2019-01-15
     * @param $nombre descripcion que hemos buscado en el input de los departamentos
     * @param $opcionesBusqueda opciones de busqueda que hemos elegido 
     * @return $numRegistros esta funcion devuelve un numero de departamentos
     */

    public static function contarDepartamentoPorDescripcion($nombre,$opcionesBusqueda){
            if (isset($_REQUEST["opcionesBusqueda"])) {
                if ($_REQUEST['opcionesBusqueda'] == "Baja") {
                    $query = " and T02_FechaBajaDepartamento<>'0001-01-01'";
                } else {
                    if ($_REQUEST['opcionesBusqueda'] == "Alta") {
                        $query = " and T02_FechaBajaDepartamento='0001-01-01'";
                    }
                }
            }
             $sql = "SELECT * FROM T02_Departamentos where T02_DescDepartamento like (?)".$query;
             $resultSet = DBPDO::ejecutaConsulta($sql, ["%$nombre%"]);
             $numero=$resultSet->rowCount();
             return $numero;
        }
        
         public static function importarDepartamentos($fichero) {
        $ok = true;
        $fechaHoy = date('Ymd');
        foreach ($fichero as $departamento) {
            $codigo = $departamento->T02_CodDepartamento;
            $descripcion = $departamento->T02_DescDepartamento;
            $fechaCreacion = $departamento->T02_FechaCreacionDepartamento;
            $volumenNegocio = $departamento->T02_VolumenDeNegocio;
            $fechaBaja = $departamento->T02_FechaBajaDepartamento;
            if (self::validaCodNoExiste($codigo)) { 
                $ok = false;
            } else {
                if ($fechaBaja . length > 0) {
                    $consulta = "insert into T02_Departamentos values (?,?,?,?,?)";
                    $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codigo, $descripcion, $fechaCreacion, $volumenNegocio, $fechaBaja]); 
                } else {
                    $consulta = "insert into T02_Departamentos (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) values (?,?,?,?)";
                    $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codigo, $descripcion, $fechaCreacion, $volumenNegocio]); 
                }
            }
        }
        return $ok;
    }
        
}

?>