<?php encabezado() ?>
<!--Vista listar los Clientes-->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                <h3>Sistema Ventas - Clientes</h3>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Clientes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>Clientes/verReporte" target="_blank" rel="noopener noreferrer"><i class="fa fa-file-pdf"></i> Reporte</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El cliente ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Nit/Ci</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['id']; ?></td>
                                        <td><?php echo $cl['ruc']; ?></td>
                                        <td><?php echo $cl['nombre']; ?></td>
                                        <td><?php echo $cl['email']; ?></td>
                                        <td><?php echo $cl['telefono']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Clientes/editar?id=<?php echo $cl['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Clientes/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
<!--Modal Ingresar nuevo Cliente-->
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Clientes/insertar" autocomplete="off">
                <div class="modal-body">
                <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                    <div class="form-group">
                        <label for="ruc">Nit/Ci<span class="text-danger">*</span></label>
                        <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Documento de Identidad"  required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre Completo<span class="text-danger">*</span></label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Correo">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>