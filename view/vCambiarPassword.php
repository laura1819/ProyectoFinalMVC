<?php
/**
 * Fichero vCambiarPassword.php
 * Este fichero permite visualizar la página para cambiar la password
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Cambiar Contraseña</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>


            <!-- Header -->
            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">Formulario de Cambio de Contaseña</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="username" class="text-white">Contraseña antigua:</label>
                                            <input type="password" name="pass1" value="<?php echo $_REQUEST['usuario']; ?>">*
                                            <?php
                                            echo "<font color='#FF0000' size='2px'>$aErrores[pass1]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="text-white">Nueva contraseña:</label>
                                            <input type="password" name="pass2" value="<?php echo $_REQUEST['descripcion']; ?>">*
                                            <?php
                                            echo "<font color='#FF0000' size='2px'>$aErrores[pass2]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-white">Nueva contraseña 2:</label>
                                            <input type="password" name="pass3" value="<?php echo $_REQUEST['pass']; ?>">*
                                            <?php
                                            echo "<font color='#FF0000' size='2px'>$aErrores[pass3]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                            ?>
                                        </div>

                                        <div class="form-group">

                                            <input type="submit" name="Confirmar" value="Confirmar" class="btn btn-info btn-md">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>



        </form>












