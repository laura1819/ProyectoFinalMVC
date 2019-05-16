<?php

 
    $codigo=$_SESSION['codigo'];
    $departamento=Departamento::buscaDepartamentosPorCodigo($codigo);
    
    foreach($departamento as $row){
         $codigoDep=$row->getCodDepartamento();
         $DescDepartamento=$row->getDescDepartamento();
         $VolumenNegocio=$row->getVolumenDeNegocio();
    }
       
 
    $entradaOK = true;

    
    $aFormulario = [        
        DescDepartamento => null,
        VolumenNegocio => null
    ];


    $aErrores = [
        DescDepartamento => null,
        VolumenNegocio => null
    ];

 
    if (isset($_REQUEST['Cancelar'])) {
        $_SESSION['pagina'] = 'mtoDepartamentos'; 
        header("Location: index.php"); 
        exit;
    }  
    
 
    if (isset($_REQUEST['Aceptar'])) {
      
        $aErrores[DescDepartamento] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescDepartamento'], 255, 1, 1);
        $aErrores[VolumenNegocio] = validacionFormularios::comprobarFloat($_REQUEST['VolumenNegocio'],1000000,1, 1);

        foreach ($aErrores as $campo => $error) {
            if ($error != null) {
                $entradaOK = false;
                $_POST[$campo] = "";
            }
        }
    }

    //Si la entrada es correcta y hemos pulsado el botón de Aceptar, recogemos la variable nueva, usamos modificarUsuario y volvemos a cargar la página de inicio
    if (isset($_REQUEST['Aceptar']) && $entradaOK) {

        $aFormulario[DescDepartamento] = $_REQUEST['DescDepartamento'];          
        $aFormulario[VolumenNegocio]=$_REQUEST['VolumenNegocio'];
        Departamento::modificaDepartamento($codigoDep,$aFormulario[DescDepartamento],$aFormulario[VolumenNegocio]);

        $_SESSION['pagina'] = 'mtoDepartamentos';
            header("Location: index.php");  
    }
    
    
    require_once $vistas["layout"];

?>
