<?php

class CRUDVenta extends Conexion
{
    // Listar Venta
    public function ListarVenta()
    {
        $arr_prod = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarVenta()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_prod;
    }

    // Borrar Venta
    public function BorrarVenta($codigo_venta)
    {
        try {
            $cn = $this->Conectar();
            $sql = "DELETE FROM tb_venta WHERE codigo_venta = :codigo";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":codigo", $codigo_venta, PDO::PARAM_STR);
            $stmt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            throw new Exception("Error al borrar la venta: " . $ex->getMessage());
        }
    }
}
?>
