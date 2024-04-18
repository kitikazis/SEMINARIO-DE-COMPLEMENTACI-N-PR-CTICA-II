<!DOCTYPE html>
<html lang="es">
    <?php
    $ruta = "../..";
    $titulo = "Aplicacion de ventas - Registrar  marca";
    include("../includes/cabecera.php"); 
 ?>
<body>
    <?php 
    include("../includes/menu.php"); 
    include "../includes/cargar_clases.php";

    $crudmarca = new CRUDMarca();
    $crudcategoria = new CRUDCategoria(); 

    $rs_mar = $crudmarca->ListarMarca();
    $rs_cat= $crudcategoria->ListarCategoria();
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-primary">
                <i class="fas fa-plus-circle"></i>Registrar Marca</h1>
                <hr/>
            </header>

            <nav>
                <a href="listar_maructo.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i>Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center">    
                        <div class="col-md-6">
                            <div class="card">
                                <div class="cord-body">
                                    <form id="frm_registrar_mar" name="frm_registrar_mar" method="post" action="../controlador/ctr_grabar_mar.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="txt_codmar" class="form-label">Codigo</label>
                                                <input type="text" class="form-control" id="txt_codmar" name ="txt_codmar"
                                                placeholder="Codigo" maxlength="5"autofocus/>
                                            </div>

                                            <div class="col-md-8">
                                                <label for="txt_mar" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_mar" name ="txt_mar"
                                                placeholder="Nombre del marca" maxlength="40"/>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="txt_stk" class="form-label">Stock disponible</label>
                                                <input type="number" class="form-control" id="txt_stk" name ="txt_stk"
                                                placeholder="stock" maxlength="4" min="1" max="9999"/>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label for="txt_cst" class="form-label">Costo</label>
                                                <input type="text" class="form-control" id="txt_cst" name ="txt_cst"
                                                placeholder="Costo" maxlength="8"/>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="txt_gnc" class="form-label">%Ganancia</label>
                                                <input type="number" class="form-control" id="txt_gnc" name ="txt_gnc"
                                                 min="0"max="100" step="0.01"/>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cbo_mar" class="form-label">Marca</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_mar" name="cbo_mar">
                                                    <option value="" selected>[Seleccione marca]</option>
                                                    <?php
                                                    foreach($rs_mar as $mar){
                                                        ?>
                                                        <option value="<?=$mar->codigo_marca?>"><?=$mar->marca?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>        
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cbo_mat" class="form-label">Categoria</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_cat" name="cbo_cat">
                                                <option value="" selected>[Seleccione categoria]</option>
                                                <?php
                                                 foreach($rs_cat as $cat){
                                                    ?>
                                                    <option value="<?=$cat->codigo_categoria?>"><?=$cat->categoria?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>             
                                            </div>
                                        </div>

                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_mar" 
                                            name="btn_registrar_mar">
                                        <i class="fas fa-save"></i>Grabar Informacion
                                            </button>
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

