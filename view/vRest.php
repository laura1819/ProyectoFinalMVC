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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Servicio Rest</a>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" tabindex = "999" name="Cancelar" value="Volver" class="btn btn-danger">

            </div>
            </nav>
</form>


            <!-- Header -->
            <header class="masthead bg-primary text-white text-center">
                <div id="login">

                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <div style="border-width: 4px; border-style: groove; border-color: #2C3E50;">
                                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                         <h6>Api Rest del new york times que recomienda un libro introduciendole un autor, referencia a la api: 
                                         
                                          <a target="blanck" style="color:white " href="https://developer.nytimes.com/docs/books-product/1/overview">https://developer.nytimes.com/docs/books-product/1/overview</a>
                                         </h6><br>
                                         Autor: <input type="text" name="autor" value="<?php echo $_REQUEST['autor']; ?>">
                                    <input type="submit" tabindex = "1" name="Buscar" value="Buscar" class="btn btn-success"><br><br>
                                  <?php
                                  if (isset($libros)){                                                                
                                  echo "<b>Titulo del libro:  </b>" . $libros['book_title'] . "<br>";
                                  echo "<b>Resumen del libro:  </b>" . $libros['summary'] . "<br>";
                                  echo "<b> Fecha de pulicacion :  </b>" . $libros['publication_dt'] . "<br>";
                                  echo "<b> Url con informacion : </b>" . $libros['url'] . "<br>";
                                  }else if (isset($_REQUEST['autor']) && $libros == null){
                                      echo "no se ha encontrado";
                                  }else{
                                      echo "Aqui saldra la informacion del libro";
                                  }
                                  ?>
                                     </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </form>


