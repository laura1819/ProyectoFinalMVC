<?php

/**
 * Fichero cInicio.php
 * Este fichero permite controlar la página de inicio del programa
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */

/**
 * @author Laura Fernandez
 * @modifiedDate 15/04/2019
 * Fecha ultima revision 16-01-2019
 */

require_once 'model/Rest.php';
$_SESSION['estacion'] = Rest::datosDelTiempo();

if (isset($_REQUEST['Salir'])) { // si hemos pulsado en salir 
    unset($_SESSION['usuario']);
    session_destroy(); // destruimos la sesion y vamos al index sin usuario en la session
    header("Location: index.php");
    exit;
}


if (isset($_REQUEST['edPerfil'])) { // si pulsamos editar perfil
    $_SESSION['pagina'] = 'miCuenta'; // vamos a la pagina mi cuenta
    header("Location: index.php");
    exit;
}

if (isset($_REQUEST['borrarCuenta'])) {  // si pulsamos en borrar cuenta
    $_SESSION['pagina'] = 'borrarCuenta'; // vamos a la pagina borrar cuenta
    header("Location: index.php"); 
    exit;
}
if (isset($_REQUEST['cambiarPass'])) { // si pulsamos cambiar pass
    $_SESSION['pagina'] = 'cambiarPassword'; // vamos a la pagina cambiar pass
    header("Location: index.php");
    exit;
}


if (isset($_REQUEST['wip'])) { // si pulsamos editar perfil
    $_SESSION['pagina'] = 'wip'; // vamos a la pagina mi cuenta
    header("Location: index.php");
    exit;
}

//if (isset($_REQUEST['wip'])) { 
  //  $_SESSION['pagina'] = 'wip'; 
  //  header("Location: index.php");
 //   exit;
//}




if (!isset($_SESSION['usuario'])) { // si en la sesion no tenemos usuario
    header("Location: index.php"); // vamos al index sin el usuario
} else {
    require_once $vistas["layout"];
}
?>