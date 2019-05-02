<?php
/**
 * Fichero vMiCuenta.php
 * Este fichero permite visualizar la página para editar la cuenta
 * @author Laura Fernandez
 * @modifiedDate 28/01/2019
 * @version 1.5
 */
?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Editar Perfil</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>



            <!-- Header -->
            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">Formulario de Edicion de Perfil</h3><br> 
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form  class="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="username" >Codigo de Usuario:</label>
                                            <input type="text" name="usuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" disabled>* <br>  <br>                                         
                                      

                                       
                                            <label for="password" class="text-white">Descripcion de Usuario:</label>
                                            <input type="text" name="descripcion" value="<?php
                                            if ($_REQUEST['descripcion'] != null) {
                                                echo $_REQUEST['descripcion'];
                                            } else {
                                                echo $_SESSION['usuario']->getDescUsuario();
                                            }
                                            ?>"  required>*
                                                   <?php
                                                   echo "<font color='#FF0000' size='2px'>$aErrores[descripcion]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                                   ?></br><br> 
                                              <label for="password" class="text-white">Visitas del Usuario:</label>    
                                              <input type="text" name="usuario" size="3" value="<?php echo $_SESSION['usuario']->getNumAccesos(); ?>" disabled>* <br><br> 
                                            
                                             <label for="password" class="text-white">Perfil del usuario:</label>    
                                             <input type="text" name="usuario" size="12" value="<?php echo $_SESSION['usuario']->getPerfil(); ?>" disabled>*  <br><br> 
                                            
                                           
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










