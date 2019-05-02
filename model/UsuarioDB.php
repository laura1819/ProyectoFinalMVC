<?php
error_reporting(E_ALL);
        ini_set('display_errors', '0');
/**
 * Fichero UsuarioDB.php
 * 
 * Esta clase permite crear objetos usuario y modificarlos
 * 
 * @package model
 * @author Laura Fernandez
 * @modifiedDate 15/04/2019
 * @version 1.5
 */
/**
 * Interface UsuarioDB
 * 
 * Esta clase permite crear objetos usuario y modificarlos
 */

interface UsuarioDB {
    
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
     */
    public static function validarUsuario($codUsuario, $password);
    
    
   
}
