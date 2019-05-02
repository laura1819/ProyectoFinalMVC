<?php

/**
 * Fichero Usuario.php
 * 
 * Esta clase permite crear objetos usuario y modificarlos
 * 
 * @package model
 * @modifiedDate 15/04/2019
 * @version 1.5
 */
error_reporting(E_ALL);
        ini_set('display_errors', '0');
require_once 'UsuarioPDO.php';
/**
 * Class Usuario
 * 
 * Esta clase permite crear usuarios.
 * 
 * @author Laura Fernandez
 */
class Usuario {
    /**
     *
     * @var string $codUsuario código de usuario
     */
    private $codUsuario;
    /**
     *
     * @var string $password contraseña
     */
    private $password;
    /**
     *
     * @var string $descUsuario descripción de usuario
     */
    private $descUsuario;
    /**
     *
     * @var int $numAccesos número de accesos
     */
    private $numAccesos;
    /**
     *
     * @var int $fechaHoraUltimaConexion fecha de última conexión
     */
    private $fechaHoraUltimaConexion;
    /**
     *
     * @var string $perfil perfil de usuario
     */
    private $perfil;
    /**
     *
     * @var array $listaOpinionesUsuario lista de opiniones
     */
    private $listaOpinionesUsuario;
    
    /**
     * Constructor Usuario
     * 
     * Permite crear objetos de la clase Usuario
     * 
     * @function __construct();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @param $password Contraseña.
     * @param $descUsuario Descripción de usuario.
     * @param $numAccesos Número de accesos de usuario.
     * @param $fechaHoraUltimaConexion Fecha última conexión de usuario.
     * @param $perfil Perfil de usuario.
     */
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }
    
    /**
     * Función getCodUsuario
     * 
     * Función para obtener el código de usuario
     * 
     * @function getCodUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Código de usuario.
     */
    function getCodUsuario() {
        return $this->codUsuario;
    }
    
    /**
     * Función getPassword
     * 
     * Función para obtener el pass de usuario
     * 
     * @function getPassword();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Password de usuario.
     */
    function getPassword() {
        return $this->password;
    }
    
    /**
     * Función getDescUsuario
     * 
     * Función para obtener la descripción de usuario
     * 
     * @function getDescUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Descripción de usuario.
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }
    
    /**
     * Función getNumAccesos
     * 
     * Función para obtener los números de accesos
     * 
     * @function getNumAccesos();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Número de accesos.
     */
    function getNumAccesos() {
        return $this->numAccesos;
    }
    
    /**
     * Función getFechaHoraUltimaConexion
     * 
     * Función para obtener la fecha de última conexión
     * 
     * @function getFechaHoraUltimaConexion();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Fecha última conexión.
     */
    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }
    
    /**
     * Función getPerfil
     * 
     * Función para obtener el perfil de un usuario
     * 
     * @function getPerfil();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Perfil del usuario.
     */
    function getPerfil() {
        return $this->perfil;
    }
    
    /**
     * Función getListaOpinionesUsuario
     * 
     * Función para obtener la lista de opiniones de un usuario
     * 
     * @function getListaOpinionesUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @return Lista de opiniones.
     */
    function getListaOpinionesUsuario() {
        return $this->listaOpinionesUsuario;
    }
    
    /**
     * Función setCodUsuario
     * 
     * Función para asignar el código de usuario
     * 
     * @function setCodUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     */
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }
    
    /**
     * Función setPassword
     * 
     * Función para asignar el pass de usuario
     * 
     * @function setPassword();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $password Contraseña de usuario.
     */
    function setPassword($password) {
        $this->password = $password;
    }
    
    /**
     * Función setDescUsuario
     * 
     * Función para asignar la descripción de usuario
     * 
     * @function setDescUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $descUsuario Descripción de usuario.
     */
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }
    
    /**
     * Función setNumAccesos
     * 
     * Función para asignar el número de accesos de usuario
     * 
     * @function setNumAccesos();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $numAccesos Número de accesos.
     */
    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }
    
    /**
     * Función setFechaHoraUltimaConexion
     * 
     * Función para asignar la fecha de última conexión del usuario
     * 
     * @function setFechaHoraUltimaConexion();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $fechaHoraUltimaConexion Fecha de última conexión.
     */
    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }
    
    /**
     * Función setPerfil
     * 
     * Función para asignar el perfil del usuario
     * 
     * @function setPerfil();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $perfil Perfil de usuario.
     */
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
    
    /**
     * Función setListaOpinionesUsuario
     * 
     * Función para asignar la lista de opiniones del usuario
     * 
     * @function setListaOpinionesUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $listaOpinionesUsuario Lista de opiniones de usuario.
     */
    function setListaOpinionesUsuario($listaOpinionesUsuario) {
        $this->listaOpinionesUsuario = $listaOpinionesUsuario;
    }
    
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
     * @return $usuario objeto usuario.
     */
    public static function validarUsuario($codUsuario, $password) {
        $usuario = null;
        $arrayUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        if (!empty($arrayUsuario)) {
            $usuario = new Usuario($codUsuario, $password, $arrayUsuario['T01_DescUsuario'], $arrayUsuario['T01_NumAccesos'], $arrayUsuario['T01_FechaHoraUltimaConexion'], $arrayUsuario['T01_Perfil']);
        }
        return $usuario;
    }
    
    /**
     * Función altaUsuario
     * 
     * Función para dar de alta a un usuario
     * 
     * @function altaUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $codUsuario Código de usuario.
     * @param $password Contraseña.
     * @param $descripcion Descripción del usuario.
     * @return $usuario objeto usuario.
     */
    public static function altaUsuario($codUsuario, $password, $descripcion) {
        $usuario = null;
        $arrayUsuario = UsuarioPDO::altaUsuario($codUsuario, $password, $descripcion);
        if (!empty($arrayUsuario)) {
            $usuario = new Usuario($codUsuario, $password, $descripcion, $arrayUsuario['T01_NumAccesos'], $arrayUsuario['T01_FechaHoraUltimaConexion'], $arrayUsuario['T01_Perfil']);
        }
        return $usuario;
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
     * @return $ultimaConexion con la última conexión.
     */
    
    public function registrarUltimaConexion() {
        setlocale(LC_TIME, 'es_ES.UTF-8'); //Selecciona el idioma. 
        date_default_timezone_set('Europe/Madrid'); //Selecciona la zona horaria.
        $codUsuario = $this->getCodUsuario();
        $aFechaAccesos = UsuarioPDO::registrarUltimaConexion($codUsuario);
        $fecha = date('d-m-Y H:i:s', $aFechaAccesos['T01_FechaHoraUltimaConexion']);
        $numAccesos = $aFechaAccesos['T01_NumAccesos'];
        if ($numAccesos == 0) {
            $ultimaConexion = ' bienvenido por primera vez a la página.';
        } else {
            $ultimaConexion = ' Número de visitas anteriores ' . $numAccesos . ', la última visita fue el ' . $fecha;
        }
        return $ultimaConexion;
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
        $existe = UsuarioPDO::validarCodNoExiste($codUsuario);
        return $existe;
    }
    /**
     * Función modificarUsuario
     * 
     * Función para modificar a un usuario
     * 
     * @function modificarUsuario();        
     * @author Laura Fernandez
     * @version 1.0
     * @since 2019-04-15
     * @param $password Contraseña.
     * @param $descripcion Descripción de usuario.
     * @param $perfil Perfil del usuario.
     * @return $usuario objeto usuario.
     */
    public function modificarUsuario($password, $descripcion, $perfil) {
        $codUsuario = $this->getCodUsuario();
        $usuario = null;
        if ($perfil == null) {
            $aUsuario = UsuarioPDO::modificarUsuario($codUsuario, $password, $descripcion);
        } else {
            $aUsuario = UsuarioPDO::modificarCuenta($codUsuario, $password, $descripcion, $perfil);
        }
        if (!empty($aUsuario)) {
            $usuario = new Usuario($aUsuario['T01_CodUsuario'], $aUsuario['T01_Password'], $aUsuario['T01_DescUsuario'], $aUsuario['T01_NumAccesos'], $aUsuario['T01_FechaHoraUltimaConexion'], $aUsuario['T01_Perfil']);
        }
        return $usuario;
    }
   
    /**
     * Función borrarUsuario
     * 
     * Función para borrar un usuario
     * 
     * @function borrarUsuario();        
     * @author Christian Muñiz de la Huerga
     * @version 1.0
     * @since 2019-04-15
     * @return $borrado boolean.
     */
    
    public function borrarUsuario() {
        $codUsuario = $this->getCodUsuario();
        $borrado = UsuarioPDO::borrarUsuario($codUsuario);
        return $borrado;
    }
    
   
    

}

?>