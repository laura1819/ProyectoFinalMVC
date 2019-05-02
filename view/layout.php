<!DOCTYPE html>
<?php
/**
 * Fichero layout.php
 * Este fichero permite controlar la vista que se ejecuta en cada momento
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
if (isset($_SESSION['usuario'])) {
    $vista = $vistas["inicio"];
} else {
    $vista = $vistas["login"];
}
if (isset($_SESSION['pagina'])) {
    $vista = $vistas[$_SESSION['pagina']];
}
?>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Laura Fernandez</title>

        <!-- Bootstrap core CSS -->
        <link href="webroot/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="webroot/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="webroot/css/estiloscarrousel.css">

        <!-- Plugin CSS -->
        <link href="webroot/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="webroot/css/freelancer.min.css" rel="stylesheet">

    </head>
    <body>

        <?php require_once $vista; ?>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Realizado</h4>
                        <p class="lead mb-0">Laura Fernandez
                            <br>Web Developer</p>
                        <p class="lead mb-0">
                            <a href="doc/CV-Europass-20190208-Fernandez-ES.pdf" target="blank">CV</a></p>
                    </div>
                    <div class="col-md-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Repositorio</h4>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://DAW-USGIT.sauces.local/laura.ferfer.7/ProyectoFinalMVC.git" target="blank">
                                    <i class="fab fa-gitlab"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://github.com/laura1819/ProyectoFinalMVC" target="blank">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-uppercase mb-4">Documentacion</h4>
                        <p class="lead mb-0">
                            <a href="#">PhpDoc</a></p>
                         <p class="lead mb-0">
                             <a href="doc/CatalogoDeRequisitos.pdf" target="blank">Catalogo de Requisitos</a></p>
                    </div>

                </div>
            </div>
        </footer>

        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>Copyright &copy; 2018 - 2019 Laura Fernandez </small>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="doc/rss/rss.xml">
                        <i class="fas fa-rss"></i>
                    </a>
                </li>

            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="webroot/vendor/jquery/jquery.min.js"></script>
        <script src="webroot/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="webroot/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="webroot/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="webroot/js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="webroot/js/freelancer.min.js"></script>
    </body>
</html>