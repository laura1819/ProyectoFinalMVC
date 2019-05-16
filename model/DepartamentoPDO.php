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
    public static function buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda) {
        $departamentos = []; // declaramos y inicializamos la variable

        $sql = "SELECT * FROM T02_Departamentos where T02_DescDepartamento like (?)"; // contruimos la consulta sql
        //Según qué opción de búsqueda quieras, se introduce una consulta u otra
        if ($opcionesBusqueda == 'Baja') { // si le damos a los que estan de baja
            $sql = "SELECT * FROM T02_Departamentos where T02_DescDepartamento like (?) AND T02_FechaBajaDepartamento<>'0001-01-01'"; // hacemos la siguiente consulta a la base de datos para saberlo 
        }
        if ($opcionesBusqueda == 'Alta') { // si le damos a los que estan de alta 
            $sql = "SELECT * FROM T02_Departamentos where T02_DescDepartamento like (?) AND T02_FechaBajaDepartamento='0001-01-01'"; // hacemos la siguiente consulta a la base de datos para saberlo
        }

        $resultSet = DBPDO::ejecutaConsulta($sql, ["%$nombre%"]); // ejecutamos la consulta
        //Guardamos los datos
        if ($resultSet->rowCount() != 0) {  // guardamos los datos 
            while ($row = $resultSet->fetchObject()) { // realizamos un bucle con los datos de la base de datos
                $datosDepartamentos['T02_CodDepartamento'] = $row->T02_CodDepartamento;  // el codigo de departamento
                $datosDepartamentos['T02_DescDepartamento'] = $row->T02_DescDepartamento; // con la descripcion del departamento
                $datosDepartamentos['T02_FechaCreacionDepartamento'] = $row->T02_FechaCreacionDepartamento; // con la fecha de creacion 
                $datosDepartamentos['T02_VolumenDeNegocio'] = $row->T02_VolumenDeNegocio; // con el volumen de negocio
                $datosDepartamentos['T02_FechaBajaDepartamento'] = $row->T02_FechaBajaDepartamento; // con la fecha de baja del departamento                                    

                array_push($departamentos, $datosDepartamentos); // los añadimos al array  con ARRAY_PUSH
            }
        }

        return $departamentos; // devolvemos el array con los datos necesarios
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
    public static function validaCodNoExiste() {
        $existe = false;
        $sql = "SELECT * FROM T02_Departamentos WHERE T02_CodDepartamento=?";
        $sql = DBPDO::ejecutaConsulta($sql, [$CodDepartamento]);
        if ($sql->rowCount() != 0) {
            $existe = true;
        }
        return $existe;
    }

    

}

?>