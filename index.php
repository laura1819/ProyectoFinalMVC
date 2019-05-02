<?php

/**
 * Fichero index.php
 * Este fichero permite controlar el controlador que se ejecuta en cada momento
 * @author Laura fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */

require_once 'config/configuracion.php';
session_start();
if (isset($_SESSION['usuario']) && !isset($_SESSION['pagina'])) {
    include_once $controladores["inicio"];
}
if (isset($_SESSION['pagina'])) {
    include_once $controladores[$_SESSION['pagina']];
} else {
    include_once $controladores["login"];
}
?>