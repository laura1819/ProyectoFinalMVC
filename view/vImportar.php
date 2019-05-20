<?php ?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Importar departamentos</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>

            <header class="masthead bg-primary text-white text-center">
                <div id="login">

                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                                        <label>Selecciona archivo</label>
                                        <input type="file" name="archivo"><br><br>
                                        <div>
                                            <input type="submit" name="Aceptar" value="Aceptar" class="btn btn-info btn-md">
                                          
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </form>