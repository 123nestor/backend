<?php encabezado() ?>
<!-- Contenido de la página Productos eliminados -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>Productos/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $pro) { ?>
                                    <tr>
                                       
                                        <td><?php echo $pro['idpro']; ?></td>
                                        <td><?php echo $pro['codigo']; ?></td>
                                        <td><?php echo $pro['nombre']; ?></td>
                                        <td><?php echo $pro['nombrecat']; ?></td>
                                        <td><?php echo $pro['cantidad']; ?></td>
                                        <td><?php echo $pro['precio']; ?></td>
                                        <td>
                                        <form action="<?php echo base_url() ?>Productos/reingresar?id=<?php echo $pro['idpro']; ?>" method="post" class="d-inline confirmar">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-ad"></i></button>
                                        </form>
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