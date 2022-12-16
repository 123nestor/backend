<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
    <h3>Sistema Ventas - Nueva Compra</h3>
    </div>

    <section>
        <div class="container-fluid">
            <form action="" method="post" id="frmCompras" class="row" autocomplete="off">

            <div class="col-lg-3">
                <div class="form-group search">
                    <strong class="text-black"><i class="fas fa-barcode"></i> Cógigo de barras o Nombre</strong>
                    <select id="producto" class="form-control selectpicker"  data-live-search="true" name="producto" >
                        <?php
                            foreach($data['pro'] as $pro){
                            ?>
                                <option value="<?php echo $pro['id'] ?>"><?php echo $pro['codigo']." - ".$pro['nombre'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="">

                <!--div class="col-lg-3">
                    <div class="form-group">
                        <label for="buscar_codigo"><i class="fas fa-barcode"></i> Código de barras o Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control" type="text" name="codigo" placeholder="Código de barras">
                        <span class="text-danger d-none" id="error"><i class="fas fa-ad"></i> No hay producto</span>
                    </div>
                </div-->

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre">
                        </br>
                        <strong id="nombreP"></strong>
                        
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input id="stock" type="text" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);" required>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="precio"><i class="fas fa-ad"></i> Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio" > 
                        </br>
                        <strong id="precioP"></strong>
                    </div>
                </div>
            </form>

            <div class="row">    
            <div class="col-lg-4">
                <div class="form-group search">
                    <strong class="text-black"><i class="fas fa-user"></i> Seleccionar el Proveedor</strong>
                    <select id="proveedor" class="form-control selectpicker"  data-live-search="true" name="proveedor" >
                        <?php
                            foreach($data['prove'] as $row){
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nit']." - ".$row['nombre'] ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <input type="hidden" id="id_proveedor" name="id_proveedor" value="">
            
            
                <!--div class="col-lg-3 mt-1">
                    <div class="form-group">
                        <strong class="text-black"><i class="fas fa-user"></i> Datos del Proveedor</strong>
                        <input type="hidden" id="id_proveedor" name="id_proveedor">
                        <input type="text" id="nit_proveedor" onkeyup="BuscarProveedores(event);" name="nit_proveedor" class="form-control" placeholder="nit del Proveedor">
                        <span class="text-danger d-none" id="errorPro">No existe Proveedor</span>
                    </div>
                </div-->  

                <div class="form-group col-lg-4 ">
                    <label for="nom_pro">Nombre:</label>
                    <strong id="nom_pro" class="form-control border-0 "></strong>
                </div>

                <div class="form-group col-lg-4 ">
                    <label for="dir_pro">Dirección:</label>
                    <strong id="dir_pro" class="form-control border-0 "></strong> 
                </div>

                

                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="table-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 ">
                    <div class="form-group">
                        <strong class="text-dark"><i class="fa fa-ad"></i> Pagar Con* </strong>
                        <input type="text" id="monto_pago" placeholder="0.00"  name="monto" class="form-control mb-2">
                        <strong class="text-dark"><i class="fa fa-ad"></i> Cambio: </strong>
                        <input type="text" id="cambios" placeholder="0.00" name="total" class="form-control mb-2" disabled>
                        <button class="btn btn-primary" type="button" id="Calcular" onclick="Calcularse();"><i class="fas fa-ad" aria-hidden="true"></i> Calcular</button>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="form-group">
                        <strong class="text-primary"><i class="fas fa-ad"></i> Total a pagar: </strong>
                        <input type="hidden" id="total"  name="total" class="form-control mb-2">
                        <strong id="totalV"></strong><br>
                        <button class="btn btn-danger" type="button" id="AnularCompra"><i class="fas fa-ad"></i> Anular</button>
                        <button class="btn btn-success" type="button" id="procesarCompra"><i class="fas fa-ad"></i> Procesar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
//metodo para calcular el cambio de dinero
function Calcularse(){
    var total=$("#total").val();
    var monto_pagar=$("#monto_pago").val();
    var resul=Number((monto_pagar-total).toFixed(2));
    document.getElementById('cambios').value = resul+"Bs";
}
</script>
<?php pie() ?>
<style>
.selectpicker button { background:blue; }
</style>