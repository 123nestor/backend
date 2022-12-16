<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a href="<?php echo base_url(); ?>/Usuarios/Listar" class="btn btn-warning">Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $us) { ?>
                                    <tr>
                                        <td><?php echo $us['id']; ?></td>
                                        <td><?php echo $us['nombre']; ?></td>
                                        <td><?php echo $us['usuario']; ?></td>
                                        <td><?php echo $us['direccion']; ?></td>
                                        <td><?php echo $us['telefono']; ?></td>
                                        <td><?php echo $us['rol']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline confirmar">
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