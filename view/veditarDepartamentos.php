<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Editar Departamento</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>



            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">Editar el Departamento</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">

                                    Código del departamento:
                                    <input type="text" size="3" name="CodDepartamento" value="<?php echo $codigoDep ?>" disabled> <br><br>

                                    Descripción del departamento:

                                    <input type="text"  size="30" name="DescDepartamento" value="<?php echo $DescDepartamento; ?>" >
                                    <?php
                                    echo "<font color='#FF0000' size='1px'>$aErrores[DescDepartamento]</font>";
                                    ?> <br><br>

                                    Volumen de negocio del departamento:

                                    <input type="text" size="8" name="VolumenNegocio" value="<?php echo $VolumenNegocio; ?>" >
                                    <?php
                                    echo "<font color='#FF0000' size='1px'>$aErrores[VolumenNegocio]</font>";
                                    ?><br><br>

                                    <input type = "submit" name = "Aceptar" value = "Aceptar" class="btn btn-success">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>   
        </form>
