<?php
class ProveedoresModel extends Mysql{
    public $id, $nombre, $nit, $servicio, $direccion, $telefono, $email;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectProveedores()
    {
        $sql = "SELECT * FROM proveedores WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProveedoresInactivos()
    {
        $sql = "SELECT * FROM proveedores WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarProveedores(string $nit)
    {
        $this->nit = $nit;
        $sql = "SELECT * FROM proveedores WHERE  id = $this->nit  AND estado = 1";//cambiamos el nit por el id
        $res = $this->select($sql);
        return $res;
    }
    public function insertarProveedores(string $nombre, String $nit,  string $servicio, string $direccion, string $telefono, string $email)
    {
        $return = "";
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->servicio = $servicio;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $sql = "SELECT * FROM proveedores WHERE nit = '{$this->nit}'";
        $resultado = $this->select_all($sql);
        if (empty($resultado)) {
            $query = "INSERT INTO proveedores(nombre, nit, servicio, direccion, telefono, email) VALUES (?,?,?,?,?,?)";
            $data = array( $this->nombre,$this->nit, $this->servicio, $this->direccion, $this->telefono, $this->email);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarProveedores(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM proveedores WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarProveedores(string $nombre, String $nit,  string $servicio, string $direccion, string $telefono, string $email, int $id)
    {
        $return = "";
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->servicio = $servicio;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->id = $id;
        $query = "UPDATE proveedores SET nombre=?, nit=?, servicio=?, direccion=?, telefono=?, email=? WHERE id=?";
        $data = array($this->nombre,$this->nit, $this->servicio, $this->direccion, $this->telefono, $this->email, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarProveedores(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE proveedores SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarProveedores(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE proveedores SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function selectConfiguracion()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }
}
?>