<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Añadir Departamento</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Volver" value="Volver" class="btn btn-danger">
            </div>
            </nav>           
            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">Añade departamento</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form" action="" method="post">
                                        <div class="form-group">
                                            Código de departamento
                                            <input type="text"  name="CodDepartamento" id="codigo"  value="<?php echo $_REQUEST['CodDepartamento']; ?>" >
                                            <?php
                                            echo "<font color='#ffb3b3' size='1px'>$aErrores[CodDepartamento]</font>";
                                            ?> 
                                        </div>
                                        <div class="form-group">
                                            Descripción del departamento

                                            <input type="text"  id="nombre"  name="DescDepartamento" value="<?php echo $_REQUEST['DescDepartamento']; ?>" >
                                            <?php
                                            echo "<font color='#ffb3b3' size='1px'>$aErrores[DescDepartamento]</font>";
                                            ?>    
                                        </div>
                                        <div class="form-group">
                                            Volumen de negocio
                                            <input type="text"  name="VolumenNegocio" value="<?php echo $_REQUEST['VolumenNegocio']; ?>">
                                            <?php
                                            echo "<font color='#ffb3b3' size='1px'>$aErrores[VolumenNegocio]</font>";
                                            ?>  
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="Aceptar" value="Aceptar" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </form>