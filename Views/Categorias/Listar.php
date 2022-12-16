<?php encabezado() ?>
<!-- Vista listar los categorias -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <h3>Sistema Ventas - Categorias</h3>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#nuevo_categoria"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Categorias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>Categorias/verReporte" target="_blank" rel="noopener noreferrer"><i class="fa fa-file-pdf"></i> Reporte</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>La Categoria ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar Categoria</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Categoria registrado correctamente</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Categoria Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="table-info" >
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['id']; ?></td>
                                        <td><?php echo $cl['nombre']; ?></td>
                                        <td><?php echo $cl['descripcion']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Categorias/editar?id=<?php echo $cl['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Categorias/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
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
<!--Modal para agregar un nueva Categoria-->
<div id="nuevo_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-clipboard-list"></i>Nueva Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Categorias/insertar" autocomplete="off">
                <div class="modal-body">
                    <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                    <div class="form-group">
                        <label for="nombre">Nombre:<span class="text-danger">*</span></label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Categoria" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                    </div>
                        
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>