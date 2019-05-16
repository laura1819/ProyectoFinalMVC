<?php



    $codigo=$_SESSION['codigo'];
    $departamento=Departamento::buscaDepartamentosPorCodigo($codigo);
    
    foreach($departamento as $row){
         $codigoDep=$row->getCodDepartamento();
         $DescDepartamento=$row->getDescDepartamento();
         $VolumenNegocio=$row->getVolumenDeNegocio();
    }
        
    if (isset($_REQUEST['Cancelar'])) {        
        $_SESSION['pagina'] = 'mtoDepartamentos'; 
        header("Location: index.php"); 
        exit;
    }
  
   
 
    if (isset($_REQUEST['Aceptar'])) {
        if(Departamento::bajaFisicaDepartamento($codigoDep)==false){
             echo ("<script>window.alert('No se ha podido eliminar el departamento');</script>");
        }else{            
            $_SESSION['pagina'] = 'mtoDepartamentos'; 
            header("Location: index.php"); 
            exit;
        }
        
    } 
    
      $_SESSION['pagina'] = 'borrarDepartamento';
    require_once $vistas["layout"];

?>
