<?php

/**
 * Fichero cBorrarCuenta.php
 * Este fichero permite borrar una cuenta
 * @author Laura Fernandez
 * @modifiedDate 17/04/2019
 * @version 1.5
 */

error_reporting(E_ALL);
        ini_set('display_errors', '0');
        
if (isset($_REQUEST['Cancelar'])) { // si hemos pulsado cancelar
    $_SESSION['pagina'] = 'inicio';     // metemos la pagina de inicio en session
    header("Location: index.php");      // y nos vamos al index para que nos lleve al inicio
} else {
    if (isset($_REQUEST['Confirmar'])) { // si hemos pulsado en confirmar
        $usuario = $_SESSION['usuario']; //usuario en la sesion
        if ($usuario->borrarUsuario()) { //llamamos al metodo borrar usuario
            unset($_SESSION['usuario']);   
            session_destroy();              // destruimos la sesion
            $_SESSION['pagina'] = 'login';   // pasamos la pagina del login
            header("Location: index.php");   // nos vamos al index con la pagina login 
        }
    } else {
        $_SESSION['pagina'] = 'borrarCuenta';  // si no nos mantenemos en la pagina
        require_once $vistas["layout"];  // con el layout cargado
    }
}
?>