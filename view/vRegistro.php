<?php
/**
 * Fichero vRegistro.php
 * Este fichero permite visualizar la página de registro de un usuario
 * @author Laura Fernandez
 * @modifiedDate 16/04/2019
 * @version 1.5
 */
?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Registro</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <input tabindex = "999" type="submit" name="Cancelar" value="Volver" class="btn btn-danger" >  
        </form>
    </div>
</nav>




<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div id="login">
        <h3 class="text-center text-white pt-10">Formulario de Registro</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <div class="form-group">
                                <label for="username" class="text-white">Codigo de Usuario:</label><br>
                                <input tabindex ="1" type="text" name="usuario" value="<?php echo $_REQUEST['usuario']; ?>">*
                                <?php
                                echo "<font color='#FF0000' size='2px'>$aErrores[usuario]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Nombre de Usuario:</label><br>
                                <input tabindex ="2" type="text" name="descripcion" value="<?php echo $_REQUEST['descripcion']; ?>">*
                                <?php
                                echo "<font color='#FF0000' size='2px'>$aErrores[descripcion]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Contraseña de usuario:</label><br>
                                <input  onkeydown="onKeyDownHandler(event);" tabindex ="3" class="pass" type="password" name="pass" value="<?php echo $_REQUEST['pass']; ?>">*
                                <?php
                                echo "<font color='#FF0000' size='2px'>$aErrores[pass]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>

                            </div>

                            <div class="form-group">
                                   
                                <input tabindex ="4" type="submit" id="registro" name="Registrar" value="Registrar" class="btn btn-info btn-md">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</form>

