<?php

/**
 * Fichero DBPDO.php
 * 
 * Esta clase permite conectarse con la base de datos
 * 
 * @package model
 * @author Laura Fernandez
 * @modifiedDate 15/04/2019
 * @version 1.5
 */
/**
 * Class DBPDO
 * 
 * Esta clase permite conectarse con la base de datos
 */


class DBPDO {
    
    /**
     * Función ejecutaConsulta
     * 
     * Función para ejecutar consultas contra la base de datos
     * 
     * @function ejecutaConsulta();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $sentenciaSQL sentencia en SQL.
     * @param $parametros parámetros del SQL.
     * @return $consulta resultado.
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        try {
            $miDB = new PDO(IPDB, USUARIO, PASS);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exc) {
            
        setlocale(LC_TIME, 'es_ES.UTF-8');
        date_default_timezone_set('Europe/Madrid');
        $fecha = date('d-m-Y, H:i:s');
        $archivo = 'tmp/errores.txt';
        $file = fopen($archivo, 'archivo');
        fwrite($file, "Fecha del error: " . $fecha . 
                " Codigo : " . $exc->getCode() . 
                " Mensaje : " . $exc->getMessage() .
                " Fichero : " . $exc->getFile() .
                " Linea : " . $exc->getLine() . "\r\n"
                );       
                                
        UsuarioPDO::redirige();    
        //  $consulta = null; //Destruimos la consulta.
        // echo $exc->getMessage();               
            
        } finally {
            unset($miDB);
        }
        return $consulta;
    }
}

?>


