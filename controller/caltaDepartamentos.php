<?php 
    /**
    * Controlador de alta de departamentos
    * 
    * Controlador de alta de departamentos
    */

    //Si pulso Cancelar, cargo la página de login
    if (isset($_REQUEST['Volver'])) {
        $_SESSION['pagina'] = 'mtoDepartamentos';
        header("Location: index.php");
        exit;
    }

    //Variable para validar la entrada del formulario
    $entradaOK = true;

    //Array del formulario
    $aFormulario = [
        CodDepartamento => null,
        DescDepartamento => null,
        VolumenNegocio => null
    ];

    //Array de errores del formulario
    $aErrores = [
        CodDepartamento => null,
        DescDepartamento => null,
        VolumenNegocio => null
    ];

    //Si pulso Aceptar, validamos la entrada y comprobamos que no existe ningún código igual
    if (isset($_REQUEST['Aceptar'])) {
        $aErrores[CodDepartamento] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 1, 1);
        $aErrores[DescDepartamento] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescDepartamento'], 255, 1, 1);
        $aErrores[VolumenNegocio] = validacionFormularios::comprobarFloat($_REQUEST['VolumenNegocio'],1000000,1, 1);

        if (Departamento::validaCodNoExiste($_REQUEST['CodDepartamento'])) {
            $aErrores[CodDepartamento] = "El código de departamento ya existe, seleccione otro por favor.";
        }

        foreach ($aErrores as $campo => $error) {
            if ($error != null) {
                $entradaOK = false;
                $_REQUEST[$campo] = "";
            }
        }
    }

    //Si pulso Aceptar y la entrada es correcta, recogemos los datos, usamos altaUsuario, cargamos la página de inicio y la sesión del usuario
    if (isset($_REQUEST['Aceptar']) && $entradaOK) {
        
        $aFormulario[CodDepartamento] = $_REQUEST['CodDepartamento'];
        $aFormulario[DescDepartamento] = $_REQUEST['DescDepartamento'];
        $aFormulario[VolumenNegocio] = $_REQUEST['VolumenNegocio'];

        Departamento::altaDepartamento($aFormulario[CodDepartamento], $aFormulario[DescDepartamento],$aFormulario[VolumenNegocio]);                
        $_SESSION['pagina'] = 'mtoDepartamentos';
        header("Location: index.php");
        exit;
    } else {
        //Cargamos la página y el layout
        $_SESSION['pagina'] = 'altaDepartamentos'; 
        require_once $vistas['layout'];
    }
?>