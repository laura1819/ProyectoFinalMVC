


<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Borrar Departamento</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>






            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">¿Quiere borrar el departamento?</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">

                                    Codigo de Departamento: <input type="text" size="8" name="CodDepartamento" value="<?php echo $codigoDep ?>" disabled> <br><br>
                                    Descripcion de Departamento: <input type="text"  name="DescDepartamento" value="<?php echo $DescDepartamento; ?>" disabled> <br><br> 
                                    Volumen de Negocio : <input type="text" style="width:100px;" name="VolumenNegocio" value="<?php echo $VolumenNegocio; ?>" disabled>  <br> <br><br>
                                    <input type="submit" name="Aceptar" value="Aceptar" class="btn btn-success">                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>   
        </form>
