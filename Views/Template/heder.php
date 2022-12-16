<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>

        <link href="<?php echo base_url(); ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>Assets/js/all.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
        
    
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">

    </head>



    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">La Canasta</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            

                            <a class="nav-link" href="<?php echo base_url(); ?>Admin/Listar">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Inicio
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Almacen
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Categorias/Listar"><i class="fa fa-th-large" ></i>Categorias</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>Productos/Listar"> <i class="fab fa-product-hunt"></i>Productos</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="<?php echo base_url(); ?>Proveedores/Listar">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Proveedores
                            </a>
                         
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#compras" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Compras
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="compras" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url(); ?>Compras/Listar"><i class="fas fa-cart-plus"></i> Nueva Compra</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>Compras/lista"><i class="fas fa-list-ol"></i> Compras</a>
                                </nav>
                            </div>
                    
                            
                            <a class="nav-link" href="<?php echo base_url(); ?>Clientes/Listar">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clientes
                            </a>
                         
                        
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ventas" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="ventas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php  echo base_url(); ?>Ventas/Listar"><i class="fas fa-cart-plus"></i> Nueva Venta</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>Ventas/lista"><i class="fas fa-list-ul"></i> Ventas</a>
                                </nav>
                            </div>
                            
                         


                            
                <?php if($_SESSION['rol'] == "Administrador"){ ?>

                            <a class="nav-link" href="<?php echo base_url(); ?>Usuarios/Listar">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuarios
                            </a>

                            <a class="nav-link" href="<?php echo base_url(); ?>Configuracion/Listar">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Configuración
                            </a>

                <?php } ?>


                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
              
            