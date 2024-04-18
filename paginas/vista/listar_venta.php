<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de Ventas";
include("../includes/cabecera.php");
require_once '../modelo/conexion.php';  // Reemplaza 'ruta_de_tu_archivo_conexion.php' con la ruta correcta a tu archivo de conexión
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";
    
    $conexion = new Conexion();
    $pdo = $conexion->Conectar();
    
    $crudventa = new CRUDVenta($pdo); // Suponiendo que tu clase CRUDVenta acepta un objeto PDO como parámetro
    $rs_ven = $crudventa->ListarVenta();
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de Ventas</h1>
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
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Cod. Venta</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cod. Cliente</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($rs_ven as $ven) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ven->codigo_venta ?></td>
                                        <td><?= $ven->fecha ?></td>
                                        <td><?= $ven->codigo_venta ?></td>
                                        <td><?= $ven->monto ?></td>
                                        <td>
                                        <td><a href="#" class="btn_mostrar btn btn-primary"><i class="fas fa-info-circle"></i></a></td>
                                        <td><a href="#" class="btn_editar btn btn-success"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="#" class="btn_borrar btn btn-danger"><i class="fas fa-trash"></i></a></td> </td>
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
