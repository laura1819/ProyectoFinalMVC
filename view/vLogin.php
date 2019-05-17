<?php
/**
 * Fichero vLogin.php
 * Este fichero permite visualizar la página de login
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */

?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Iniciar Sesion</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Modelos</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Esta web</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Tecnologias</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
        <div id="login">
            <h3 class="text-center text-white pt-10">Formulario login</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <div class="form-group">
                                    <label for="username" class="text-white">Nombre:</label><br>
                                    <input type="text" name="usuario" id="username" >
                                   
                                </div>
                                 <?php
                                    echo "<font color='#FF0000' size='2px'>$aErrores[usuario]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                    ?>
                                <div class="form-group">
                                    <label for="password" class="text-white">Contraseña:</label><br>
                                    <input type="password" name="pass" id="password" >
                                   
                                </div>
                                 <?php
                                    echo "<font color='#FF0000' size='2px'>$aErrores[pass]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                    ?>
                                <div class="form-group">
                                    <input type="submit" name="Acceder" class="btn btn-info btn-md" value="Acceder">
                                </div>
                                <div id="register-link" class="text-right">
                                    <p>¿Todavia sin cuenta? Registrate ya!</p>
                                     <input type="submit" name="Registrarse" class="btn btn-info btn-md" value="Registro">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


</form>

<!-- Portfolio Grid Section -->
<section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Modelos</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/180503ArbolDeNavegacion.jpg" alt="">
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/180503CasosDeUso.jpg" alt="">
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/clases.png" alt="">
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/180503ModeloFisicoDeDatos.jpg" alt="">
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-5">    
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/estructuraficheros.PNG" alt="">
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-6">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                        <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            <i class="fas fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="webroot/img/portfolio/180503RelacionDeFicheros.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="bg-primary text-white mb-0" id="about">
    <div class="container">
        <h2 class="text-center text-uppercase text-white">Esta Web</h2>
        <hr class="star-light mb-5">
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">Aplicacion Web con loginlogoff y un mantenimiento de departamentos en multicapa</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">Formación Profesional en Desarrollo de Aplicaciones Web</p>
            </div>
        </div> 
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Tecnologias Utilizadas</h2>
        <hr class="star-dark mb-5">
        <section id="slideshow">
            <div class="entire-content">
                <div class="content-carrousel">
                    <figure class="shadow"><img src="webroot/img/csshtml.jpg"/></figure>
                    <figure class="shadow"><img src="webroot/img/js.png"/></figure>
                    <figure class="shadow"><img src="webroot/img/php.png"/></figure>
                    <figure class="shadow"><img src="webroot/img/xml.png"/></figure>
                    <figure class="shadow"><img src="webroot/img/netbe.jpg"/></figure>
                    <figure class="shadow"><img src="webroot/img/sublime.png"/></figure>
                    <figure class="shadow"><img src="webroot/img/visual.png"/></figure>
                    <figure class="shadow"><img src="webroot/img/mysql.jpg"/></figure>
                    <figure class="shadow"><img src="webroot/img/file.jpg"/></figure>
                </div>
            </div>
        </section>

        <div class="tecno">

            <p><b><u>Tecnologias Utilizadas:</u></b><br>  <a href="https://www.w3.org/Style/Examples/011/firstcss.es.html">HTML y CSS,</a>
                <a href="https://www.javascript.com/">Javascript,</a>
                <a href="http://php.net/manual/es/intro-whatis.php">PHP,</a>
                <a href="https://es.wikipedia.org/wiki/Extensible_Markup_Language">XML</figure></a>					
            </p>

            <p><b><u>Herramientas Utilizadas:</u></b> <br>
                <a href="https://netbeans.org/">NetBeans,</a>
                <a href="https://www.sublimetext.com/">Sublime Text,</a>
                <a href="https://www.visual-paradigm.com/">Visual Paradigm,</a>
                <a href="https://www.mysql.com/">MySQL,</a>
                <a href="https://filezilla-project.org/">Filezilla</a></p>
            <p><b><u><a href="doc/070319EjerciciosTema1LauraFernandez.pdf" target="_blank">Ejercicios Tema 1</a></u></b></p>
            <p><b><u><a href="doc/29012019DocumentacionMaquinas.pdf" target="_blank">Documentacion Maquinas</a></u></b></p>				    


        </div>			
    </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Portfolio Modals -->

<!-- Portfolio Modal 1 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Arbol de navegacion</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/180503ArbolDeNavegacion.jpg" alt="">                  
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 2 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Casos de uso</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/180503CasosDeUso.jpg" alt="">                    
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 3 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Diagrama de clases</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/clases.png" alt="">                   
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 4 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Modelo fisico de datos</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/180503ModeloFisicoDeDatos.jpg" alt="">                   
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modal 5 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-5">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Estructura de directorios</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/estructuraficheros.PNG" alt="">                   
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Portfolio Modal 6 -->
<div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
    <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
            <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-secondary text-uppercase mb-0">Mapa web</h2>
                    <hr class="star-dark mb-5">
                    <img class="img-fluid mb-5" src="webroot/img/portfolio/180503RelacionDeFicheros.jpg" alt="">                   
                    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                        <i class="fa fa-close"></i>
                        Close Project</a>
                </div>
            </div>
        </div>
    </div>
</div>
