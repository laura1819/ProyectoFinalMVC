<?php

/**
 * Fichero cMiCuenta.php
 * Este fichero permite controlar la edición del perfil
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
error_reporting(E_ALL);
        ini_set('display_errors', '0');
$entradaOk = true;
//Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
$aFormulario = ['descripcion' => null]; //Almacena el valor de la descripción dentro de una lista cuando ésta sea correcto.
//Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
$aErrores = ['descripcion' => null]; //Guarda posibles errores en el campo descripción.
if (isset($_REQUEST['Cancelar'])) { 
    $_SESSION['pagina'] = 'inicio';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Eliminar'])) {
    $_SESSION['pagina'] = 'borrarCuenta';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Cambiar'])) {
    $_SESSION['pagina'] = 'cambiarPassword';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Confirmar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
    $aErrores[descripcion] = validacionFormularios::comprobarAlfanumerico($_REQUEST['descripcion'], 255, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
    foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
        if ($error != null) { 
            $entradaOk = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
            $_REQUEST[$campo] = "";
        }
    }
}
if (isset($_REQUEST['Confirmar']) && $entradaOk == true) { // si pulsamos confirmar y entrada ok
    $aFormulario[descripcion] = $_REQUEST['descripcion'];
    $usuario = $_SESSION['usuario'];
    if ($aFormulario[descripcion] != $_SESSION['usuario']->getDescUsuario()) { // si la descripcion que vamos a meter es distinta
        $usuario = $usuario->modificarUsuario(null, $aFormulario[descripcion], null); // llamamos a modificar usuario y le pasamos la descriopcion los demas parametros a null
        $_SESSION['usuario'] = $usuario;
    }
    $_SESSION['pagina'] = 'inicio'; 
    header("Location: index.php");
} else {
    $_SESSION['pagina'] = 'miCuenta';
    require_once $vistas["layout"];
}
?>