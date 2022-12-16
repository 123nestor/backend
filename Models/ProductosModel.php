<?php
class ProductosModel extends Mysql{
    public $id, $codigo, $nombre, $cantidad, $precio, $id_categoria;

    public function __construct()
    {
        parent::__construct();
    }
    public function selectProductos()
    {
        /*consuulta para selecionar datos de dos tablas diferentes*/
        $sql = "SELECT p.*, c.id as idcat, c.nombre as nombrecat FROM productos as p INNER JOIN categorias as c WHERE p.id_categoria = c.id AND p.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProductosInactivos()
    {
        $sql = "SELECT p.id as  idpro, p.codigo as codigo , p.cantidad as cantidad, p.precio as precio, p.nombre as nombre, c.id, c.nombre as nombrecat FROM productos as p INNER JOIN categorias as c WHERE p.id_categoria = c.id AND p.estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarProductos(int $categoria, string $codigo, string $nombre, int $cantidad, string $precio)
    {
        $return = "";
        $this->id_categoria = $categoria;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        //$this->fechaV = $fecha;
        $sql = "SELECT * FROM productos WHERE codigo ='{$this->codigo}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO productos (id_categoria, codigo, nombre, cantidad, precio) VALUES (?,?,?,?,?)";
            $data = array($this->id_categoria,$this->codigo, $this->nombre,$this->cantidad, $this->precio);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    public function selectCategorias()
    {
        /*consulta para selecionar datos de dos tablas diferentes categorias*/
        $sql = "SELECT *FROM categorias   WHERE estado= 1";
        $res = $this->select_all($sql);
        return $res;
    }

    public function editarProductos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT p.*, c.id as id_cat, c.nombre as  nombre_cat FROM productos as p INNER JOIN categorias as c WHERE p.id_categoria = c.id AND p.id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarProductos( int $categoria, String $codigo, string $nombre, int $cantidad, string $precio, int $id)
    {
        
        $resul = "";
        //$this->id_categoria = 2;/*problemas en colocar directo categoria */
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id = $id;
        $query = "UPDATE productos SET  id_categoria=?, codigo=?, nombre=?, cantidad=?, precio=? WHERE id=?";
        $data = array($categoria, $this->codigo, $this->nombre, $this->cantidad, $this->precio, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 1 WHERE id=?";
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