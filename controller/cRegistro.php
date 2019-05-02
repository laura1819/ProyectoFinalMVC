<?php

/**
 * Fichero cRegistro.php
 * Este fichero permite registrar nuevos usuarios
 * @author Laura Fernandez
 * @modifiedDate 16/04/2019
 * @version 1.5
 */
error_reporting(E_ALL);
        ini_set('display_errors', '0');

$entradaOK = true;
//Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
$aFormulario = ['usuario' => null, //Almacena el valor del usuario dentro de una lista cuando éste sea correcto.
    'descripcion' => null, //Almacena el valor de la descripción dentro de una lista cuando ésta sea correcto.
    pass => null]; //Almacena el valor del pass dentro de una lista cuando éste sea correcto.
//Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
$aErrores = ['usuario' => null, //Guarda posibles errores en el campo usuario.
    'descripcion' => null, //Guarda posibles errores en el campo descripción.
    pass => null]; //Guarda posibles errores en el campo pass.
if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['pagina'] = 'login';
    Header("Location: index.php");
} else {
    if (isset($_REQUEST['Registrar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
        $aErrores[usuario] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 20, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        $aErrores[pass] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass'], 20, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        $aErrores[descripcion] = validacionFormularios::comprobarAlfanumerico($_REQUEST['descripcion'], 255, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
            if ($error != null) {
                $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                $_REQUEST[$campo] = "";
            }
        }
        if (Usuario::validarCodNoExiste($_REQUEST['usuario'])) {
            $aErrores[usuario] = "Ya existe ese usuario";
            $entradaOK = false;
        }
    }
    if (isset($_REQUEST['Registrar']) && $entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
        //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
        $aFormulario[usuario] = $_REQUEST['usuario']; //Recoge el valor del campo ya validado.
        $aFormulario[pass] = $_REQUEST['pass']; //Se vuelva en una variable el hash generado con sha256 de la contraseña introducida por el usuario.
        $aFormulario[descripcion] = $_REQUEST['descripcion']; //Recoge el valor del campo ya validado.
        $usuario = Usuario::altaUsuario($aFormulario[usuario], $aFormulario[pass], $aFormulario[descripcion]);
        $_SESSION['visitas'] = $usuario->registrarUltimaConexion(); // llamamos al metodo que nos devuelve un mensaje dependiendo de si 1 visita o mas
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pagina'] = 'inicio';
        Header("Location: index.php");
    } else {
        $_SESSION['pagina'] = 'registroUsuario';
        require_once $vistas["layout"];
    }
}
?>