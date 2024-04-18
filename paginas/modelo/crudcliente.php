<?php
class CRUDCliente extends Conexion
{
    // Listar Cliente
    public function ListarCliente()
    {
        $arr_clie = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarCliente()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_clie = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_clie;
    }

    // Buscar cliente por código
    public function MostrarClientePorCodigo($codcli)
    {
        $arr_cli = null;
        $cn = $this->Conectar();
        $sql = "call sp_BuscarClientePorCodigo(:codcli)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":codcli", $codcli, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_cli = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_cli);
    }

    // Editar cliente
    public function EditarCliente(Cliente $cliente)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_EditarCliente(:p_codigo_cliente, :p_nombre, :p_ap_paterno, :p_ap_materno, :p_fecha_nacimiento, :p_direccion, :p_correo_electronico, :p_cliente_codigo_distrito)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":p_codigo_cliente", $cliente->codigo_cliente, PDO::PARAM_STR, 5);
            $snt->bindParam(":p_nombre", $cliente->nombre, PDO::PARAM_STR);
            $snt->bindParam(":p_ap_paterno", $cliente->ap_paterno, PDO::PARAM_STR);
            $snt->bindParam(":p_ap_materno", $cliente->ap_materno, PDO::PARAM_STR);
            $snt->bindParam(":p_fecha_nacimiento", $cliente->fecha_nacimiento, PDO::PARAM_STR);
            $snt->bindParam(":p_direccion", $cliente->direccion, PDO::PARAM_STR);
            $snt->bindParam(":p_correo_electronico", $cliente->correo_electronico, PDO::PARAM_STR);
            $snt->bindParam(":p_cliente_codigo_distrito", $cliente->cliente_codigo_distrito, PDO::PARAM_STR);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function ConsultarClientePorNombre($nombre)
    {
        $arr_cli = null;
        $cn = $this->Conectar();
        $sql = "call sp_ConsultarClientePorCodigo(:nombre)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":nombre", $nombre, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_cli = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_cli);
    }

    //Filtrar producto
    public function FiltrarCliente($nombre)
    {
        $arr_cli = null;
        $cn = $this->Conectar();
        $sql = "call sp_ConsultarClientePorCodigo(:nombre)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":nombre", $nombre, PDO::PARAM_STR, 5);
        $snt->execute();
        $arr_cli = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>No</th>";
            echo "<th>Código</th>";
            echo "<th>Cliente</th>";
            echo "<th>Distrito</th>";
            echo "<th>Provincia</th>";
            echo "<th>Departamento</th>";
            echo "</tr>";

            $i = 0;

            foreach ($arr_cli as $cliente) {
                $i++;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$cliente->codigo</td>";
                echo "<td>" . $cliente->nombre . " " . $cliente->ap_paterno . " " . $cliente->ap_materno . "</td>";
                echo "<td>$cliente->distrito</td>";
                echo "<td class='text-left'>$cliente->provincia</td>";
                echo "<td>$cliente->departamento</td>";
                echo "</tr>";
            }
            echo "</table>"; // Movido fuera del bucle foreach
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "No existen registros";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            echo "</div>";
        }
        $cn = null;
    }

    // Registrar Cliente
    public function RegistrarCliente(Cliente $cliente)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_RegistrarCliente(:p_codigo_cliente, :p_nombre, :p_ap_paterno, :p_ap_materno, :p_fecha_nacimiento, :p_direccion, :p_correo_electronico, :p_cliente_codigo_distrito)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":p_codigo_cliente", $cliente->codigo_cliente, PDO::PARAM_STR, 5);
            $snt->bindParam(":p_nombre", $cliente->nombre, PDO::PARAM_STR);
            $snt->bindParam(":p_ap_paterno", $cliente->ap_paterno, PDO::PARAM_STR);
            $snt->bindParam(":p_ap_materno", $cliente->ap_materno, PDO::PARAM_STR);
            $snt->bindParam(":p_fecha_nacimiento", $cliente->fecha_nacimiento, PDO::PARAM_STR);
            $snt->bindParam(":p_direccion", $cliente->direccion, PDO::PARAM_STR);
            $snt->bindParam(":p_correo_electronico", $cliente->correo_electronico, PDO::PARAM_STR);
            $snt->bindParam(":p_cliente_codigo_distrito", $cliente->cliente_codigo_distrito, PDO::PARAM_STR);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    // Borrar producto
    public function BorrarCliente($codcli)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_BorrarCliente(:codcli)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":codcli", $codcli);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
