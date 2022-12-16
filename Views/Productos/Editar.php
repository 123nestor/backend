<?php encabezado() ?>
<!-- Contenido de la página de Productos Editar -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid ">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Productos/actualizar" autocomplete="off">
                        <div class="card-header bg-danger">
                            <h6 class="title text-white text-center">Modificar Producto</46>
                        </div>
                        <div class="modal-body">
                        <p>Todos los campos con  <span class="text-danger">*</span> son obligatorios</p>
                            <div class="form-group">
                                <label for="codigo">Código de barras<span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="<?php echo $data['pro']['id']; ?>">
                                <input id="codigo" class="form-control" type="text" name="codigo" value="<?php echo $data['pro']['codigo']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre<span class="text-danger">*</span></label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['pro']['nombre']; ?>" required>
                            </div>

                            <div class="form-group search">
                                <label for="categoria">Categoria<span class="text-danger">*</span></label>
                                <select  id ="categoria" name="id_categoria" class="form-control   text-blue selectpicker"  data-show-subtext="true" data-live-search="true"><!--para usar como buscador de productos  agregar el clase =>selectpicker-->
                                       <?php foreach($data['cat'] as $cat){
                                            if($data['pro']['id_cat'] == $cat['id'] ){
                                            ?>
                                             <option value="<?php echo $cat['id']?>" selected ><?php echo $cat['nombre'] ?></option>
                                            <?php
                                            } 
                                            else
                                            {
                                            ?> 
                                            <option value="<?php echo $cat['id']?>" ><?php echo $cat['nombre'] ?></option>
                                            <?php
                                            } 
                                        }
                                        ?>
                                </select>
                                
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio">Precio Unitario<span class="text-danger">*</span></label>
                                        <input id="precio" class="form-control" type="text" name="precio"  value="<?php echo $data['pro']['precio']; ?>" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cantidad">Stock Actual</label>
                                        <input id="cantidad" class="form-control" type="number" name="cantidad"  value="<?php echo $data['pro']['cantidad']; ?>" placeholder="0" required>
                                    </div>  
                                </div> 
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>