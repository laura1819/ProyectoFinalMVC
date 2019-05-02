<?php

/**
 * Fichero cCambiarPassword.php
 * Este fichero permite cambiar la contraseña de una cuenta
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
error_reporting(E_ALL);
        ini_set('display_errors', '0');
$entradaOK = true;
//Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
$aFormulario = ['pass1' => null, //Almacena el valor del pass1 dentro de una lista cuando éste sea correcto.
    'pass2' => null, //Almacena el valor del pass2 dentro de una lista cuando éste sea correcto.
    'pass3' => null]; //Almacena el valor del pass3 dentro de una lista cuando éste sea correcto.
//Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
$aErrores = ['pass1' => null, //Guarda posibles errores en el campo pass1.
    'pass2' => null, //Guarda posibles errores en el campo pass2.
    'pass3' => null]; //Guarda posibles errores en el campo pass3.

$passVieja = $_SESSION['usuario']->getPassword();
$usuario = $_SESSION['usuario'];
if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['pagina'] = 'inicio';
    header("Location: index.php");
} else {
    if (isset($_REQUEST['Confirmar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
        $aErrores[pass1] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass1'], 10, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        $aErrores[pass2] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass2'], 10, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        $aErrores[pass3] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass3'], 10, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
        foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
            if ($error != null) {
                $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                $_REQUEST[$campo] = "";
            }
        }
        if ($passVieja != $_REQUEST['pass1']) { // mostrar los errores si no coinciden
            $aErrores[pass1] = $aErrores[pass1] . ' La contraseña no coincide con la base de datos';
            $entradaOK = false;
        }
        if ($_REQUEST['pass2'] != $_REQUEST['pass3']) {
            $aErrores[pass3] = $aErrores[pass3] . ' Las contraseñas no son iguales';
            $entradaOK = false;
        }
        if ($_REQUEST['pass1'] == $_REQUEST['pass3']) {
            $aErrores[pass1] = $aErrores[pass1] . ' La contraseña nueva es igual a la anterior';
            $entradaOK = false;
        }
    }
    if (isset($_REQUEST['Confirmar']) && $entradaOK == true) {  // si la entrada es buena
        $usuario = $usuario->modificarUsuario($_REQUEST['pass2'], null, null); //llamamos al modificarUsuariole pasamos la contraseña tambien recibe deesc y perfil en este caso no hace falta
        $_SESSION['usuario'] = $usuario; // volvemos al inicio
        $_SESSION['pagina'] = 'inicio';
        header("Location: index.php");
    } else { // y si no nos mantenemos en la pagina en la que estamos
        $_SESSION['pagina'] = 'cambiarPassword'; 
        require_once $vistas["layout"];
    }
}
?>