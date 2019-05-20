<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Mantenimiento Departamentos</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Añadir" value="Añadir" class="btn btn-success">
            <input type="submit" name="Importar" value="Importar" class="btn btn-success">
            <input type="submit" name="Exportar" value="Exportar" class="btn btn-success">
            <input type="submit" name="Volver" value="Volver" class="btn btn-danger">


            </div>
            </nav>
        </form>  

        <br><br>
        <section class="portfolio" id="portfolio">
            <div class="container">
                <h2 class="text-center text-uppercase text-secondary mb-0">Departamentos</h2>
                <hr class="star-dark mb-5">
                <div class="row">
                    <form class="buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

                        <div style="border-width: 4px; border-style: groove; border-color: #2C3E50;  ">
                            Buscar departamento por descripcion:
                            <input type="text" name="nombre" value="<?php echo $_REQUEST['nombre']; ?>">                               
                            <input type="submit" name="Buscar" value="Buscar" class="btn btn-success">
                            <div class="buscarPosicion">
                                <input type="radio" name="opcionesBusqueda" id="Alta" value="Alta" <?php
                                if ($_REQUEST['opcionesBusqueda'] == "Alta") {
                                    echo "checked";
                                }
                                ?>>Alta
                                <input type="radio" name="opcionesBusqueda" id="Baja" value="Baja" <?php
                                if ($_REQUEST['opcionesBusqueda'] == "Baja") {
                                    echo "checked";
                                }
                                ?>>Baja
                                <input type="radio" name="opcionesBusqueda" id="Todos" value="Todos" <?php
                                if ($_REQUEST['opcionesBusqueda'] == "Todos" || $_REQUEST['opcionesBusqueda'] == null) {
                                    echo "checked";
                                }
                                ?>>Todos
                            </div>

                        </div><br>

                    </form>    

                    <table class="table">
                        <thead>
                            <tr>
                                <th><b>Código</b></th>
                                <th><b>Descripción</b></th>
                                <th><b>Volumen</b></th>
                                <th><b>Acciones</b></th>
                            </tr>
                        </thead>
                        <?php
                        for ($i = 0; $i < count($departamentos); $i++) {
                            if ($departamentos[$i]->getFechaBajaDepartamento() == '0001-01-01') {
                                ?>


                                <tr style="background-color: #8BBD86;">        
                                    <td><?php echo $departamentos[$i]->getCodDepartamento(); ?></td>
                                    <td><?php echo $departamentos[$i]->getDescDepartamento(); ?></td>
                                    <td><?php echo $departamentos[$i]->getVolumenDeNegocio() . " €"; ?></td>
                                    <?php $departamentos[$i]->getFechaBajaDepartamento(); ?>

                                    <td class="acciones">
                                        <form method="post">


                                            <button type="submit" name="editar<?php echo $i; ?>">
                                                <i class="fas fa-edit" <?php if ($departamentos[$i]->getFechaBajaDepartamento() != '0001-01-01') { ?>style="display:none;"<?php } ?>></i>
                                            </button>



                                            <button type="submit" name="ver<?php echo $i; ?>"><i class="fas fa-eye"></i></button>



                                            <button type="submit" name="borrar<?php echo $i; ?>"><i class="fas fa-trash-alt"></i></button>




                                            <button type="submit" name="baja<?php echo $i; ?>"><i class="fas fa-angle-double-down" <?php if ($departamentos[$i]->getFechaBajaDepartamento() != '0001-01-01') { ?>style="display:none;"<?php } ?>></button></i>






                                        </form>
                                    </td>      

                                </tr>															
                            <?php } else {
                                ?>
                                <tr style="background-color:#BD8686;">        
                                    <td><?php echo $departamentos[$i]->getCodDepartamento(); ?></td>
                                    <td><?php echo $departamentos[$i]->getDescDepartamento(); ?></td>
                                    <td><?php echo $departamentos[$i]->getVolumenDeNegocio() . " €"; ?></td>
                                    <?php $departamentos[$i]->getFechaBajaDepartamento(); ?>

                                    <td class="acciones">
                                        <form method="post">






                                            <button type="submit" name="ver<?php echo $i; ?>"><i class="fas fa-eye"></i></button>



                                            <button type="submit" name="borrar<?php echo $i; ?>"><i class="fas fa-trash-alt"></i></button>


                                            <button type="submit" name="rehabilitar<?php echo $i; ?>"><i class="fas fa-angle-double-up" <?php if ($departamentos[$i]->getFechaBajaDepartamento() == '0001-01-01') { ?>style="display:none;"<?php } ?>></button></i>

                                        </form>
                                    </td> 

                                     
                                    <?php
                                }
                            }
                            ?>
                    </table>
                    
                        <?php
                        if ($totalDeLasPaginas != 0) {
                            if ($paginaS != 1) {
                                echo "<a class='paginas' href='?pagina=1&nombre=" . $_REQUEST['nombre'] . "&opcionesBusqueda=" . $_REQUEST['opcionesBusqueda'] . "'>" . '<<' . "</a>";
                                echo "<a class='paginas' href='?pagina=" . ($paginaS - 1) . "&nombre=" . $_REQUEST['nombre'] . "&opcionesBusqueda=" . $_REQUEST['opcionesBusqueda'] . "'>" . '<' . "</a>";
                            }
                            echo '<label>' . $paginaS . ' de ' . $totalDeLasPaginas . '</label>';
                            if ($paginaS != $totalDeLasPaginas) {
                                echo "<a class='paginas' href='?pagina=" . ($paginaS + 1) . "&nombre=" . $_REQUEST['nombre'] . "&opcionesBusqueda=" . $_REQUEST['opcionesBusqueda'] . "'>" . '>' . "</a>";
                                echo "<a class='paginas' href='?pagina=" . $totalDeLasPaginas . "&nombre=" . $_REQUEST['nombre'] . "&opcionesBusqueda=" . $_REQUEST['opcionesBusqueda'] . "'>" . '>>' . "</a>";
                            }
                        } else {
                            echo '<label>0 de 0</label>';
                        }
                        
                        
                        echo "<pre>";
                    print_r($_SESSION['descripcion']); 
                    echo "</pre>";
                        
                        
                        ?>
                  
                </div>
            </div>
        </section>