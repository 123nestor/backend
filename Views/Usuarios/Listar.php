<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                <h3>Sistema Ventas - Usuarios</h3>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fa fa-plus-circle"></i>Nuevo</button>
                            <a href="<?php echo base_url(); ?>/Usuarios/eliminados" class="btn btn-danger"><i class="fas fa-user-slash"></i>Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El usuario ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Usuario Registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Usuario Modificado</strong>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Las Contraseña no coinciden</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info">
                                <tr>
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
                                        <td><?php echo $us['nombre']; ?></td>
                                        <td><?php echo $us['usuario']; ?></td>
                                        <td><?php echo $us['direccion']; ?></td>
                                        <td><?php echo $us['telefono']; ?></td>
                                        <td><?php echo $us['rol']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Usuarios/editar?id=<?php echo $us['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Usuarios/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
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
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">

            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="my-modal-title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Usuarios/insertar" autocomplete="off">
                <div class="modal-body">
                <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                    <div class="form-group">
                        <label for="nombre">Nombre Completo<span class="text-danger">*</span></label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="usuario">Nombre de Usuario<span class="text-danger">*</span></label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Direccion">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="telefono">Telefono o Celular</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="telefono">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="clave">Contraseña<span class="text-danger">*</span></label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Contraseña<span class="text-danger">*</span></label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="rol">Rol</label>
                            <select id="rol" class="form-control" name="rol">
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning" type="submit">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>