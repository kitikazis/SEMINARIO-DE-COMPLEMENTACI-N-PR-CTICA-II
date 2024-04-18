<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar maructo";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["codmar"])) {
        $codmar = $_GET["codmar"];

        $crudmaructo = new CRUDmaructo();

        $rs_mar = $crudmaructo->BuscarmaructoPorCodigo($codmar);

        if (!empty($rs_mar)) {
            $crudmarca = new CRUDMarca();
            $crudcategoria = new CRUDCategoria();

            $rs_mar = $crudmarca->ListarMarca();
            $rs_cat = $crudcategoria->ListarCategoria();
        } else {
            header("location: listar_maructo.php");
        }
    } else {
        header("location: listar_maructo.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar maructo</h1>
        </header>

        <nav>
            <a href="listar_maructo.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_mar.php" name="frm_editar_mar" method="post" action="../controlador/ctr_grabar_mar.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codmar" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="txt_codmar" name="txt_codmar" placeholder="Código" maxlength="5" readonly value="<?= $rs_mar->codigo_maructo ?>">
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_mar" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_mar" name="txt_mar" placeholder="Nombre del maructo" maxlength="40" value="<?= $rs_mar->maructo ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_stk" class="form-label">Stock disponible</label>
                                            <input type="number" class="form-control" id="txt_stk" name="txt_stk" placeholder="Stock" maxlength="4" min="1" max="9999" value="<?= $rs_mar->stock_disponible ?>" />
                                        </div>

                                       


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_mar" name="btn_registrar_mar">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
                                    </div>
                                </form>
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