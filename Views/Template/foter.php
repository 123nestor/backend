                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>Assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>Assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>Assets/js/datatables-simple-demo.js"></script>


               <!-- JavaScript archivos-->
        <script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/Funciones.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/chartjs.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/all.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/front.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/sweetalert2@9.js"></script>
        <script src="<?php echo base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>Assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#Table').DataTable({
					language: {
						"decimal": "",
						"emptyTable": "No hay datos",
						"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
						"infoEmpty": "Mostrando 0 a 0 de 0 registros",
						"infoFiltered": "(Filtro de _MAX_ total registros)",
						"infoPostFix": "",
						"thousands": ",",
						"lengthMenu": "Mostrar _MENU_ registros",
						"loadingRecords": "Cargando...",
						"processing": "Procesando...",
						"search": "Buscar:",
						"zeroRecords": "No se encontraron coincidencias",
						"paginate": {
							"first": "Primero",
							"last": "Ultimo",
							"next": "Próximo",
							"previous": "Anterior"
						},
						"aria": {
							"sortAscending": ": Activar orden de columna ascendente",
							"sortDescending": ": Activar orden de columna desendente"
						}
					}
				});
            });
        </script>
    </body>
</html>