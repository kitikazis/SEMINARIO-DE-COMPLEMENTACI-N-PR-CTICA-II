<?php
include "../includes/cargar_clases.php";

$crudmarca = new CRUDMarca();

if (isset($_GET["codmar"])) {
    $codmar = $_GET["codmar"];

    $crudmarca->BorrarMarca($codmar);

    header("location: ../vista/listar_marca.php");
}
