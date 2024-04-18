<?php
include '../includes/cargar_clases.php';

$crudcliente = new CRUDCliente();

if (isset($_GET['codcli'])) {
    $codcli = $_GET["codcli"];

    $crudcliente->BorrarCliente($codcli);

    header('location: ../vista/listar_clientes.php');
}
