<?php
/**
 * Fichero vBorrarCuenta.php
 * Este fichero permite visualizar la página para borrar una cuenta
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Eliminar la cuenta</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>
            <!-- Header -->
            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">¿Seguro que desea eliminar el usuario?</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="username" class="text-white">Codigo de Usuario:</label>
                                            <input type="text" name="usuario"  value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" disabled>*
                                            <?php
                                            echo "<font color='#FF0000' size='2px'>$aErrores[usuario]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="text-white">Nombre de Usuario:</label>
                                            <input type="text" name="descripcion" value="<?php echo $_SESSION['usuario']->getDescUsuario(); ?>" disabled>*
                                            <?php
                                            echo "<font color='#FF0000' size='2px'>$aErrores[descripcion]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                            ?>
                                        </div>                                       
                                        <div class="form-group">

                                            <input type="submit" name="Confirmar" value="Eliminar" class="btn btn-info btn-md">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </form>

