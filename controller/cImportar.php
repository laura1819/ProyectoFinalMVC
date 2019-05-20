<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['pagina'] = 'mtoDepartamentos';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Aceptar'])) {
    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) { //Carga el archivo XML desde la ruta especificada como parámetro. 
        $fichero = simplexml_load_file($_FILES["archivo"]["tmp_name"]);
        if (!is_null($fichero)) {
            Departamento::importarDepartamentos($fichero);
            $_SESSION['pagina'] = 'mtoDepartamentos';
            header("Location: index.php");
            exit;
        }
    }
}
require_once $vistas["layout"];