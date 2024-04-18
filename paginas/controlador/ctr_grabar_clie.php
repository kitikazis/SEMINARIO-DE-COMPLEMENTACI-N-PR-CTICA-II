<?php
include "../includes/cargar_clases.php";

$crudcliente = new CRUDCliente();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = new Cliente();

    $cliente->codigo_cliente = $_POST["txt_codcli"];
    $cliente->nombre = $_POST["txt_nombre"];
    $cliente->ap_paterno = $_POST["txt_ap_paterno"];
    $cliente->ap_materno = $_POST["txt_ap_materno"];
    $cliente->fecha_nacimiento = $_POST["dt_nacimiento"];
    $cliente->direccion = $_POST["txt_direccion"];
    $cliente->correo_electronico = $_POST["txt_correo"];
    $cliente->cliente_codigo_distrito = $_POST["cbo_dist"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudcliente->RegistrarCliente($cliente);
    } else if ($tipo == "e") {
        $crudcliente->EditarCliente($cliente);
    }
    header("location: ../vista/listar_clientes.php");
}
