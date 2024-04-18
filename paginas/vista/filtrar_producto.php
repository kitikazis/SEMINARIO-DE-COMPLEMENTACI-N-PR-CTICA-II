<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Filtrar Productos";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Filtrar Productos</h1>
        </header>

        <nav>
            <a href="listar_producto.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <form id="form_filtrar_prod" name="frm_filtrar_prod" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="40" placeholder="Valor a buscar..." autofocus />
                                <button class="btn btn-outline-success" id="btn_filtrar" name="btn_filtrar">Filtrar</button>
                                <a class="btn btn-outline-primary" href="filtrar_producto.php">Nuevo</a>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <!-- Modal Aviso-->
        <div class="modal fade" id="md_aviso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>