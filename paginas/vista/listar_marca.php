<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de marca";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudmarca = new CRUDMarca();
    $rs_mar = $crudmarca->ListarMarca();
    ?>

    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de marca</h1>
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_marca.php" class="btn btn-outline-primary">   
                    <i class ="fas fa-plus-circle"></i>Registrar
                </a>
                <a href="consultar_marca.php" class="btn btn-outline-primary">   
                    <i class ="fas fa-search"></i>Consultar
                </a>    
                <a href="filtrar_marca.php" class="btn btn-outline-primary">   
                    <i class ="fas fa-filter"></i>Filtrar
                </a>        
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-9">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col" colspan="3" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($rs_mar as $mar) {
                                    $i++;
                                ?>
                                    <tr class="reg_mar">
                                        <td><?= $i ?></td>
                                        <td class="codmar"><?= $mar->codigo_marca ?></td>
                                        <td class="mar"><?= $mar->marca ?></td>
                                        <td><a href="#" class="btn_mostrar btn btn-primary"><i class="fas fa-info-circle"></i></a></td>
                                        <td><a href="#" class="btn_editar btn btn-success"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="#" class="btn_borrar btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include("../includes/pie.php");
        ?>
    </div>


    <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar maructo</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_mar"></span> (<span class="lbl_codmar"></span>)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>








</body>
</html>
