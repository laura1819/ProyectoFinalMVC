<?php

/**
 * @author Laura Fernandez
 */


if (isset($_REQUEST["pagina"])) {
    $paginaS = $_REQUEST["pagina"];
} else {
    $paginaS = 1;
}

$primerRegistro = ($paginaS - 1) * (REGISTROSPAGINA);

$nombre = $_REQUEST["nombre"];



if (isset($_REQUEST['Volver'])) {
    $_SESSION['pagina'] = 'inicio';
    header("Location: index.php");
    exit;
}

if (isset($_REQUEST['Añadir'])) {
    $_SESSION['pagina'] = 'altaDepartamentos';
    header("Location: index.php");
    exit;
}

if (isset($_REQUEST['Buscar'])) {
    $opcionesBusqueda = $_REQUEST['opcionesBusqueda'];
    if(isset($_REQUEST['nombre']))
    $nombre = $_REQUEST['nombre'];
}

if (isset($_REQUEST['Importar'])) {
    $_SESSION['pagina'] = 'importar';
    header("Location: index.php");
    exit;
}
if (isset($_REQUEST['Exportar'])) {
    $_SESSION['pagina'] = 'exportar';
    header("Location: index.php");
    exit;
}

for ($i = 0; $i < count($_SESSION['departamentos']); $i++) {
    if (isset($_REQUEST['editar' . $i])) {
        $_SESSION['codigo'] = $_SESSION['departamentos'][$i]->getCodDepartamento();
        $_SESSION['pagina'] = 'editarDepartamentos';
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['ver' . $i])) {
        $_SESSION['codigo'] = $_SESSION['departamentos'][$i]->getCodDepartamento();
        $_SESSION['pagina'] = 'verDepartamento';
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['borrar' . $i])) {
        $_SESSION['codigo'] = $_SESSION['departamentos'][$i]->getCodDepartamento();
        $_SESSION['pagina'] = 'borrarDepartamento';
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['baja' . $i])) {
        $_SESSION['codigo'] = $_SESSION['departamentos'][$i]->getCodDepartamento();
        $_SESSION['pagina'] = 'bajaDepartamento';
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['rehabilitar' . $i])) {
        $_SESSION['codigo'] = $_SESSION['departamentos'][$i]->getCodDepartamento();
        $_SESSION['pagina'] = 'rehabilitarDepartamento';
        header("Location: index.php");
        exit;
    }
}


//quitar las sesiones/variables
$numeroRegistros = Departamento::contarDepartamentoPorDescripcion($nombre, $opcionesBusqueda);
$totalDeLasPaginas = ceil($numeroRegistros / REGISTROSPAGINA);
$departamentos = Departamento::buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda, $primerRegistro, REGISTROSPAGINA);



$_SESSION['departamentos'] = $departamentos;
$_SESSION['pagina'] = 'mtoDepartamentos';
require_once $vistas['layout'];

?>