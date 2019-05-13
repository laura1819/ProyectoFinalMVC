<?php
/**
 * Fichero vInicio.php
 * Este fichero permite visualizar la página de inicio de la aplicación
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo '<p> Bienvenid@ ' . $_SESSION['usuario']->getDescUsuario(); ?></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Informacion</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Opciones</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="submit" name="Salir" value="Cerrar Sesion" class="btn btn-danger">
                        </li>
                        </ul>
                        </div>
                        </div>
                        </nav>

                        <!-- About Section -->
                        <header class="masthead bg-primary text-white text-center" id="about">

                            <h2 class="text-center text-uppercase text-white">Informacion del Usuario</h2>
                            <hr class="star-light mb-5">
                            <div class="row">
                                <div class="col-lg-4 ml-auto">
                                    <p class="lead"><?php echo '<label>' . $_SESSION['visitas'] . '</label>'; ?></p>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                    <p class="lead"><label>Su perfil es de tipo: <?php echo $_SESSION['usuario']->getPerfil(); ?></label></p>
                                </div>
                            </div> 

                        </header>

                        <section class="portfolio" id="portfolio">
                            <div class="container">
                                <h2 class="text-center text-uppercase text-secondary mb-0">Opciones</h2>
                                <hr class="star-dark mb-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">Perfil</h3>
                                        <input type="submit" name="edPerfil" value="Editar Descripcion" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="cambiarPass" value="Cambiar Contraseña" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="borrarCuenta" value="Borrar Cuenta" class="btn btn-lg btn-block btn-danger">

                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">Mantenimiento</h3>
                                        <input type="submit" name="wip" value="Mto.Departamentos" class="btn btn-lg btn-block btn-success">
                                        <?php if ($_SESSION['usuario']->getPerfil() == 'Administrador') { ?>
                                            <input type="submit" name="wip" value="Mantenimiento de Usuarios" class="btn btn-lg btn-block btn-warning"> 
                                        <?php } ?>

                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">ServiciosWeb</h3>
                                        <input type="submit" name="wip" value="SOAP" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="wip" value="REST" class="btn btn-lg btn-block btn-success">

                                    </div>

                                </div>

                            </div>
                        </section>

                        
                        <section class="portfolio" id="portfolio">
                            <div class="container">
                                <h2 class="text-center text-uppercase text-secondary mb-0">Opciones</h2>
                                <hr class="star-dark mb-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">Perfil</h3>
                                        <input type="submit" name="edPerfil" value="Editar Descripcion" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="cambiarPass" value="Cambiar Contraseña" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="borrarCuenta" value="Borrar Cuenta" class="btn btn-lg btn-block btn-danger">

                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">Mantenimiento</h3>
                                        <input type="submit" name="wip" value="Mto.Departamentos" class="btn btn-lg btn-block btn-success">
                                        <?php if ($_SESSION['usuario']->getPerfil() == 'Administrador') { ?>
                                            <input type="submit" name="wip" value="Mantenimiento de Usuarios" class="btn btn-lg btn-block btn-warning"> 
                                        <?php } ?>

                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="text-center text-uppercase text-secondary mb-0">ServiciosWeb</h3>
                                        <input type="submit" name="wip" value="SOAP" class="btn btn-lg btn-block btn-success">
                                        <input type="submit" name="wip" value="REST" class="btn btn-lg btn-block btn-success">

                                    </div>

                                </div>

                            </div>
                        </section>
                        
                        
                        <div class="card mb-3 col-lg-4 float-right">
                            <h3 class="card-header">El tiempo en <?php echo ucwords(strtolower($_SESSION['estacion']['ubi'])); ?></h3>
                            <div class="card-body">
                                <p class="card-text"><?php echo '<b>Longitud/latitud: </b>' . $_SESSION['estacion']['lon'] . 'º, ' . $_SESSION['estacion']['lat'] . 'º' ?></p>
                                <p class="card-text"><?php echo '<b>Altitud: </b>' . $_SESSION['estacion']['alt'] . 'm' ?></p>
                                <p class="card-text"><?php echo '<b>Último dato registrado: </b>' . $_SESSION['estacion']['fint']; ?></p>
                                <p class="card-text"><?php echo '<b>Precipitaciones: </b>' . $_SESSION['estacion']['prec'] . 'L/m²' ?></p>
                                <p class="card-text"><?php echo '<b>Temperatura mínima: </b>' . $_SESSION['estacion']['tamin'] . 'ºC' ?></p>
                                <p class="card-text"><?php echo '<b>Temperatura actual: </b>' . $_SESSION['estacion']['ta'] . 'ºC' ?></p>
                                <p class="card-text"><?php echo '<b>Temperatura máxima: </b>' . $_SESSION['estacion']['tamax'] . 'ºC' ?></p>
                                <p class="card-text"><?php echo '<b>Velocidad media del viento: </b>' . $_SESSION['estacion']['vv'] . 'm/s' ?></p>
                            </div>
                        </div>


                    </form>

