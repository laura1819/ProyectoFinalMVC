<?php

/**
 * Fichero cLogin.php
 * Este fichero permite controlar el login de la aplicación
 * @author Laura Fernandez
 * @modifiedDate 15/04/2019
 * @version 1.5
 */

$entradaOk = true;
$aFormulario = ['usuario' => null,
    'pass' => null];
$aErrores = ['usuario' => null,
    'pass' => null]; //Guarda posibles errores.
if (isset($_REQUEST['Salir'])) {
    header("Location: ../indexProyectoDWES.php");
    exit;
}
if (isset($_REQUEST['Registrarse'])) {
    $_SESSION['pagina'] = 'registroUsuario';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Acceder'])) {
    $aErrores[usuario] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 15, 3, 1);
    $aErrores[pass] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'], 15, 3, 1);
    foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
        if ($error != null) {
            $entradaOk = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
            $_REQUEST[$campo] = "";
        }
    }
}
if (isset($_REQUEST['Acceder']) && $entradaOk) { // si la entrada es ok 
    $aFormulario[usuario] = $_REQUEST['usuario']; // guardamos los campos
    $aFormulario[pass] = $_REQUEST['pass'];
    $usuario = Usuario::validarUsuario($aFormulario[usuario], $aFormulario[pass]); // llamamos al metodo valdiar usuario
    if (is_null($usuario)) {  // si es null
        $aErrores[pass] = $aErrores[pass] . " Usuario o contraseña incorrectos"; // podemos un mensade de que es erroneo
    } else {  // si esta bien 
        $_SESSION['usuario'] = $usuario; // guardamos el usuario y las visitas
        $_SESSION['pagina'] = 'inicio';
        $_SESSION['visitas'] = $usuario->registrarUltimaConexion(); // este metodo nos devuelve un mensaje depende de si es la primera visita o la ultima
        header("Location: index.php"); // y vamops al index con el usuario y la pagina de inicio
        exit;
    }
} // y si no seguimos en la pagina del login con el layout pertinente
$_SESSION['pagina'] = 'login'; 
require_once $vistas["layout"];
?>