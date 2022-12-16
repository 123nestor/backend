<?php
class CategoriasModel extends Mysql{
    public $id, $nombre, $descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectCategoriasInactivos()
    {
        $sql = "SELECT * FROM categorias WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarCategorias(string $nombre, string $descripcion)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $sql = "SELECT * FROM categorias WHERE nombre = '{$this->nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO categorias(nombre, descripcion) VALUES (?,?)";
            $data = array($this->nombre, $this->descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarCategorias(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM categorias WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarCategorias(string $nombre, string $descripcion, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->id = $id;
        $query = "UPDATE categorias SET  nombre=?, descripcion=? WHERE id=?";
        $data = array($this->nombre, $this->descripcion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarCategorias(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE categorias SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarCategorias(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE categorias SET estado = 1 WHERE id=?";
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