<?php
class Productos extends Controllers
{ 
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function Listar()
    {  
        $data['pro'] = $this->model->selectProductos();
        $data['cat'] = $this->model->selectCategorias();
        $this->views->getView($this, "Listar", $data, "");
    }

    //funcion para realizar informe Producto
    public function verReporte()
    {
        $config = $this->model->selectConfiguracion();
        $data= $this->model->selectProductos();
        $this->views->getView($this, "ReporteProducto",$data,"",$config);
    }

    public function Ingresar()
    {  
        $data = $this->model->selectCategorias();
        $this->views->getView($this, "Ingresar",$data,"");
    }
    public function eliminados()
    {
        $data = $this->model->selectProductosInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {   
        $categoria = $_POST['id_categoria'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        //$fechaV = $_POST['fechaV'];
        $insert = $this->model->insertarProductos($categoria, $codigo, $nombre, $cantidad, $precio);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectProductos();
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data['cat'] = $this->model->selectCategorias();
        $data['pro'] = $this->model->editarProductos($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {

        //print_r($_POST);
        $id = $_POST['id'];
        $categoria = $_POST['id_categoria'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $actualizar = $this->model->actualizarProductos($categoria, $codigo, $nombre, $cantidad, $precio, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>