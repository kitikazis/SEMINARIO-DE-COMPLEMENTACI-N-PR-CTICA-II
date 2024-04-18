<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de Productos";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudcliente = new CRUDCliente();
    $rs_cli = $crudcliente->ListarCliente();


    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de Clientes</h1>
        </header>
        <nav>
            <div class="btn-group col-md-5" role="group">
                <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#md_agregar">
                    <li class="fas fa-plus-circle"></li> Registrar
                </a>
                <a href="consultar_clientes.php" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-search"></i> Consultar
                </a>
                <a href="filtrar_cliente.php" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-filter"></i> Filtrar
                </a>
            </div>
        </nav>
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <table class="table table-hover table-sm table-success  table-striped">
                            <tr class="table-primary">
                                <th>Nº</th>
                                <th>Código</th>
                                <th>Apellidos y Nombres</th>
                                <th>Distrito</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($rs_cli as $cliente) {
                                $i++;
                            ?>
                                <tr class="reg_cliente">
                                    <td><?= $i ?></td>
                                    <td class="codcli"><?= $cliente->codigo_cliente ?></td>
                                    <td class="cli"><?= $cliente->nomcom ?></td>
                                    <td><?= $cliente->nomdis ?></td>
                                    <td>
                                        <a href="#" class="btn_mostrar btn btn-outline-info">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn_editar btn btn-outline-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn_borrar btn btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </article>
        </section>
        <?php
        include("../includes/pie.php");
        ?>
    </div>

    <!-- Mostrar informacion cliente -->
    <div class="modal fade" id="md_mostrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-info">
                        <i class="fas fa-info-circle"></i>
                        Informacion del Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row justify-content-center">
                        <div class="row g-3 col-md-10 mb-4 bg-white border rounded">
                            <div class="col-md-4">
                                <h5 class="card-title">Código</h5>
                                <p class="codigo card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Cliente</h5>
                                <p class="apellidos_nombres card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-8">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="card-title">Fecha de Nacimiento</h5>
                                        <p class="fecha_nacimiento card-text">&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            <div>
                                <div class="col">
                                    <h5 class="card-title">Direccion</h5>
                                    <p class="direccion card-text">&nbsp;</p>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-8">
                                <div class="col">
                                    <h5 class="card-title">Correo Electrónico</h5>
                                    <p class="correo_electronico card-text">&nbsp;</p>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-8">
                                <div class="col">
                                    <h5 class="card-title">Distrito/Provincia/Departamento</h5>
                                    <p class="ubigeo card-text">&nbsp;</p>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar informacion cliente -->
    <div class="modal fade" id="md_editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-success">
                        <i class="fas fa-pen-square"></i>
                        Editar Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form id="frm_editar_prod.php" name="frm_editar_prod" method="post" action="../controlador/ctr_grabar_clie.php" autocomplete="off">
                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="txt_codcli" class="form-label">Código</label>
                                <input type="text" class="form-control" id="txt_codcli" name="txt_codcli" placeholder="Código" maxlength="5">
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" />
                            </div>
                            <div class="col-md-4">
                                <label for="txt_ap_paterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="txt_ap_paterno" name="txt_ap_paterno" />
                            </div>
                            <div class="col-md-4">
                                <label for="txt_ap_materno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="txt_ap_materno" name="txt_ap_materno" />
                            </div>
                            <div class="col-md-4">
                                <label for="dt_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="dt_nacimiento" name="dt_nacimiento" />
                            </div>
                            <div class="col-md-4">
                                <label for="txt_direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" />
                            </div>
                            <div class="col-md-4">
                                <label for="txt_correo" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="txt_correo" name="txt_correo" />
                            </div>
                            <div class="col-md-4 departamento">
                                <label for="cbo_depa" class="form-label">Departamento</label>
                                <select class="form-select form-select-lg mb-3" name="cbo_depa" id="cbo_depa">
                                    <?php foreach ($rs_depa as $depa) { ?>
                                        <option value="<?= $depa->codigo_departamento ?>">
                                            <?= $depa->departamento ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 provincia">
                                <label for="cbo_pro" class="form-label">Provincia</label>
                                <select class="form-select form-select-lg mb-3">
                                    <?php foreach ($rs_prov as $pro) { ?>
                                        <option value="<?= $pro->codigo_provincia ?>" id="cbo_pro">
                                            <?= $pro->provincia ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 distrito">
                                <label for="cbo_dist" class="form-label">Distrito</label>
                                <select class="form-select form-select-lg mb-3" name="cbo_dist" id="cbo_dist">
                                    <?php foreach ($rs_dist as $dist) { ?>
                                        <option value="<?= $dist->codigo_distrito ?>">
                                            <?= $dist->distrito ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-save"></i> Actualizar Informacion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Borrar Modal -->
    <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLabel">
                        <i class="fas fa-trash-alt"></i>
                        Borrar Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center border rounded mb-3">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_cli"></span>(<span class="lbl_codigo_cliente"></span>)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrar -->
    <div class="modal fade" id="md_agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content w-full">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="staticBackdropLabel">
                        <i class="fas fa-plus-circle"></i>
                        Registrar Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate method="post" action="../controlador/ctr_grabar_clie.php">
                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />
                        <div class="col-md-3">
                            <label for="txt_codcli" class="form-label">Código</label>
                            <input type="text" class="form-control" id="txt_codcli" name="txt_codcli" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_ap_paterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="txt_ap_paterno" name="txt_ap_paterno" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_ap_materno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="txt_ap_materno" name="txt_ap_materno" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="dt_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="dt_nacimiento" name="dt_nacimiento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_correo" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="txt_correo" name="txt_correo" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 departamento">
                            <label for="cbo_depa" class="form-label">Departamento</label>
                            <select class="form-select form-select-lg mb-3" name="cbo_depa" id="cbo_depa">
                                <?php foreach ($rs_depa as $depa) { ?>
                                    <option value="<?= $depa->codigo_departamento ?>">
                                        <?= $depa->departamento ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 provincia">
                            <label for="cbo_pro" class="form-label">Provincia</label>
                            <select class="form-select form-select-lg mb-3">
                                <?php foreach ($rs_prov as $pro) { ?>
                                    <option value="<?= $pro->codigo_provincia ?>" id="cbo_pro">
                                        <?= $pro->provincia ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 distrito">
                            <label for="cbo_dist" class="form-label">Distrito</label>
                            <select class="form-select form-select-lg mb-3" name="cbo_dist" id="cbo_dist">
                                <?php foreach ($rs_dist as $dist) { ?>
                                    <option value="<?= $dist->codigo_distrito ?>">
                                        <?= $dist->distrito ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" href="#" class="btn btn-outline-primary"><i class="fas fa-save"></i> Guardar Información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>