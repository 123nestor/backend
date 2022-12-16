<?php
class ComprasModel extends Mysql{
    public $id, $id_compra ,$codigo, $nombre, $cantidad, $precio, $id_producto ,$id_usuario, $total;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectCompras()
    {
        $sql = "SELECT v.id as id, v.total as total, v.fecha as fecha ,v.id_proveedor as id_proveedor ,v.estado as estado, c.nombre as nombres   FROM compras as v INNER JOIN proveedores  as c ON v.id_proveedor = c.id WHERE v.estado = 1 ORDER BY v.id desc";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectProveedores()
    {
        $sql = "SELECT * FROM proveedores WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    //funcion para mostrar  productos en select en listar venta
    public function selectProductos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //selectVentasPorFechas
    public function selectComprasFecha(string $ini, string $hasta)
    {
        $sql = "SELECT v.id as id, v.total as total, v.fecha as fecha ,v.id_proveedor as id_proveedor ,v.estado as estado, c.nombre as nombres   FROM compras as v INNER JOIN proveedores  as c ON v.id_proveedor = c.id WHERE v.fecha BETWEEN '$ini' AND '$hasta'";
        $res = $this->select_all($sql);
        return $res;
    }


    public function selectDetalle()
    {
        $sql = "SELECT * FROM detalle_temp WHERE id_usuario = $_SESSION[id]";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarDetalle(String $nombre, string $cantidad ,string $precio, string $total, string $id_producto ,string $id_usuario)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->total = $total;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;

            $query = "INSERT INTO detalle_temp(nombre, cantidad, precio, total, id_producto ,id_usuario) VALUES (?,?,?,?,?,?)";
            $data = array($this->nombre,$this->cantidad, $this->precio, $this->total,$this->id_producto,$this->id_usuario);
            $resul = $this->insert($query, $data);
            $return = $resul;
        return $return;
    }
    public function buscarProducto($codigo)
    {
        //$this->$id = $codigo;
        $sql = "SELECT * FROM productos WHERE id = '$codigo' AND estado = 1";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarCompras(String $codigo, string $nombre, string $cantidad, string $precio, int $id)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id = $id;
        $query = "UPDATE compras SET codigo=?, nombre=?, cantidad=?, precio=? WHERE id=?";
        $data = array($this->codigo, $this->nombre, $this->cantidad, $this->precio, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function buscarProductoexiste($id_producto, $id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}' AND id_producto = '{$id_producto}'";
        $resul = $this->select($query);
        return $resul;
    }
    public function actualizarCantidad(int $cantidad,String $total, int $id)
    {
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->id = $id;
        $query = "UPDATE detalle_temp SET cantidad =?, total =? WHERE id =?";
        $data = array($this->cantidad, $this->total ,$this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
    public function verificarProductos($id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}'";
        $resul = $this->select_all($query);
        return $resul;
    }
    public function stockActual($id_producto)
    {
        $query = "SELECT cantidad FROM productos WHERE id = '{$id_producto}'";
        $resul = $this->select($query);
        return $resul;
    }
    public function buscaridC()
    {
        $sql = "SELECT MAX(id) from compras";
        $res = $this->select($sql);
        return $res;
    }
    public function registrarCompra( int $proveedor, string $total)
    {
        $return = "";
        $this->total = $total;
        //$this->proveedor = $proveedor;
        $query = "INSERT INTO compras(id_proveedor,total) VALUES (?,?)";
        $data = array($proveedor,$this->total);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }


    public function registrarDetalle(String $id_compra, string $nombre ,string $id_producto, string $cantidad, string $precio, $id_usuario)
    {
        $return = "";
        $this->id_compra = $id_compra;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;

        $query = "INSERT INTO detalle_compra(id_compra,producto,id_producto ,cantidad, precio,id_usuario) VALUES (?,?,?,?,?,?)";
        $data = array($this->id_compra,$this->nombre, $this->id_producto, $this->cantidad, $this->precio, $this->id_usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function ListaCompras(int $id_compra)
    {
        $sql = "SELECT * FROM detalle_compra WHERE id_compra = '{$id_compra}'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function registrarStock(int $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $query = "UPDATE productos SET cantidad =? WHERE id =?";
        $data = array($this->cantidad, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
    public function selectConfiguracion()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }
    public function VaciarCompra(string $id_usuario)
    {
        $this->id = $id_usuario;
        $sql = "DELETE FROM detalle_temp WHERE id_usuario = $id_usuario";
        $resul = $this->delete($sql);
    }
}
