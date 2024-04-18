<?php
// borrar_venta.php

require_once '../modelo/conexion.php'; // Asegúrate de que la ruta sea correcta
include "../includes/cargar_clases.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codigo"])) {
    $codigo_venta = $_POST["codigo"];

    $conexion = new Conexion();
    $pdo = $conexion->Conectar();
    
    $crudventa = new CRUDVenta($pdo);
    
    try {
        $crudventa->BorrarVenta($codigo_venta);
        echo "Venta borrada exitosamente";
    } catch (Exception $e) {
        echo "Error al borrar la venta: " . $e->getMessage();
    }
} else {
    echo "Acceso no autorizado";
}

?>
