<?php
include "../../includes/cargar_clases.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codigo"])) {
    $codigo_venta = $_POST["codigo"];
    
    // Instancia del CRUDVenta y llamada al procedimiento almacenado
    $crudventa = new CRUDVenta();
    $resultado = $crudventa->BorrarVenta($codigo_venta); // Suponiendo que tengas un método BorrarVenta en tu CRUDVenta
    
    if ($resultado) {
        echo "Venta eliminada con éxito";
    } else {
        echo "Error al eliminar la venta";
    }
} else {
    echo "Solicitud no válida";
}
?>
