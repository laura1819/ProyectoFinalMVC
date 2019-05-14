<?php

	 /**
    * @author Laura Fernandez
    */
	
    if (isset($_REQUEST['Volver'])) {        
        $_SESSION['pagina'] = 'inicio'; 
        header("Location: index.php"); 
        exit;
    }    
        
    if(isset($_REQUEST['Añadir'])){
        $_SESSION['pagina'] = 'altaDepartamentos'; 
        header("Location: index.php"); 
        exit;
    }
    
    $departamentos = Departamento::buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda);
    
    for($i=0;$i<count($departamentos);$i++){        
        if(isset($_REQUEST['editar'.$i])){
            $_SESSION['codigo']=$departamentos[$i]->getCodDepartamento();            
            $_SESSION['pagina'] = 'editarDepartamentos';                  
            header("Location: index.php"); 
            exit;
        }
    }
    
    for($i=0;$i<count($departamentos);$i++){        
        if(isset($_REQUEST['ver'.$i])){
            $_SESSION['codigo']=$departamentos[$i]->getCodDepartamento();            
            $_SESSION['pagina'] = 'verDepartamento';                  
            header("Location: index.php"); 
            exit;
        }
    }
    
    for($i=0;$i<count($departamentos);$i++){        
        if(isset($_REQUEST['borrar'.$i])){
            $_SESSION['codigo']=$departamentos[$i]->getCodDepartamento();            
            $_SESSION['pagina'] = 'borrarDepartamento';                  
            header("Location: index.php"); 
            exit;
        }
    }    
    
    for($i=0;$i<count($departamentos);$i++){        
        if(isset($_REQUEST['baja'.$i])){
            $_SESSION['codigo']=$departamentos[$i]->getCodDepartamento();            
            $_SESSION['pagina'] = 'bajaDepartamento';                  
            header("Location: index.php"); 
            exit;
        }
    }    
    
    for($i=0;$i<count($departamentos);$i++){        
        if(isset($_REQUEST['rehabilitar'.$i])){
            $_SESSION['codigo']=$departamentos[$i]->getCodDepartamento();            
            $_SESSION['pagina'] = 'rehabilitarDepartamento';                  
            header("Location: index.php"); 
            exit;
        }
    }    

    $_SESSION['pagina'] = 'mtoDepartamentos';
    require_once $vistas['layout'];
   
    if (isset($_REQUEST['Buscar'])) {
        $opcionesBusqueda = $_REQUEST['opcionesBusqueda'];
        $nombre = $_REQUEST['nombre'];
        $departamentos = Departamento::buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda);
    }            
                

?>