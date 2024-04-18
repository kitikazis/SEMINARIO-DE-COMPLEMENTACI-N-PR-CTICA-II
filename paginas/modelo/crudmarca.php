<?php
class CRUDMarca extends Conexion
{
    public function ListarMarca()
    {
        $arr_marca = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarMarca()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_marca = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_marca;
    }

    public function BorrarMarca($codmar)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_BorrarMarca(:codmar)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":codmar", $codmar);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }

    }

}
