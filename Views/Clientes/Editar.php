<?php encabezado() ?>
<!-- Vista Editar Clientes -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Clientes/actualizar" autocomplete="off">
                        <div class="card-header bg-danger">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Cliente</46>
                        </div>
                        <div class="modal-body">
                        <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <label for="ruc">Nit/Ci<span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre Completo<span class="text-danger">*</span></label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email" value="<?php echo $data['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Clientes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>