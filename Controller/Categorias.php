<?php
class Categorias extends Controllers
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
        $data = $this->model->selectCategorias();
        $this->views->getView($this, "Listar", $data, "");
    }

    //funcion para realizar informes de categorias
     public function verReporte()
    {
        $config = $this->model->selectConfiguracion();
        $data= $this->model->selectCategorias();
        $this->views->getView($this, "ReporteCategoria",$data,"",$config);
    }

    public function eliminados()
    {
        $data = $this->model->selectCategoriasInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
      
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $insert = $this->model->insertarCategorias($nombre, $descripcion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectCategorias();
        header("location: " . base_url() . "Categorias/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarCategorias($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $actualizar = $this->model->actualizarCategorias($nombre, $descripcion,$id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Categorias/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarCategorias($id);
        $data = $this->model->selectCategorias();
        header('location: ' . base_url() . 'Categorias/Listar');
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarCategorias($id);
        $data = $this->model->selectCategorias();
        header('location: ' . base_url() . 'Categorias/Listar');
        die();
    }
}
?>