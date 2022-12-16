<?php encabezado() ?>
<!-- Contenido de la página de inicio-->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                   <h3>Sistema Ventas - Productos</h3>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Productos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>Productos/verReporte" target="_blank" rel="noopener noreferrer"><i class="fa fa-file-pdf"></i> Reporte</a>
                        </div>
                    
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                    $alert = $_GET['msg'];
                                    if ($alert == "existe") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>El producto ya existe</strong>
                                        </div>
                                    <?php } else if ($alert == "error") { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Error al registrar</strong>
                                        </div>
                                    <?php } else if ($alert == "registrado") { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Producto registrado</strong>
                                        </div>
                                    <?php } else if ($alert == "modificado") { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Producto Modificado</strong>
                                        </div>
                            <?php }
                            } ?>
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
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['pro'] as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['id']; ?></td>
                                        <td><?php echo $cl['codigo']; ?></td>
                                        <td><?php echo $cl['nombre']; ?></td>
                                        <td><?php echo $cl['nombrecat']; ?></td>
                                        <td><?php echo $cl['precio']; ?></td>
                                        <td><?php echo $cl['cantidad']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
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



<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Productos/insertar" autocomplete="off">
                    <div class="modal-body">
                            <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <label for="codigo">Código de Barra<span class="text-danger">*</span></label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre Producto<span class="text-danger">*</span></label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripción" required>
                            </div>
                            <div class="form-group  search">
                                <label for="id_categoria">Categoria<span class="text-danger">*</span></label>
                                <select  id ="id_categoria" name="id_categoria" class="form-control selectpicker"  data-live-search="true"><!--para usar como buscador de productos  agregar el clase =>selectpicker-->
                                        <?php foreach($data['cat'] as $cat){
                                            ?>
                                            <option value="<?php echo $cat['id']?>"><?php echo $cat['nombre'] ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio">Precio Unitario<span class="text-danger">*</span></label>
                                        <input id="precio" class="form-control" type="text" name="precio" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cantidad">Stock Actual</label>
                                        <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="0">
                                    </div>  
                                </div> 
                            </div>

                        </div>
                        <div class="card-footer bg-white">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> Registrar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>
                    </div>    
            </form>
        </div>
    </div>
</div>
<?php pie() ?>