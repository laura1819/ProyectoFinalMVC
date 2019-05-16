

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">BajaLogica Departamento</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>



            <header class="masthead bg-primary text-white text-center">
                <div id="login">
                    <h3 class="text-center text-white pt-10">Dar de baja el departamento</h3><br>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">


                                    <form class="registro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <div>
                                            <table>            
                                                <tr>
                                                    <td>Código del departamento:</td>
                                                    <td><input type="text" size="3" name="CodDepartamento" value="<?php echo $codigoDep ?>" disabled>
                                                    </td>
                                                </tr>            
                                                <tr>
                                                    <td>Descripción del departamento:</td>
                                                    <td>
                                                        <input type="text"  name="DescDepartamento" value="<?php echo $DescDepartamento; ?>" disabled>
                                                        <?php
                                                        echo "<font color='#FF0000' size='1px'>$aErrores[DescDepartamento]</font>";
                                                        ?>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td>Volumen de negocio del departamento :</td>
                                                    <td>
                                                        <input type="text" size="5"  name="VolumenNegocio" value="<?php echo $VolumenNegocio; ?>" disabled>
                                                        <?php
                                                        echo "<font color='#FF0000' size='1px'>$aErrores[VolumenNegocio]</font>";
                                                        ?>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td>Fecha de baja:</td>
                                                    <td>
                                                        <input type="text" style="width:100px;" name="fechaBaja" value="<?php echo $fechaActual; ?>" >
                                                        <?php
                                                        echo "<font color='#FF0000' size='1px'>$aErrores[fechaBaja]</font>";
                                                        ?>
                                                    </td>
                                                </tr> 
                                                <tr><td> </td></tr>
                                                <tr>
                                                    <td>


                                                    </td>
                                                </tr>         
                                            </table><br><br>
                                            <input type="submit" name="Aceptar" value="Aceptar" class="btn btn-success"> 
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </header>   
    </div>
</form>
