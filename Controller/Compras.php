<?php
    class Compras extends Controllers{
        protected $totalPagar, $tot = 0;
        public function __construct()
        {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
            parent::__construct();

        }
        public function Listar()
        {   $data['pro']= $this->model->selectProductos(); 
            $data['prove']= $this->model->selectProveedores();    
            $this->views->getView($this, "Listar", $data, "");
        }
        public function lista()
        {
            $data = $this->model->selectCompras();
            $this->views->getView($this, "ListarCompras", $data, "");
        }
        public function ingresar()
        {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $total = $cantidad * $precio;
            $id_usuario = $_SESSION['id'];
            $existe = $this->model->buscarProductoexiste($id, $id_usuario);
            if ($existe) {
                $idP = $existe['id'];
                $cant = $existe['cantidad'];
                $cantidad = $_POST['cantidad'] + $cant;
                $total = $existe['precio'] * $cantidad;
                $this->model->actualizarCantidad($cantidad,$total ,$idP);
                echo "1";
            }else{
                $insert = $this->model->insertarDetalle($nombre, $cantidad, $precio, $total,$id,$id_usuario);
                if ($insert > 0) {
                $this->Listar();
                }else{
                echo "error";
                }
            }
        }
        public function compras()
        {
            $data = $this->model->selectDetalle();
            foreach ($data as $compras) {
            $this->totalPagar = $this->totalPagar + $compras['total']; 
            echo "<tr>
                <td>" . $compras['id']."</td>
                <td>" . $compras['nombre']."</td>
                <td>" . $compras['cantidad'] . "</td>
                <td>" . $compras['precio'] . "</td>
                <td>" . $compras['total'] . "</td>
                <td>
                <button type='button' data-id='" . $compras['id'] . "' class='btn btn-danger eliminar'><i class='fas fa-trash-alt'></i></button>
                </td>
            </tr>";
            
            }
            $tot = number_format($this->totalPagar, 2, ".", ",");

            echo "<input type='hidden' id='totalPagar' value='" . $tot. "'/>";
        }

    /*Funcion para buscar producto*/     
    public function buscar()
    {
        $codigo = $_POST['codigo'];
        $data = $this->model->buscarProducto($codigo);
        echo json_encode($data);
    }
    public function registarVenta()
    {
        $data = $this->model->buscaridC();
        $result = $data['MAX(id)'];
        if ($result == null) {
            $id_compra = 1;
        }else{
            $id_compra = $result;
        }
        
    }
    public function registrar()
    {
        $totalP = $_POST['totalP'];
        $proveedor= $_POST['proveedor'];
        if ($proveedor == 0 || $proveedor== "") {
            $this->model->registrarCompra(1, $totalP);
        }else{
            $this->model->registrarCompra($proveedor, $totalP);
        }
        $data = $this->model->buscaridC();
        $result = $data['MAX(id)'];
        $productos = $this->model->verificarProductos($_SESSION['id']);
        foreach ($productos as $data) {
            $stock = $this->model->stockActual($data['id_producto']);
            $stockActual = $stock['cantidad'];
            $insertar = $this->model->registrarDetalle($result, $data['nombre'] ,$data['id_producto'], $data['cantidad'], $data['precio'], $data['id_usuario']);
            $this->model->registrarStock($stockActual + $data['cantidad'], $data['id_producto']);
        }
        $this->model->VaciarCompra($_SESSION['id']);
        die();
    }

    public function ver()
    {
        $alert = $this->model->selectConfiguracion();
        $id = $_GET['id'];
        $data = $this->model->ListaCompras($id);
        $this->views->getView($this, "VerCompras", $data, $alert);
    }

    //funcion para realizar informes de Compras
    public function verInforme()
    {
        $config = $this->model->selectConfiguracion();
        $data = $this->model->selectCompras();
        $this->views->getView($this, "informeCompras", $data ,"",$config);
    }
    
    //funcion para realizar informes de Compras Por Fechas
    public function InformeFechas()
    {
        $desde=$_POST['desde'];
        $fecha_actual=$_POST['hasta'];
        $hasta= date("Y-m-d",strtotime($fecha_actual."+ 1 days"));
        if(empty($desde) || empty($hasta)){
            $data = $this->model->selectCompras();
        }else{
            $data = $this->model->selectComprasFecha($desde,$hasta);
        }
        $config = $this->model->selectConfiguracion();
        $this->views->getView($this, "informeCompras", $data ,"",$config);
    }

    
    public function anular()
    {
        $this->model->VaciarCompra($_SESSION['id']);
    }
}
