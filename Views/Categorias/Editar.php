<?php encabezado() ?>
<!-- Editar Categoria-->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Categorias/actualizar" autocomplete="off">
                        <div class="card-header bg-danger">
                            <h6 class="title text-white text-center">Modificar Categoria</46>
                        </div>
                        <div class="modal-body">
                        <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            </div>
                       
                            <div class="form-group">
                                <label for="nombre">Nombre<span class="text-danger">*</span></label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data['descripcion']; ?>" required>
                            </div>
                                
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Categorias/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>