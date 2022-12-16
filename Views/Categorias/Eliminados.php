<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>Categorias/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cat) { ?>
                                    <tr>
                                        <td><?php echo $cat['id']; ?></td>
                                        <td><?php echo $cat['nombre']; ?></td>
                                        <td><?php echo $cat['descripcion']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Categorias/reingresar?id=<?php echo $cat['id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-ad"></i></button>
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