<?php

/**
 * Fichero cMiCuenta.php
 * Este fichero permite controlar la edición del perfil
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */


//$libros = Rest::libros();


//echo  " <pre> " ;
            //        print_r ($libros);
    //                echo  " </pre> " ;
                         
if(isset($_REQUEST['Buscar'])){    
    $libros = Rest::libros($_REQUEST['autor']);    
}

if (isset($_REQUEST['Cancelar'])) { 
    $_SESSION['pagina'] = 'inicio';
    header("Location: index.php");
    exit;
}else {
    $_SESSION['pagina'] = 'rest';
    require_once $vistas["layout"];
}
?>