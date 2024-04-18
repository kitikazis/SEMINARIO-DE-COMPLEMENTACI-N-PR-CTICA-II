<!DOCTYPE html>
<html lang="es">
    <?php
    $ruta = "../..";
    $titulo = "Aplicacion de ventas - Informacion del producto";
    include("../includes/cabecera.php"); 
 ?>
<body>
    <?php 
    include("../includes/menu.php"); 
    include "../includes/cargar_clases.php";

    if(isset($_GET["codprod"])){    
        $codprod = $_GET["codprod"];

        $crudproducto = new CRUDProducto();             

        $rs_prod = $crudproducto->MostrarProductoPorCodigo($codprod);

        if(empty($rs_prod)){
            header("location:listar_producto.php");
        }
    }else{
        header("location:listar_producto.php");
    }
    ?>
    <div class="container mt-3">
      <header>
        <h1 class="text-info">
            <i class="fas fa-info-circle"></i>Informacion del Producto</h1>
            <hr/>
        </header>

        <nav>
            <a href="listar_producto.php" class="btn brn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"></i>Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <h5 class="card-title">Codigo</h5>
                                    <p clas="card-text"><?=$rs_prod->codigo_producto?></p>    
                                </div>
                                
                                <div class="col-md-6">
                                    <h5 class="card-title">Producto</h5>
                                    <p class="card-text"><?=$rs_prod->producto?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Costo (S/.)</h5>
                                    <p class="card-text">S/. <?=$rs_prod->costo?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Marca</h5>
                                    <p class="card-text"><?=$rs_prod->producto_codigo_marca?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Ganancia (%)</h5>
                                    <p class="card-text"><?=$rs_prod->ganancia?> %</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Stock_disponible</h5>
                                    <p class="card-text"><?=$rs_prod->stock_disponible?> Unidades</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Precio (S/.)</h5>
                                    <p class="card-text">S/. <?=$rs_prod->precio?></p>       
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Categoria</h5>
                                    <p class="card-text"><?=$rs_prod->producto_codigo_categoria?></p>
                                </div>
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
