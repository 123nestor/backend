<?php encabezado() ?>

<!-- Sidebar Navigation end-->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Panel de Administración</h2>
        </div>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">

                <!-- Mostrar los usuarios registrados -->
                <!--div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><//?php echo $alert; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->

                <!-- Mostrar los CATEGORIAS registrados -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Categorias</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><?php echo $categoria; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-th-large fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mostrar los productos registrados -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-secondary border-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Productos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><?php echo $data; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fab fa-product-hunt fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  Mostrar los Clientes registrados -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Clientes</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-white"><?php echo $cliente
                                            ; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mostrar los Ventas registrados -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                   
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Ventas Hoy</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><?php echo $config; ?></div>
                                    <strong class="text-xs font-weight-bold text-white">Bs/. <?php echo $total['total_venta']; ?> </strong>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-arrow-down fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                


            <!-- Reportes Graficos -->
            <h4 class="mt-2">Reportes Gráficos</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Productos con Stock Mínimo
                        </div>
                        <div class="card-body bg-white"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Productos Más vendidos
                        </div>
                        <div class="card-body bg-white"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.addEventListener("load", function() {
            reportes();
            reportesTorta();
        })
    </script>
</div>
<?php pie() ?>