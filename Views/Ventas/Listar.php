<?php encabezado() ?>
<!-- Vista Contenido Venta -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Nueva Venta</h2>
        </div>
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
                        <label for="buscar_codigo"><i class="fas fa-barcode"></i> Cógigo de barras o Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control" type="text" name="codigo" placeholder="Código de barras">
                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>
                </div-->

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre" >
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="stockD">Stock</label>
                        <input id="stockD" type="text" class="form-control" disabled>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
            </form>

            <div class="row">
            <div class="col-lg-3">
                <div class="form-group search">
                    <strong class="text-black"><i class="fas fa-user"></i> Seleccionar el Cliente</strong>
                    <select id="cliente" class="form-control selectpicker"  data-live-search="true" name="cliente" >
                        <?php
                            foreach($data['cli'] as $row){
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['ruc']." - ".$row['nombre'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <input type="hidden" id="id_cliente" name="id_cliente" value="">
            
                <div class="form-group col-lg-3">
                    <label for="ci_cli">C.I:</label>
                    <strong id="ci_cli" class="form-control border-0 "></strong>
                </div>
                
                <div class="form-group col-lg-3">
                    <label for="nom_cli">Nombre:</label>
                    <strong id="nom_cli" class="form-control border-0 "></strong>
                </div>

                <div class="form-group col-lg-3 ">
                    <label for="">Telefono:</label>
                    <strong id="tel_cli" class="form-control border-0 "></strong>
                </div>
                
                <!--div class="col-lg-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> VENDEDOR</label>
                        <p style="font-size: 16px; text-transform: uppercase; color: red;"><//?php echo $_SESSION['nombre']; ?></p>
                    </div>
                </div-->
                
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
                        <strong class="text-dark"><i class="fa fa-ad" aria-hidden="true"></i> Pagar Con* </strong>
                        <input type="text" id="monto_pagar" placeholder="0.00"  name="monto" class="form-control mb-2">
                        <strong class="text-dark"><i class="fa fa-ad" aria-hidden="true"></i></i> Cambio: </strong>
                        <input type="text" id="cambio" placeholder="0.00" name="total" class="form-control mb-2" disabled>
                        <button class="btn btn-primary" type="button" id="Calcular" onclick="CalcularCambio();"><i class="fas fa-money-check-alt" aria-hidden="true"></i> Calcular</button>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <strong class="text-primary">Total a pagar</strong>
                        <input type="hidden" id="total" name="total" class="form-control  mb-2">
                        <strong id="tVenta" class="form-control border-0 text-success"></strong>
                        <button class="btn btn-warning" type="button" id="AnularCompra" onclick="Limpiar();">Anular Venta</button>
                        <button class="btn btn-danger" type="button" id="procesarVenta" onclick="Limpiar();"><i class="fas fa-money-check-alt"></i> Procesar Venta</button>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
//metodo para calcular el cambio de dinero
var $total=0;
function CalcularCambio(){
    total=$("#total").val();
    var monto_pagar=$("#monto_pagar").val();
    var resul=Number((monto_pagar-total).toFixed(2));
    document.getElementById('cambio').value = resul+"Bs";
}

function Limpiar(){
    document.getElementById('monto_pagar').value="";
    document.getElementById('cambio').value = "";
}

</script>
<?php pie() ?>