<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Usuarios/actualizar" autocomplete="off">
                        <div class="card-header bg-danger">
                            <h6 class="title text-white text-center">Modificar Usuario</46>
                        </div>
                        <div class="modal-body">
                        <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <label for="nombre">Nombre Completo<span class="text-danger">*</span></label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="usuario">Usuario<span class="text-danger">*</span></label>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" value="<?php echo $data['usuario']; ?>" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        <input id="direccion" class="form-control" type="text" name="direccion" placeholder="direccion" value="<?php echo $data['direccion']; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Telefono o Celular</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="telefono" value="<?php echo $data['telefono']; ?>">
                                    </div>
                                </div>

                                <!--div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="clave">Contraseña</label>
                                        <input id="clave" class="form-control" type="text" name="clave" value="<?php echo $data['clave'];?>" >
                                    </div>
                                </div-->
                            

                                <div class="col-lg-12">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol">
                                        <option value="Administrador" <?php if ($data['rol'] == "Administrador") {
                                                                            echo "selected";
                                                                        } ?>>Administrador</option>
                                        <option value="Vendedor" <?php if ($data['rol'] == "Vendedor") {
                                                                        echo "selected";
                                                                    } ?>>Vendedor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Usuarios/Listar" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>