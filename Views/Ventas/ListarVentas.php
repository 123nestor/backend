<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Ventas Generadas</h2>
            <a href="<?php echo base_url(); ?>Ventas/verInforme" target="_blank" rel="noopener noreferrer" class="btn btn-success"><i class="fa fa-file-pdf"></i> Reporte Ventas</a>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            
            <form action="<?php echo base_url(); ?>Ventas/InformeFechas" method="post" target="blank">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="desde">Desde</label>
                            <input type="date" name="desde" value="<?php $fecha_actual = date("Y-m-d"); echo date("Y-m-d",strtotime($fecha_actual));?>" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="hasta">Hasta</label>
                            <input type="date" name="hasta" value="<?php $fecha_actual = date("Y-m-d"); echo date("Y-m-d",strtotime($fecha_actual));?>" >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit"  class="btn btn-danger">PDF</button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $lista) { ?>
                                    <tr>
                                        <td><?php echo $lista['id']; ?></td>
                                        <td><?php echo $lista['nombre']; ?></td>
                                        <td><?php echo $lista['total']; ?></td>
                                        <td><?php echo $lista['fecha']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>Ventas/ver?id=<?php echo $lista['id']; ?>&cliente=<?php echo $lista['id_cliente']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-danger">Ver</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>