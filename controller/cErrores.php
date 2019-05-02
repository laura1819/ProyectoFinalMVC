<?php

/**
 * Fichero cMiCuenta.php
 * Este fichero permite controlar la edición del perfil
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */


if (isset($_REQUEST['Cancelar'])) { 
    unset($_SESSION['usuario']);
    session_destroy(); // destruimos la sesion y vamos al index sin usuario en la session
    header("Location: index.php");
    exit;
}else {
    $_SESSION['pagina'] = 'errores';
    require_once $vistas["layout"];
}
?>