<?php

/**
 * Fichero UsuarioPDO.php
 * 
 * Esta clase permite crear objetos usuario y modificarlos
 * 
 * @package model
 * @modifiedDate 28/01/2019
 * @version 1.5
 */

require_once "DBPDO.php";
require_once "UsuarioDB.php";
/**
 * Class UsuarioPDO
 * 
 * Esta clase permite interactuar con los usuarios de la BD
 * 
 * @author Laura Fernandez
 */
class UsuarioPDO implements UsuarioDB {
    
    /**
     * Función validarUsuario
     * 
     * Función para validar si el usuario introducido es correcto
     * 
     * @function validarUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @param $password Contraseña.
     * @return $arrayUsuario con los datos de usuario.
     */
    public static function validarUsuario($codUsuario, $password) {
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=SHA2(?,256)"; //Creacion de la consulta.
        $arrayUsuario = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]); //Ejecutamos la consulta.
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $resFetch = $resConsulta->fetchObject();
            //Metemos los resultados de la consulta en el array
            $arrayUsuario['T01_CodUsuario'] = $resFetch->T01_CodUsuario;
            $arrayUsuario['T01_Password'] = $resFetch->T01_Password;
            $arrayUsuario['T01_DescUsuario'] = $resFetch->T01_DescUsuario;
            $arrayUsuario['T01_NumAccesos'] = $resFetch->T01_NumAccesos;
            $arrayUsuario['T01_FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
            $arrayUsuario['T01_Perfil'] = $resFetch->T01_Perfil;
        }
        return $arrayUsuario;
    }

    
    /**
     * Función registrarUltimaConexion
     * 
     * Función para registrar la última conexión
     * 
     * @function registrarUltimaConexion();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @return $aFechaAccesos con la última conexión.
     */
    public function registrarUltimaConexion($codUsuario) {
        $aFechaAccesos = [];
        $fecha = new DateTime();
        $query = "select * from T01_Usuarios where T01_CodUsuario=?";
        $resQuery = DBPDO::ejecutaConsulta($query, [$codUsuario]); //Ejecutamos la consulta.
        if ($resQuery->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $resFetch = $resQuery->fetchObject();
            //Metemos los resultados de la consulta en el array
            $aFechaAccesos['T01_NumAccesos'] = $resFetch->T01_NumAccesos;
            $aFechaAccesos['T01_FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
            $aFechaAccesos['T01_DescUsuario'] = $resFetch->T01_DescUsuario;
        }
        $consulta = "update T01_Usuarios set T01_NumAccesos=T01_NumAccesos+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$fecha->getTimestamp(), $codUsuario]); //Ejecutamos la consulta.
        return $aFechaAccesos;
    }
    
    /**
     * Función altaUsuario
     * 
     * Función para dar de alta a un usuario
     * 
     * @function altaUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-01-15
     * @param $codUsuario Código de usuario.
     * @param $password Contraseña.
     * @param $descripcion Descripción del usuario.
     * @return $arrayUsuario con los datos de usuario.
     */
    public static function altaUsuario($codUsuario, $password, $descripcion) {
        $arrayUsuario = [];
        $fecha = new DateTime();
        $consulta = "insert into T01_Usuarios values (?,SHA2(?,256),?,0,?,'Usuario')";
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password, $descripcion, $fecha->getTimestamp()]); //Ejecutamos la consulta.
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $arrayUsuario['T01_CodUsuario'] = $codUsuario;
            $arrayUsuario['T01_Password'] = $password;
            $arrayUsuario['T01_DescUsuario'] = $descripcion;
            $arrayUsuario['T01_NumAccesos'] = 1;
            $arrayUsuario['T01_FechaHoraUltimaConexion'] = $fecha->getTimestamp();
            $arrayUsuario['T01_Perfil'] = 'Usuario';
        }
        return $arrayUsuario;
    }
    /**
     * Función validarCodNoExiste
     * 
     * Función para validar si un código de usuario existe
     * 
     * @function validarCodNoExiste();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @return $existe boolean.
     */
     public static function validarCodNoExiste($codUsuario) {
        $existe = false;
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=?"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); //Ejecutamos la consulta.
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $existe = true;
        }
        return $existe;
    }
    /**
     * Función modificarCuenta
     * 
     * Función para modificar a un usuario
     * 
     * @function modificarCuenta();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @param $password Contraseña.
     * @param $descripcion Descripción del usuario.
     * @param $perfil Perfil del usuario.
     * @return $arrayUsuario con los datos de usuario.
     */
     public function modificarUsuario($codUsuario, $password, $descripcion) {
        $arrayUsuario = [];
        if ($descripcion == null) {
            $consulta = "update T01_Usuarios set T01_Password=SHA2(?,256) where T01_CodUsuario=?";
            $resConsulta = DBPDO::ejecutaConsulta($consulta, [$password, $codUsuario]); //Ejecutamos la consulta.
        } else {
            $consulta = "update T01_Usuarios set T01_DescUsuario=? where T01_CodUsuario=?";
            $resConsulta = DBPDO::ejecutaConsulta($consulta, [$descripcion, $codUsuario]); //Ejecutamos la consulta.
        }
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $consulta = "select * from T01_Usuarios where T01_CodUsuario=?"; //Creacion de la consulta.
            $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); //Ejecutamos la consulta.
            if ($resConsulta->rowCount() == 1) {
                $resFetch = $resConsulta->fetchObject();
                //Metemos los resultados de la consulta en el array
                $arrayUsuario['T01_CodUsuario'] = $resFetch->T01_CodUsuario;
                $arrayUsuario['T01_Password'] = $password;
                $arrayUsuario['T01_DescUsuario'] = $resFetch->T01_DescUsuario;
                $arrayUsuario['T01_NumAccesos'] = $resFetch->T01_NumAccesos;
                $arrayUsuario['T01_FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
                $arrayUsuario['T01_Perfil'] = $resFetch->T01_Perfil;
            }
        }
        return $arrayUsuario;
    }
    
    /**
     * Función borrarUsuario
     * 
     * Función para borrar un usuario
     * 
     * @function borrarUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @return $borrado boolean.
     */
    public function borrarUsuario($codUsuario) {
        $borrado = false;
        $consulta = "delete from T01_Usuarios where T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); //Ejecutamos la consulta.
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $borrado = true;
        }
        return $borrado;
    }
    
     public function redirige(){
         $_SESSION['pagina'] = 'errores'; // vamos a la pagina mi cuenta
         header("Location: index.php");
        
    }
     
}

?>