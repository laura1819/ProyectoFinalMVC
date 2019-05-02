<?php

/**
 * Fichero configuracion.php
 * Este fichero guarda las variables que serán utilizadas en el programa
 * @author Laura Fernandez
 * @modifiedDate 15/04/2019
 * @version 1.5
 */


// configuracion de la base de datos
require_once 'config/configuracionDB.php';
// configuracion de validacion de formularios
require_once 'core/validacionFormularios.php';
// clases de la aplicacion
require_once 'model/Usuario.php'; 



$controladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php',
    'registroUsuario' => 'controller/cRegistro.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'cambiarPassword' => 'controller/cCambiarPassword.php',
    'wip' => 'controller/cWip.php',
    'errores' => 'controller/cErrores.php',
];

$vistas = [
    'layout' => 'view/layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php',
    'registroUsuario' => 'view/vRegistro.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'cambiarPassword' => 'view/vCambiarPassword.php',
    'wip' => 'view/vWip.php',
    'errores' => 'view/vErrores.php',
];
?>