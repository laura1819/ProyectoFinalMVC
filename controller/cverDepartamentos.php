<?php

  
   
    $codigo=$_SESSION['codigo'];
    $departamento=Departamento::buscaDepartamentosPorCodigo($codigo);
    
    foreach($departamento as $row){
         $codigoDep=$row->getCodDepartamento();
         $DescDepartamento=$row->getDescDepartamento();
         $VolumenNegocio=$row->getVolumenDeNegocio();
         $fechaBaja=$row->getFechaBajaDepartamento();
    }
          error_reporting(E_ALL);
ini_set('display_errors', '1');
   
    if (isset($_REQUEST['Aceptar'])) {
        $_SESSION['pagina'] = 'mtoDepartamentos'; 
        header("Location: index.php"); 
        exit;
    }else {
    $_SESSION['pagina'] = 'verDepartamento';
    require_once $vistas["layout"];
    }    

?>
