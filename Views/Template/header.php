<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de venta-canasta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
    <!-- Importamos los estilos css para select2-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap-select.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                    <!-- Navbar Header--><a href="<?php echo base_url(); ?>Admin/Listar" class="navbar-brand">
                        <div class="brand-text brand-big visible"><i class="fa fa-shopping-cart"></i><strong class="text-white">LA CANASTA</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-warning">SIS</strong><strong>V</strong></div>
                    </a>
                    <!-- Sidebar icono Btn-menu-->
                    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
                </div>
                
                <!--btn Cerrar sesion-->
                <div class="list-inline-item logout">
                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off"></i>Cerrar Sesion</button>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navegacional-->
        <nav id="sidebar">
            <!-- Sidebar para Header-->
            <div class="sidebar-header d-flex align-items-center p-1">
                <div class="avatar" data-toggle="modal" data-target="#cambiarPass"><img src="<?php echo base_url(); ?>/Assets/img/avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h5 class="h5"><?php echo $_SESSION['rol']; ?></h5>
                    <h5 class="h6"><?php echo $_SESSION['nombre']; ?></h5>
                </div>
            </div>
            <ul class="list-unstyled">

                <li><a href="<?php echo base_url(); ?>Admin/Listar"> <i class="fa fa-home"></i> <strong class="text-white"> Inicio </strong></a></li>

                <?php if($_SESSION['rol'] == "Administrador"){ ?>

                    <li><a href="#dropdownAlmacen" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-th-large" ></i> <strong class="text-white"> Almacen</strong></a>
                        <ul id="dropdownAlmacen" class="collapse list-unstyled ">
                            <li><a href="<?php echo base_url(); ?>Categorias/Listar"> <i class="fa fa-th-large" ></i>Categorias</a></li>
                            <li><a href="<?php echo base_url(); ?>Productos/Listar"> <i class="fab fa-product-hunt"></i>Productos</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo base_url(); ?>Proveedores/Listar"> <i class="fa fa-users"></i> <strong class="text-white"> Proveedores</strong></a></li>

                    <li><a href="#dropdownCompras" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-truck"></i> <strong class="text-white"> Compras</strong></a>
                        <ul id="dropdownCompras" class="collapse list-unstyled ">
                            <li><a href="<?php echo base_url(); ?>Compras/Listar"><i class="fas fa-cart-plus"></i> Nueva Compra</a></li>
                            <li><a href="<?php echo base_url(); ?>Compras/lista"><i class="fas fa-list-ol"></i> Compras</a></li>
                        </ul>
                    </li>

                <?php } ?>


                <li><a href="<?php echo base_url(); ?>Clientes/Listar"> <i class="fas fa-users"></i> <strong class="text-white"> Clientes </strong></a></li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-shopping-cart"></i> <strong class="text-white"> Ventas </strong></a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="<?php  echo base_url(); ?>Ventas/Listar"><i class="fas fa-cart-plus"></i> Nueva Venta</a></li>
                        <li><a href="<?php echo base_url(); ?>Ventas/lista"><i class="fas fa-list-ul"></i> Ventas</a></li>
                    </ul>
                </li>

                <?php if($_SESSION['rol'] == "Administrador"){ ?>

                    <li><a href="<?php echo base_url(); ?>Usuarios/Listar"> <i class="fas fa-user"></i> <strong class="text-white"> Usuarios </strong></a></li>
                    <li><a href="<?php echo base_url(); ?>Configuracion/Listar"> <i class="fas fa-cogs"></i> <strong class="text-white"> Configuración </strong></a></li>
                <?php } ?>
                
            </ul>
        </nav>