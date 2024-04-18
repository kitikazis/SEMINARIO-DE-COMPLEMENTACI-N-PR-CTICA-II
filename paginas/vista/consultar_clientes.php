<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Consultar Cliente";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Consultar Cliente</h1>
        </header>

        <nav>
            <a href="listar_clientes.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <form id="form_consultar_cli" name="form_consultar_cli" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="5" placeholder="Valor a buscar..." autofocus />
                                <button class="btn btn-outline-success" id="btn_consultar" name="btn_consultar">Consultar</button>
                                <a class="btn btn-outline-primary" href="consultar_clientes.php">Nuevo</a>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>
        <!-- Mostrar informacion cliente -->
        <div class="modal fade" id="md_consultar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-primary">
                            <i class="fas fa-info-circle"></i>
                            Informacion del Cliente
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row justify-content-center">
                            <div class="col g-3 col-md-10 mb-4 bg-white border rounded">
                                <div class="col-md-5">
                                    <h5 class="card-title">Código</h5>
                                    <p class="codigo card-text">&nbsp;</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Cliente</h5>
                                    <p class="apellidos_nombres card-text">&nbsp;</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Fecha de Nacimiento</h5>
                                    <p class="fecha_nacimiento card-text">&nbsp;</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Direccion</h5>
                                    <p class="direccion card-text">&nbsp;</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Correo Electrónico</h5>
                                    <p class="correo_electronico card-text">&nbsp;</p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Distrito/Provincia/Departamento</h5>
                                    <p class="ubigeo card-text">&nbsp;</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal error -->
        <div class="fade modal" tabindex="-1" id="md_error_consultar">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger"><i class="fas fa-trash"></i> Cliente no encontrado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="txt_mensaje">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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