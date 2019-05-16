<?php
    
   
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $fechaActual=strftime("%Y-%m-%d");

    $codigo=$_SESSION['codigo'];
    $departamento=Departamento::buscaDepartamentosPorCodigo($codigo);
    
    foreach($departamento as $row){
         $codigoDep=$row->getCodDepartamento();
         $DescDepartamento=$row->getDescDepartamento();
         $VolumenNegocio=$row->getVolumenDeNegocio();
    }
       

    $entradaOK = true;

    //Array del formulario
    $aFormulario = [        
        DescDepartamento => null,
        VolumenNegocio => null,
        FechaBaja => null
    ];


    $aErrores = [
        DescDepartamento => null,
        VolumenNegocio => null,
        FechaBaja => null
    ];

 
    if (isset($_REQUEST['Cancelar'])) {
        $_SESSION['pagina'] = 'mtoDepartamentos'; 
        header("Location: index.php"); 
        exit;
    }  

    
   
    if (isset($_REQUEST['Aceptar'])) {
                
        $aErrores[FechaBaja] = validacionFormularios::validarFecha($_REQUEST['fechaBaja'], 1);

        foreach ($aErrores as $campo => $error) {
            if ($error != null) {
                $entradaOK = false;
                $_POST[$campo] = "";
            }
        }
    }

 
    if (isset($_REQUEST['Aceptar']) && $entradaOK) {

        $aFormulario[DescDepartamento] = $_REQUEST['DescDepartamento']; 
        $aFormulario[VolumenNegocio] = $_REQUEST['VolumenNegocio']; 
        $aFormulario[FechaBaja] = $_REQUEST['fechaBaja']; 
        Departamento::bajaLogicaDepartamento($codigoDep,$aFormulario[FechaBaja]);

        $_SESSION['pagina'] = 'mtoDepartamentos';
            header("Location: index.php");  
    }else{
         $_SESSION['pagina'] = 'bajaDepartamento';
    require_once $vistas["layout"];
    }
    
   

?>
