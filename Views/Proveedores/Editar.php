<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Proveedores/actualizar" autocomplete="off">
                        <div class="card-header bg-danger">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Proveedor</46>
                        </div>
                        <div class="modal-body">
                        <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <label for="nit">Ci/Nit <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="nit" class="form-control" type="text" name="nit"  value="<?php echo $data['nit']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="servicio">Servicio <span class="text-danger">*</span></label>
                                        <input id="servicio" class="form-control" type="text" name="servicio" value="<?php echo $data['servicio']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input id="email" class="form-control" type="email" name="email" value="<?php echo $data['email']; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Proveedores/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>