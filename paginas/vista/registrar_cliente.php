<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Registrar Producto";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudmarca = new CRUDMarca();
    $crudcategoria = new CRUDCategoria();

    $rs_mar = $crudmarca->ListarMarca();
    $rs_cat = $crudcategoria->ListarCategoria();
    ?>
    <div class="container mt-3">
        <header>
            <h2 class="text-primary"><i class="fas fa-plus-circle"></i> Registrar Cliente</h2>
            </hr>
        </header>

        <nav>
            <a href="listar_producto.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Inicio del formulario -->
                                <form id="frm_registrar_prod" name="frm_registrar_prod" method="post" action="../controlador/ctr_grabar_prod.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codprod" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="txt_codprod" name="txt_codprod" placeholder="Código" maxlength="5" autofocus />
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_prod" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_prod" name="txt_prod" placeholder="Nombre del producto" maxlength="40" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_stk" class="form-label">Stock disponible</label>
                                            <input type="number" class="form-control" id="txt_stk" name="txt_stk" placeholder="Stock" maxlength="4" min="1" max="9999" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_cst" class="form-label">Costo</label>
                                            <input type="text" class="form-control" id="txt_cst" name="txt_cst" placeholder="Costo" maxlength="8" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_gnc" class="form-label">% Ganancia</label>
                                            <input type="text" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Ganancia" min="1" max="100" step="0.01" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cbo_mar" class="form-label">Marca</label>
                                            <select class="form-select form-select-lg mb-3" name="cbo_mar" id="cbo_mar">
                                                <option value="" selected>[Seleccione marca]</option>
                                                <?php
                                                foreach ($rs_mar as $mar) {
                                                ?>
                                                    <option value="<?= $mar->codigo_marca ?>"><?= $mar->marca ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cbo_cat" class="form-label">Categoria</label>
                                            <select class="form-select form-select-lg mb-3" name="cbo_cat" id="cbo_cat">
                                                <option value="" selected>[Seleccione categoria]</option>
                                                <?php
                                                foreach ($rs_cat as $cat) {
                                                ?>
                                                    <option value="<?= $cat->codigo_categoria ?>"><?= $cat->categoria ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_prod" name="btn_registrar_prod">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--Fin del formulario-->
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>