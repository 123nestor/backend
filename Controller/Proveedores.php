<?php
    class Proveedores extends Controllers{
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
            $data = $this->model->selectProveedores();         
            $this->views->getView($this, "Listar", $data, "");
        }
        //funcion para realizar informes proveedores
        public function verReporte()
        {
            $config = $this->model->selectConfiguracion();
            $data= $this->model->selectProveedores();
            $this->views->getView($this, "ReporteProveedor",$data,"",$config);
        }
        
        public function eliminados()
        {
            $data = $this->model->selectProveedoresInactivos();
            $this->views->getView($this, "Eliminados", $data, "");
        }
        public function insertar()
        {
            $nombre = $_POST['nombre'];
            $nit = $_POST['nit'];
            $servicio = $_POST['servicio'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $insert = $this->model->insertarProveedores($nombre, $nit, $servicio,$direccion, $telefono, $email);
            if ($insert > 0) {
                $alert = 'registrado';
            }else if ($insert == 'existe') {
                $alert = 'existe';
            }else{
                $alert =  'error';
            }
            $this->model->selectProveedores();
            header("location: " . base_url() . "Proveedores/Listar?msg=$alert");
            die();
        }
        public function editar()
        {
            $id = $_GET['id'];
            $data = $this->model->editarProveedores($id);
            if ($data == 0) {
                $this->Listar();
            }else{
                $this->views->getView($this, "Editar", $data);
            }
        }
        public function actualizar()
        {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $nit = $_POST['nit'];
            $servicio = $_POST['servicio'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $actualizar = $this->model->actualizarProveedores($nombre, $nit, $servicio,$direccion, $telefono, $email, $id);
            if ($actualizar == 1) {
                $alert = 'modificado';
            }else {
                $alert = 'error';
            }
            header("location: " . base_url() . "Proveedores/Listar?msg=$alert");
            die();
        }
        public function eliminar()
        {
            $id = $_GET['id'];
            $this->model->eliminarProveedores($id);
            header("location: " . base_url() . "Proveedores/Listar");
            die();
        }
        public function reingresar()
        {
            $id = $_GET['id'];
            $this->model->reingresarProveedores($id);
            $data = $this->model->selectProveedores();
            header("location: " . base_url() . "Proveedores/Listar");
            die();
        }
        
        public function buscar()
        {
            $ruc = $_POST['nit'];
            $data = $this->model->BuscarProveedores($ruc);
            echo json_encode($data);
        }
    }
