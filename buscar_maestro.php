<?php
	
    session_start();
	include_once "controller/db.php";
    $name = $_SESSION['usuario'];

    if($name == null){
        header("location: pages-login.php");
    }
?>
	<?php include_once 'includes/header.php'; ?>

         <!-- third party css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
		
		<!-- App css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		
		<SCRIPT type="text/javascript">
		
		$(document).ready(function(){
			
			$("#grado").load("nivel_academico.php");
			$("#tipomaestro").load("tipo_maestro.php");
			
				
		$(".editar").click(function(){
				var id=$(this).attr("id");
				$.ajax({
					url:'info_maestro.php',
					  beforeSend: function() {
							$("#nombre").val('Cargando datos...');
							$("#exito").addClass("d-none");
						},
					type:'POST',
					dataType:'json',
					data:{ idmaestro:id}
					}).done(function(resul){
						if ((resul.res)!=0)
							{
								$("#idmaestro").val(id);
								$("#nombre").val(resul.nombre);
								$("#apellido").val(resul.apellido);
								$("#codigo").val(resul.codigo);
								$("#edad").val(resul.edad);
								$("#telefono").val(resul.telefono);
								$("#correo").val(resul.correo);
								$("#grado").val(resul.grado);
								$("#tipomaestro").val(resul.tipomaestro);
							}
					});
		});
		
		$("#btnactualizar").click(function (){
				var myForm = $('#actualizar-maestro');
				if(myForm[0].checkValidity()) 
					{
					  var formdata=$('#actualizar-maestro').serialize();
					  var url='actualizar_maestro.php';
			   
					  $.post(url, formdata, function(data){
					  $("#exito").removeClass("d-none");
					  myForm[0].reset();
					  setTimeout('location.reload();',1000);
					});
				}
				else
				$("#exito").addClass("d-none");
			return false;	
		});
});	
 </SCRIPT>
 </head>


    <body>
		<?php include_once 'includes/menu.php'; ?>

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mantenimiento</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Maestros</a></li>
											<li class="breadcrumb-item active">Buscar</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Padres de familia</h4>
                                </div>
								
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Listado de Padres de estudiantes</h4>
                                        <p class="text-muted font-13 mb-4">
                                            Se muestran los padres registrados en el sistema.
                                        </p>

                                        <table id="maestro-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Codigo</th>
                                                    <th>Edad</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>
													<th>Grado</th>
													<th>Tipo Maestro</th>
													<th>Editar</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
												<?php
													$sql="SELECT concat_ws(' ', nombre, apellido) as nombre,codigo,edad,telefono,correo,(SELECT tipomaestro from tipomaestro where IdTipo=tipomaestro_IdTipo) as tipomaestro,(SELECT grado from grados where IdGrado=grados_IdGrado) as grado,IdMaestro FROM maestros;";
													$result=mysqli_query($con,$sql);
													while( $row=mysqli_fetch_array($result,MYSQLI_NUM))
													{
														echo '<tr>';
														echo '<td>'.$row[0].'</td>';
														echo '<td>'.$row[1].'</td>';
														echo '<td>'.$row[2].'</td>';
														echo '<td>'.$row[3].'</td>';
														echo '<td>'.$row[4].'</td>';
														echo '<td>'.$row[5].'</td>';
														echo '<td>'.$row[6].'</td>';
														echo '<td><a class="editar" id="'.$row[7].'" data-toggle="modal" data-target="#con-close-modal"><img src="view/img/editar.jpg" style="cursor:pointer"></a></td>';
														echo '</tr>';
													}	
													mysqli_close($con); 
												?>
											</tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        </table>
						<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Actualizando Padre</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
												<div class='alert alert-success d-none' role='alert' id="exito">
												<h4 class='alert-heading'><i class='fa fa-user-plus'></i> Modificación exitosa</h4>
												<p>Información de padre de familia actualizada.</p>
												</div>
												<form id="actualizar-maestro">
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Nombres</label>
                                                                <input type="hidden" name="idmaestro" id="idmaestro">
																<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Digite el nombre" required="">
                                                            </div>
                                                        </div>
														 <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Apellidos</label>
                                                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Codigo</label>
                                                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo maestro" required="">
                                                            </div>
                                                        </div>
														<div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Telefono</label>
                                                                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required="">
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Edad</label>
                                                                <input type="number" class="form-control" name="edad" id="edad" placeholder="Edad" required="">
                                                            </div>
                                                        </div>
														 <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Tipo Maestro</label>
                                                                <select class="form-control" name="tipomaestro" id="tipomaestro" required="">
                                                                    </select>
                                                            </div>
                                                        </div>
														<div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Grado</label>
                                                                <select class="form-control" name="grado" id="grado" required="">
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
													<div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Correo</label>
                                                                <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo del maestro" required="">
                                                            </div>
                                                        </div>
                                                       </div>                                          
													</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" id="btnactualizar" class="btn btn-info waves-effect waves-light" value="Actualizar"/>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
									
					</div> <!-- container -->

                </div> <!-- content -->

               <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 &copy; LC <a href="">San Antonio</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- third party js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>
        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>
		<script src="assets/libs/custombox/custombox.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>