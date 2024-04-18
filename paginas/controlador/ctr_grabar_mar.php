<?php
include "../includes/cargar_clases.php";

$crudmarca = new CRUDMarca();

if (isset($_POST["btn_registrar_crud"])) {
    $marca = new Marca();

    $marca->codigo_marca = $_POST["txt_codcrud"];
    $marca->marca = $_POST["txt_crud"];
    $marca->stock_disponible = $_POST["txt_stk"];
    $marca->costo = $_POST["txt_cst"];
    $marca->ganancia = $_POST["txt_gnc"] / 100;
    $marca->marca_codigo_marca = $_POST["cbo_mar"];
    $marca->marca_codigo_categoria = $_POST["cbo_cat"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudmarca->Registrarmarca($marca);
    } else if ($tipo == "e") {
        $crudmarca->Editarmarca($marca);
    }
    header("location: ../vista/listar_marca.php");
}
