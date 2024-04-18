<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de Productos";
include("../includes/cabecera.php");
?>

<head>
    <style>
        .tabla-rosa {
            background-color: #FFC0CB; /* Código hexadecimal para el color rosa */
        }
    </style>
</head>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDProducto();
    $rs_prod = $crudproducto->ListarProducto(); 
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de Productos</h1>
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group"><a href="registrar_producto.php" class="btn btn-outline-primary ">   
                <i class ="fas fa-plus-circle"></i>Registrar
            </a>
            <a href="consultar_producto.php" class="btn btn-outline-primary "><i class ="fas fa-search"></i>Consultar
            </a>    
            <a href="filtrar_producto.php" class="btn btn-outline-primary ">   
<i class ="fas fa-filter"></i>Filtrar
            </a>        
        </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-9">
                        <table class="tabla-rosa table">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Stock Disponible</th>
                                    <th class="text-center" colspan="3">Acciones</th>
                                </tr>
                            </thead>
                             <?php
                                $i = 0;
                                foreach ($rs_prod as $prod) {
                                    $i++;
                                ?>
                                    <tr class="reg_producto">
                                        <td><?= $i ?></td>
                                        <td class="codprod"><?=$prod->codigo_producto?></td>
                                        <td class="prod"><?=$prod->producto?></td>
                                        <td><?= $prod->stock_disponible ?></td>
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
                    <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar Producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_prod"></span> (<span class="lbl_codprod"></span>)
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
